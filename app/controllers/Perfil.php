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
    private $fotoperfil = false;
    private $img_folder;
    private $erros_arr = array();

    public function __construct()
    { //o atributo de classe é herdado da classe pai 'Controller'
        $this->model = new PerfilModel;
        $this->img_folder = $this->model->getImgFolder();
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = $this->model->fullList();

        foreach ($perfil_list as $perfil) {

            if (!file_exists($this->img_folder . $perfil['cd_pessoa_fisica'] . '.jpg')) {
                $this->model->getPerfilFoto($perfil['cd_pessoa_fisica']);
                Session::put('fail', 'Pegou foto!');

            } else {
                Session::put('fail', 'Foto já existia!');
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
            $this->model->getPerfilFoto($id);
            Session::put('fail', 'Pegou foto!');
        } else {
            Session::put('fail', 'Foto já existia!');
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
            $this->model->getPerfilFoto($id);
            Session::put('fail', 'Pegou foto!');
        } else {
            Session::put('fail', 'Foto já existia!');
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

                    var_dump($this->dados);
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
                    foreach ($this->validation->erros() as $item =>$erro) {
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
     */
    public function validatePerfilInfo()
    {
        $this->fotoPerfil();

        $validate = new Validate;

        if (!$this->fotoperfil) {
            $validate->addErro('im_foto','Arquivo inválido');
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
                'unique' => 'pessoa_fisica_tb'
            ),
            'rg' => array(
                'required' => true,
                'min' => 6,
                'max' => 12,
                'unique' => 'pessoa_fisica_tb'
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
                'unique' => 'pessoa_fisica_tb'
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

    /**
     * Método para manipulação da foto do perfil
     * Este método utiliza uma classe externa que não foi criada por mim
     * @var ImageManipulator $manipulator
     */
    public function fotoPerfil()
    {
        if (Input::exists('files')) {
            $fotoperfil = isset($_FILES['im_foto']) ? $_FILES['im_foto'] : null;

            if ($fotoperfil['error'] > 0) {
                echo "Error: " . $fotoperfil['error'] . ". Nenhum arquivo enviado.<br />";
                $this->fotoperfil =  false;
            } else {
                // array com extensões válidas
                $validExtensions = array('.jpg', '.jpeg');
                // pega a extensão do arquivo enviado
                $fileExtension = strrchr($fotoperfil['name'], ".");
                // testa se extensão é permitida
                if (in_array($fileExtension, $validExtensions)) {
                    $newname = 'imagem.tmp';
                    $manipulator = new ImageManipulator($fotoperfil['tmp_name']);
                    $width = $manipulator->getWidth();
                    $height = $manipulator->getHeight();
                    $centreX = round($width / 2);
                    $centreY = round($height / 2);
                    // o tamanho da imagem poderia ser 200x200
                    $x1 = $centreX - $centreY; // 200 / 2
                    $y1 = 0; // 200 / 2

                    $x2 = $centreX + $centreY; // 200 / 2
                    $y2 = $centreY * 2; // 200 / 2

                    // corta no centro  200x200

                    $manipulator->crop($x1, $y1, $x2, $y2);
                    $manipulator->resample(400, 400, true);

                    $manipulator->save(IMG_UPLOADS_FOLDER . $newname);

                    $this->model->setFotoPerfil($newname);
                    $this->fotoperfil = true;

                } else {
                    $this->fotoperfil = false;
                }
            }
        }
    }
}