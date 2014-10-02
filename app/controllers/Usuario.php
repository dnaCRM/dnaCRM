<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 01/10/14
 * Time: 18:50
 */
class Usuario extends Controller
{

    public function __construct()
    {
        $this->setModel(new UsuarioDAO());
    }

    public function processLogin()
    {
        /** o login é executado somente se existir um input
         * e se receber um token do formulário */
        if (Input::exists()) {
            //echo var_dump(Token::check(Input::get('token'))) . Input::get('token');
            //if (Token::check(Input::get('token'))) {

                $usuarioDAO = new UsuarioDAO();
                $usuarioDTO = new UsuarioDTO();
                $usuarioModel = new UsuarioModel($usuarioDAO, $usuarioDTO);

                $usuario = filter_var(Input::get('usuario'), FILTER_SANITIZE_STRING);
                $senha = filter_var(Input::get('senha'), FILTER_SANITIZE_STRING);

                if ($usuarioModel->login($usuario, $senha)) {
                    Session::flash('msg', 'Logado!', 'success');
                    Redirect::to(SITE_URL);
                } else {
                    Session::flash('msg', 'Falha no login!', 'danger');
                }
            //}
        }
    }

    /**
     * Registra um usuário com dados recebidos do formulário
     *
     */
    public function salvarUsuario($id = null)
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
        $userlist = $this->getModel()->fullList();

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
    function formuser($id = null)
    {
        $pessoaFisica = new PessoaFisicaDAO();

        if (!$id || !$pessoa = $pessoaFisica->getById($id)) {
            Redirect::to(SITE_URL . 'Home');
        }

        $usuario = $this->getModel()->getById($id);

        if ($usuario) {
            $pessoa = $pessoaFisica->getById($usuario->getCdUsuario());
            $dados = array(
                'pagesubtitle' => $pessoa->getNmPessoaFisica(),
                'pagetitle' => 'Atualização de Usuário',
                'perfil' => $pessoa,
                'usuario' => $usuario
            );
        } else {

            $usuario = new UsuarioDTO();
            $dados = array(
                'pagesubtitle' => $pessoa->getNmPessoaFisica(),
                'pagetitle' => 'Cadastro de Usuário',
                'perfil' => $pessoa,
                'usuario' => $usuario
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
        UsuarioModel::logout();
        Redirect::to(SITE_URL);
    }
} 