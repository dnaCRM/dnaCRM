<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class Perfil extends Controller
{
    private $dados;
    private $validation;
    private $fotoperfil = true;
    private $img_folder;
    private $erros_arr = array();

    public function __construct()
    { //o atributo de classe é herdado da classe pai 'Controller'
        $this->model = new PerfilModel;
        $this->img_folder = $this->model->getImageFolder();
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = $this->model->fullList();

        foreach ($perfil_list as $perfil) {

            if (!file_exists($this->img_folder . $perfil['cd_pessoa_fisica'] . '.jpg')) {
                $this->model->getFoto($perfil['cd_pessoa_fisica']);
                //Session::put('fail', 'Pegou foto!');

            } else {
                //Session::put('fail', 'Foto já existia!');
            }

        }

        $dados = [
            'pagesubtitle' => 'Olá mundo',
            'pagetitle' => 'Perfil',
            //pasta de imagens de perfil
            'img_folder' => $this->img_folder,
            'list' => $perfil_list
        ];

        $this->view = new View('Perfil', 'start');
        $this->view->output($dados);
    }

    public function novo()
    {
        $dados = [
            'pagesubtitle' => 'Cadastro de Perfil',
            'pagetitle' => 'Muita calma nessa hora.',
            'erros' => $this->erros_arr
        ];

        $this->view = new View('Perfil', 'novo');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = '')
    {
        $perfilarr = $this->model->getPerfil($id);

        if (!file_exists($this->img_folder . $id . '.jpg')) {
            $this->model->getFoto($id);
            //Session::put('fail', 'Pegou foto!');
        } else {
            //Session::put('fail', 'Foto já existia!');
        }

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            //pasta de imagens de perfil
            'img_folder' => $this->img_folder,
            'erros' => $this->erros_arr,
            //todos os atributos do perfil
            'perfil' => $perfilarr
        );

        $this->view = new View('Perfil', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function update($id = '')
    {
        $perfilarr = $this->model->getPerfil($id);

        if (!file_exists($this->img_folder . $id . '.jpg')) {
            $this->model->getFoto($id);
            //Session::put('fail', 'Pegou foto!');
        } else {
            //Session::put('fail', 'Foto já existia!');
        }

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            //pasta de imagens de perfil
            'img_folder' => $this->img_folder,
            //todos os atributos do perfil
            'perfil' => $perfilarr
        );

        $this->view = new View('Perfil', 'update');
        $this->view->output($dados);
    }

    public function confirmDelete($id)
    {
        $perfilarr = $this->model->getPerfil($id);

        if (!file_exists($this->img_folder . $id . '.jpg')) {
            $this->model->getFoto($id);
            //Session::put('fail', 'Pegou foto!');
        } else {
            //Session::put('fail', 'Foto já existia!');
        }

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            //pasta de imagens de perfil
            'img_folder' => $this->img_folder,
            'perfil' => $perfilarr
        );

        $this->view = new View('Perfil', 'confirmDelete');
        $this->view->output($dados);
    }

    public function removerPerfil($id)
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $this->model->deletePerfil($id);
            }
        }
    }

    /**
     * Método que recebe os dados do formulário
     * faz a validação e grava no banco de dados usando o método create do model
     */
    public function newPerfil($id = null)
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $this->validatePerfilInfo();

                if ($this->validation->passed()) {

                    $this->setDados();

                    try {
                        if (!$id) {
                            $this->model->create($this->dados);
                        } else {
                            $this->model->updatePerfil($id, $this->dados);
                        }
                        Session::flash('sucesso', 'Perfil cadastrado com sucesso.');
                    } catch (Exception $e) {
                        CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                    }
                } else {
                    foreach ($this->validation->erros() as $item => $erro) {
                        //CodeError($item . " => " . $erro, E_USER_WARNING);
                    }
                    $this->erros_arr = $this->validation->erros();
                }
            }
        }
    }

    public function getErroArr()
    {
        return $this->erros_arr;
    }

    private function setDados()
    {
        $this->dados = [
            'cd_cgc' => (int)Input::get('cd_cgc'),
            'cd_profissao' => (int)Input::get('cd_profissao'),
            'nm_pessoa_fisica' => Input::get('nm_pessoa_fisica'),
            'email' => Input::get('email'),
            'cpf' => (string)Input::get('cpf'),
            'rg' => (string)Input::get('rg'),
            'org_rg' => strtoupper(Input::get('org_rg')),
            'fone' => (string)Input::get('fone'),
            'celular' => (string)Input::get('celular'),
            'dt_nascimento' => Input::get('dt_nascimento'),
            'ie_sexo' => Input::get('ie_sexo')
        ];
    }

    /**
     * Instancia um objeto da classe Validate que
     * valida as informações recebidas pelo formulário
     * @todo Removido a validação unique, pois está impossibilitando a atualização de perfil
     */
    public function validatePerfilInfo()
    {
        $this->fotoPerfil();

        $validate = new Validate;

        if (!$this->fotoperfil) {
            $validate->addErro('im_foto', 'Arquivo inválido');
        }

        $this->validation = $validate->check($_POST, array(
            'cd_cgc' => array(
                'min' => 1,
                'max' => 100
            ),
            'cd_profissao' => array(
                'min' => 1,
                'max' => 100
            ),
            'nm_pessoa_fisica' => array(
                'required' => true,
                'min' => 3,
                'max' => 100
            ),
            'email' => array(
                'required' => true,
                'email' => true
            ),
            'cpf' => array(
                'required' => true,
                'min' => 14,
                'max' => 14,
                //'unique' => 'pessoa_fisica_tb'
            ),
            'rg' => array(
                'required' => true,
                'min' => 6,
                'max' => 12,
                //'unique' => 'pessoa_fisica_tb'
            ),
            'org_rg' => array(
                'required' => true,
                'min' => 2,
                'max' => 8
            ),
            'fone' => array(
                'required' => true,
                'min' => 8,
                'max' => 20
            ),
            'celular' => array(
                'required' => true,
                'min' => 8,
                'max' => 20,
                //'unique' => 'pessoa_fisica_tb'
            ),
            'dt_nascimento' => array(
                'required' => true,
                'data' => true
            ),
            'ie_sexo' => array(
                'required' => true
            )
        ));
    }


    public function fotoPerfil()
    {
       if ($this->model->recebefoto()) {
           return true;
       }

       return false;
    }
}