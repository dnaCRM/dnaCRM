<?php

class User extends Controller
{
    private $validation;

    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function processLogin()
    {
        /** o login é executado somente se esxistir um input
         * e se receber um token do formulário */
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $this->validateLoginInput();

                if ($this->validation->passed()) {

                    $login = $this->model->login(Input::get('usuario'), Input::get('senha'));
                    //$this->model->logout();
                    if ($login) {
                        Session::flash('msg', 'Logado!');
                        Redirect::to(SITE_URL);
                    } else {
                        Session::flash('msg', 'Falha no login!');
                    }

                    Session::flash('sucesso', 'Você está logado.');

                } else {
                    // errors
                    foreach ($this->validation->erros() as $erro) {
                        CodeError($erro, E_USER_WARNING);
                    }

                }
            }
        }
    }


    /**
     * 
     */
    public function processRegister()
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $this->validateRegisterInput();

                if ($this->validation->passed()) {

                    $salt = Hash::salt(32);

                    try {
                        $this->model->create([
                            'usuario' => Input::get('usuario'),
                            'senha' => Hash::make(Input::get('senha'), $salt),
                            'salt' => $salt,
                            'nome_usuario' => Input::get('nome_usuario'),
                            'data_cadastro' => (new DateTime())->format('Y-m-d H:i:s'),
                            'data_atualizado' => (new DateTime())->format('Y-m-d H:i:s'),
                            'grupo' => 1
                        ]);

                        Session::flash('msg', 'Você está registrado.');

                    } catch (Exception $e) {
                        CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                    }

                } else {
                    // errors
                    foreach ($this->validation->erros() as $erro) {
                        CodeError($erro, E_USER_WARNING);
                    }
                }
            }
        }
    }

    private function validateLoginInput()
    {
        $validate = new Validate;
        $this->validation = $validate->check($_POST, array(
            'usuario' => array(
                'required' => true,
                'min' => 3,
                'max' => 10
            ),
            'senha' => array(
                'required' => true,
                'min' => 6,
            )
        ));
    }

    private function validateRegisterInput()
    {
        $validate = new Validate;
        $this->validation = $validate->check($_POST, array(
            'usuario' => array(
                'required' => true,
                'min' => 3,
                'max' => 10,
                'unique' => 'usuarios'
            ),
            'senha' => array(
                'required' => true,
                'min' => 6,
            ),
            'confirmar_senha' => array(
                'required' => true,
                'matches' => 'senha'
            ),
            'nome_usuario' => array(
                'required' => true,
                'min' => 3,
                'max' => 255
            )
        ));
    }

    public function start()
    {
        $userlist = $this->model->fullList();

        $dados = [
            'pagesubtitle' => 'Lista',
            'pagetitle' => 'Usuários',
            'list' => $userlist
        ];

        $this->view = new View('User', 'start');
        $this->view->output($dados);
    }

    public function registerUser()
    {
        $dados = [
            'pagesubtitle' => 'Register Screen - Testes com Banco de dados',
            'pagetitle' => 'Testando'
        ];

        $this->view = new View('User', 'registerUser');
        $this->view->output($dados);
    }

    public function loginScreen()
    {
        $dados = [
            'pagesubtitle' => 'Login Screen - Acesso ao Sistema',
            'pagetitle' => 'dnaCRM'
        ];

        $this->view = new View('User', 'loginScreen');
        $this->view->output($dados, 'login');
    }

    public function logoff()
    {
        $this->model->logout();
        Redirect::to(SITE_URL);
    }
}