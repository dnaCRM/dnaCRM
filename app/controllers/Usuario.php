<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 01/10/14
 * Time: 18:50
 */
class Usuario extends Controller
{
    private $atualizar;

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

                $usuario = $this->setDados();
                $this->getModel()->gravar($usuario, $this->atualizar);

            }
        }
    }


    private function setDados()
    {
        $usuario = new UsuarioDTO();
        $usuario->setLogin(Input::get('usuario'))
            ->setSenha(Input::get('senha'))
            ->setCdUsuario(Input::get('id_perfil'))
            ->setNivel(Input::get('nivel'))
            ->setIeStatus(Input::get('ie_status'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $usuario;
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

        if ($usuario = $this->getModel()->getById($id)) {

            $dados = array(
                'pagesubtitle' => $pessoa->getNmPessoaFisica(),
                'pagetitle' => 'Atualização de Usuário',
                'perfil' => $pessoa,
                'usuario' => $usuario,
                'atualizar' => true
            );
        } else {

            $usuario = new UsuarioDTO();
            $dados = array(
                'pagesubtitle' => $pessoa->getNmPessoaFisica(),
                'pagetitle' => 'Cadastro de Usuário',
                'perfil' => $pessoa,
                'usuario' => $usuario,
                'atualizar' => false,
            );
        }

        $this->view = new View('Usuario', 'formuser');
        $this->view->output($dados);
    }

    public function setAtualizar($set)
    {
        $this->atualizar = $set;
    }
    /**
     * View para tela de login
     */
    public
    function loginScreen()
    {
        $dados = array(
            'pagesubtitle' => 'Acesso ao Sistema',
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