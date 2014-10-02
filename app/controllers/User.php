<?php

class User extends Controller
{

    public function __construct()
    {
        $this->setModel(new UserModel);
    }

    public function processLogin()
    {
        /** o login é executado somente se esxistir um input
         * e se receber um token do formulário */
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $login = $this->model->login(Input::get('login'), Input::get('senha'));

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
    public function newUser($id = null)
    {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                try {
                    if (!$id) {
                        $this->setDados();
                        $this->getModel()->create($this->dados);
                    } else {
                        $this->setUpdateDados();
                        $this->getModel()->updateUser($id, $this->dados);
                    }
                    Session::flash('msg', 'Você está registrado.', 'success');
                } catch (Exception $e) {
                    CodeFail($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }
    }


    private function setDados()
    {

        $this->dados = array(
            'cd_pessoa_fisica' => (int)Input::get('id_perfil'),
            'login' => (string)Input::get('usuario'),
            'senha' => Hash::make(Input::get('senha'), Input::get('usuario')),
            'nivel' => Input::get('nivel'),
            'ie_status' => Input::get('ie_status'),
            'cd_usuario_criacao' => (int)Input::get('id_perfil'),
            'dt_usuario_criacao' => (new DateTime())->format('Y-m-d H:i:s'),
            'cd_usuario_atualiza' => (int)Input::get('cd_usuario_atualiza'),
            'dt_usuario_atializa' => (new DateTime())->format('Y-m-d H:i:s'),
        );
    }

    private function setUpdateDados()
    {

        $this->dados = array(
            'senha' => Hash::make(Input::get('senha'), Input::get('usuario')),
            'nivel' => Input::get('nivel'),
            'ie_status' => Input::get('ie_status'),
            'cd_usuario_atualiza' => Input::get('cd_usuario_atualiza'),
            'dt_usuario_atializa' => (new DateTime())->format('Y-m-d H:i:s'),
        );
    }

    /**
     * View padrão para o model Usuario
     */
    public
    function start()
    {
        $userlist = $this->getModel()->getUserList();

        $dados = [
            'pagesubtitle' => 'Lista',
            'pagetitle' => 'Usuários',
            'list' => $userlist
        ];

        $this->view = new View('Usuario', 'start');
        $this->view->output($dados);
    }

    /**
     * View para formulário de registro de usuário
     */
    public
    function formuser($id, $update = false)
    {
        if ($update) {
            $usuarioarr = $this->getModel()->getUsuario($id);
            $dados = array(
                'pagesubtitle' => $usuarioarr['nm_usuario'],
                'pagetitle' => 'Cadastro de Usuário',
                'perfil' => $usuarioarr
            );

        } else {
            $perfil = new PerfilModel();
            $perfilarr = $perfil->getPerfil($id);
            $dados = array(
                'pagesubtitle' => $perfilarr['nm_pessoa_fisica'],
                'pagetitle' => 'Cadastro de Usuário',
                'perfil' => $perfilarr
            );
        }

        $this->view = new View('Usuario', 'formuser');
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

        $this->view = new View('Usuario', 'loginScreen');
        $this->view->output($dados, 'login');
    }

    public
    function updateUser($id = '')
    {
        $userarr = $this->getModel()->getUser($id);

        $dados = array(
            'pagetitle' => $userarr['nome_usuario'],
            'pagesubtitle' => $userarr['usuario'],
            'user' => $userarr
        );

        $this->view = new View('Usuario', 'updateUser');
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
        $this->getModel()->logout();
        Redirect::to(SITE_URL);
    }
}