<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */
class Perfil extends Controller
{

    public function __construct()
    { //o atributo de classe é herdado da classe pai 'Controller'
        $this->model = new PerfilModel;
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = $this->model->getPerfilList();

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Perfis',
            'list' => $perfil_list
        );

        $this->view = new View('Perfil', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     */
    public function formperfil($id = null)
    {
        if ($id) {
            $perfilarr = $this->model->getPerfil($id);

            $nasc = new DateTime($perfilarr['dt_nascimento']);
            $perfilarr['dt_nascimento'] = $nasc->format('d/m/Y');

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
                    'cd_pessoa_juridica' => '',
                    'cd_profissao' => '',
                    'nm_pessoa_fisica' => '',
                    'email' => '',
                    'cpf' => '',
                    'rg' => '',
                    'cd_catg_org_rg' => '',
                    'fone' => '',
                    'celular' => '',
                    'dt_nascimento' => '',
                    'ie_sexo' => '',
                    'im_perfil' => $this->model->getFotoDefault()
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
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $perfilarr = $this->model->getPerfil($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            //todos os atributos do perfil
            'perfil' => $perfilarr
        );

        $this->view = new View('Perfil', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Este método monta a tela de confirmação antes de apagar
     * o Perfil
     * @param $id = id do Perfil a ser deletado
     */
    public function confirmDelete($id)
    {
        $id = (int)$id;
        $perfilarr = $this->model->getPerfil($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $perfilarr['email'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $perfilarr['nm_pessoa_fisica'],
            'perfil' => $perfilarr
        );

        $this->view = new View('Perfil', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * Médodo acionado pelo botão deletar da view confirmDelete
     * @param $id = id do Perfil a ser deletado
     */
    public function removerPerfil($id)
    {
        $id = (int)$id;
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {
                $this->model->deletePerfil($id);
            }
        }
    }

    /**
     * Método acionado pela view formperfil
     * Se um id for informado, o respectivo Perfil será atualizado
     * Caso um id não seja informado os dados serão usados para
     * criar um novo registro
     * @param int $id
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

    /**
     * Pega os dados do $_POST através da classe Helper Input
     * Faz o casting para os tipos e atribui ao array de dados
     */
    private function setDados()
    {
        $this->dados = array(
            'cd_pessoa_juridica' => (int)Input::get('cd_cgc'),
            'cd_profissao' => (int)Input::get('cd_profissao'),
            'nm_pessoa_fisica' => Input::get('nm_pessoa_fisica'),
            'email' => Input::get('email'),
            'cpf' => (string)Input::get('cpf'),
            'rg' => (string)Input::get('rg'),
            'cd_catg_org_rg' => (int)Input::get('cd_catg_org_rg'),
            'fone' => (string)Input::get('fone'),
            'celular' => (string)Input::get('celular'),
            'dt_nascimento' => Input::get('dt_nascimento'),
            'ie_sexo' => Input::get('ie_sexo')
        );

        $this->fotoPerfil();
    }

    /**
     * Executa o método recebefoto() da classe model
     * Retorna true se recebeu uma foto ou false se não recebeu
     * @return bool
     */
    public function fotoPerfil()
    {
        if ($this->model->recebefoto()) {
            return true;
        }
        return false;
    }

}