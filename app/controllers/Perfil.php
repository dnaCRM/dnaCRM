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
    private $img_folder;
    private $fotodefault;

    public function __construct()
    { //o atributo de classe é herdado da classe pai 'Controller'
        $this->model = new PerfilModel;
        $this->img_folder = $this->model->getImageFolder();
        $this->fotodefault = IMG_UPLOADS_FOLDER . 'icon-user.jpg';
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
            'pagesubtitle' => '',
            'pagetitle' => 'Perfis',
            //pasta de imagens de perfil
            'img_folder' => $this->img_folder,
            'foto_default' => $this->fotodefault,
            'list' => $perfil_list
        ];

        $this->view = new View('Perfil', 'start');
        $this->view->output($dados);
    }


    public function formperfil($id = null)
    {
        if ($id) {
            $perfilarr = $this->model->getPerfil($id);

            if (!file_exists($this->img_folder . $id . '.jpg')) {
                $this->model->getFoto($id);
                //Session::put('fail', 'Pegou foto!');
            } else {
                //Session::put('fail', 'Foto já existia!');
            }

            $nasc = new DateTime($perfilarr['dt_nascimento']);
            $perfilarr['dt_nascimento'] = $nasc->format('d/m/Y');
            $perfilarr['im_foto'] = $this->imFoto($perfilarr);

            $dados = array(

                'pagetitle' => $perfilarr['nm_pessoa_fisica'],
                'pagesubtitle' => 'Atualizar Perfil.',
                'id' => $id,
                'perfil' => $perfilarr
            );
        } else {
            $dados = array(
                'pagetitle' => 'Cadastro de Perfil',
                'pagesubtitle' => 'Pessoa Física.',
                'id' => null,
                'perfil' => array(
                    'cd_cgc' => '',
                    'cd_profissao' => '',
                    'nm_pessoa_fisica' => '',
                    'email' => '',
                    'cpf' => '',
                    'rg' => '',
                    'org_rg' => '',
                    'fone' => '',
                    'celular' => '',
                    'dt_nascimento' => '',
                    'ie_sexo' => '',
                    'im_foto' => $this->fotodefault
                )
            );
        }

        $this->view = new View('Perfil', 'formperfil');
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

        $foto = $this->imFoto($perfilarr);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            //pasta de imagens de perfil
            'img_folder' => $this->img_folder,
            'foto' => $foto,
            //todos os atributos do perfil
            'perfil' => $perfilarr
        );

        $this->view = new View('Perfil', 'visualizar');
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

        $foto = $this->imFoto($perfilarr);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            //pasta de imagens de perfil
            'foto' => $foto,
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

                $this->setDados();
                try {
                    if (!$id) {
                        $this->model->create($this->dados);
                    } else {
                        $this->model->updatePerfil($id, $this->dados);
                    }
                    Session::flash('sucesso', 'Perfil cadastrado com sucesso.', 'success');
                } catch (Exception $e) {
                    CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            } else {

            }
        }
    }

    private function setDados()
    {
        $this->dados = array(
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
        );

        $this->fotoPerfil();
    }

    /**
     * Instancia um objeto da classe Validate que
     * valida as informações recebidas pelo formulário
     * @todo Removido a validação unique, pois está impossibilitando a atualização de perfil
     */
    public function validatePerfilInfo()
    {
        $this->fotoPerfil();
        return true;
    }

    public function fotoPerfil()
    {
        if ($this->model->recebefoto()) {
            return true;
        }

        return false;
    }

    /**
     * Recebe um array com os dados do perfil e retorna o endereço da imagem do perfil
     * caso o perfil não tenha imagem, retorna endereço de uma imagem padrão
     * @param array $perfiarr = Array com o resgistro completo do usuário
     * @return string = endereço da foto que será mostrada
     */
    private function imFoto(array $perfiarr)
    {
        return $perfiarr['im_foto'] ?
            $this->img_folder . $perfiarr['cd_pessoa_fisica'] .
            '.jpg' : $this->fotodefault;
    }
}