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
    private $fotoperfil = 'user.jpg'; //nome padrão para imagem de usuário

    public function __construct()
    { //o atributo de classe é herdado da classe pai 'Controller'
        $this->model = new PerfilModel;
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = $this->model->fullList();

        $dados = [
            'pagesubtitle' => 'Olá mundo',
            'pagetitle' => 'Perfil',
            'list' => $perfil_list
        ];

        $this->view = new View('Perfil', 'start');
        $this->view->output($dados);
    }

    public function novo()
    {
        $dados = [
            'pagesubtitle' => 'Cadastro de Perfil',
            'pagetitle' => 'Muita calma nessa hora.'
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

        $dados = [
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['obs'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nome'],
            //todos os atributos do perfil
            'perfil' => $perfilarr
        ];

        $this->view = new View('Perfil', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Método que recebe os dados do formulário
     * faz a validação e grava no banco de dados usando o método create do model
     */
    public function newPerfil()
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $this->validatePerfilInfo();

                if ($this->validation->passed()) {

                    $this->dados = [
                        'cd_cgc' => (int)Input::get('empresa'),
                        'cd_profissao' => (int)Input::get('profissao'),
                        'nm_pessoa_fisica' => Input::get('nm_pessoa_fisica'),
                        'email' => Input::get('email'),
                        'cpf' => (int)Input::get('cpf'),
                        'rg' => Input::get('rg'),
                        'org_rg' => Input::get('org_rg'),
                        'fone' => (int)Input::get('profissao'),
                        'celular' => (int)Input::get('fone'),
                        'dt_nascimento' => Input::get('dt_nascimento'),
                        'ie_sexo' => Input::get('iesexo')
                    ];
                    try {
                        $this->model->create($this->dados);
                        Session::flash('sucesso', 'Perfil cadastrado com sucesso.');
                    } catch (Exception $e) {
                        CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                    }
                } else {
                    foreach ($this->validation->erros() as $erro) {
                        CodeError($erro, E_USER_WARNING);
                    }
                }
            }
        }
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
            $validate->addErro("Arquivo inválido");
        }

        $this->validation = $validate->check($_POST, array(
            'cd_cgc' => array(
                'min' => 3,
                'max' => 100
            ),
            'cd_profissao' => array(
                'min' => 3,
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
                'min' => 11,
                'max' => 11,
                'unique' => 'pessoa_fisica_tb'
            ),
            'rg' => array(
                'required' => true,
                'min' => 6,
                'max' => 11,
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
            $fotoperfil = isset($_FILES['fotoperfil']) ? $_FILES['fotoperfil'] : null;

            if ($fotoperfil['error'] > 0) {
                echo "Error: " . $fotoperfil['error'] . "<br />";
                $this->fotoperfil = ($fotoperfil['error'] === 4 ? $this->fotoperfil : false);
            } else {
                // array com extensões válidas
                $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
                // pega a extensão do arquivo enviado
                $fileExtension = strrchr($fotoperfil['name'], ".");
                // testa se extensão é permitida
                if (in_array($fileExtension, $validExtensions)) {
                    $newname = 'perfil-' . Input::limpar($fotoperfil['name']);
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
                    $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
                    // salva o arquivo na pasta de uploads
                    $manipulator->save('img/uploads/' . $newname);
                    $this->fotoperfil = $newname;
                } else {
                    $this->fotoperfil = false;
                }
            }
        }
    }
}