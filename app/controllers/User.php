<?php

class User extends Controller
{

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

                $login = $this->model->login(Input::get('login'), Input::get('senha'));
                //$this->model->logout();
                if ($login) {
                    Session::flash('msg', 'Logado!', 'success');
                    Redirect::to(SITE_URL);
                } else {
                    Session::flash('msg', 'Falha no login!', 'danger');
                }

                Session::flash('sucesso', 'Você está logado.', 'success');


            }
        }
    }


    /**
     * Registra um usuário com dados recebidos do formulário
     *
     */
    public function processRegister()
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $this->setDados();

                try {
                    $this->model->create($this->dados);

                    Session::flash('msg', 'Você está registrado.', 'success');

                } catch (Exception $e) {
                    CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }
    }

    public function processUpdate()
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $this->setUpdateDados();
                try {
                    $this->model->updateUser($this->dados);

                    Session::put('msg', 'Carregou ');

                } catch (Exception $e) {
                    CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }
    }

    private function setDados()
    {
        $salt = Hash::salt(32);

        $this->dados = array(
            'cd_pessoa_fisica' => Input::get('cd_pessoa_fisica'),
            'login' => Input::get('login'),
            'senha' => Hash::make(Input::get('senha'), $salt),
            'salt' => $salt,
            'nivel' => Input::get('nivel'),
            'cd_usuario_criacao' => Input::get('cd_usuario_criacao'),
            'dt_usuario_criacao' => (new DateTime())->format('Y-m-d H:i:s'),
            'cd_usuario_atualiza' => Input::get('cd_usuario_atualiza'),
            'dt_usuario_atializa' => (new DateTime())->format('Y-m-d H:i:s'),
        );
    }

    private function setUpdateDados()
    {
        $salt = Hash::salt(32);

        $this->dados = array(
            'cd_pessoa_fisica' => Input::get('cd_pessoa_fisica'),
            'login' => Input::get('login'),
            'senha' => Hash::make(Input::get('senha'), $salt),
            'salt' => $salt,
            'nivel' => Input::get('nivel'),
            'cd_usuario_criacao' => Input::get('cd_usuario_criacao'),
            'dt_usuario_criacao' => (new DateTime())->format('Y-m-d H:i:s'),
            'cd_usuario_atualiza' => Input::get('cd_usuario_atualiza'),
            'dt_usuario_atializa' => (new DateTime())->format('Y-m-d H:i:s'),
        );
    }

    /**
     * View padrão para o model User
     */
    public
    function start()
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

    /**
     * View para formulário de registro de usuário
     */
    public
    function formuser($id = null)
    {
        $dados = array(
            'pagesubtitle' => 'Cadastro de usuário ',
            'pagetitle' => 'Usuário',
            'perfil' => $id
        );

        $this->view = new View('User', 'formuser');
        $this->view->output($dados);
    }

    /**
     * View para tela de login
     */
    public
    function loginScreen()
    {
        $dados = array(
            'pagesubtitle' => 'Login Screen - Acesso ao Sistema',
            'pagetitle' => 'dnaCRM'
        );

        $this->view = new View('User', 'loginScreen');
        $this->view->output($dados, 'login');
    }

    public
    function updateUser($id = '')
    {
        $userarr = $this->model->getUser($id);

        $dados = array(
            'pagetitle' => $userarr['nome_usuario'],
            'pagesubtitle' => $userarr['usuario'],
            'user' => $userarr
        );

        $this->view = new View('User', 'updateUser');
        $this->view->output($dados);
    }

    /**
     * Método que faz logoff de usuário
     * Redireciona para a tela de entrada
     * como não há usuário logado a tela exibida é a de login
     */
    public
    function logoff()
    {
        $this->model->logout();
        Redirect::to(SITE_URL);
    }
}