<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 14/10/14
 * Time: 22:39
 */

class Apartamento extends Controller
{
    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new ApartamentoDAO());
    }


    public function start()
    { //Pega a lista completa de apartamentos
        $apartamento_list = (array)$this->model->fullList();

        // Exporta imagens de perfil
        //$this->exportaImagens($perfil_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Apartamento',
            'list' => $apartamento_list
        );

        $this->view = new View('Apartamento', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados de apartamento. Este array irá popular o formulário
     * permitindo editar dados do apartamento e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo apartamento
     */
    public function formapartamento($id = null)
    {
        $setor = (new setorDAO())->fullList(); // MINHA DUVIDA ESTA AQUI PAULO

        if ($id) {
            /** @var ApartamentoDTO */
            $apartamentoarr = $this->findById($id);

            $dados = array(

                'pagetitle' => 'Atualizar Apartamento.',
                'pagesubtitle' => '',
                'setor' => $setor, // MINHA DUVIDA ESTA AQUI PAULO
                'id' => $id,
                'apartamento' => $apartamentoarr
            );
        } else {
            $apartamento = new ApartamentoDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Apartamento',
                'pagesubtitle' => '',
                'setor' => $setor, // MINHA DUVIDA ESTA AQUI PAULO
                'id' => null,
                'apartamento' => $apartamento
            );
        }

        $this->view = new View('Apartamento', 'formapartamento');
        $this->view->output($dados);
    }


    /**
     * @param string $id = id(chave primária da tabela de apartamento)
     * O método recebe o id e monta respectiva a tela de apartamento
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $apartamentoarr = $this->findById($id);

        // Exporta imagem de perfil

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => '',
            //o campo 'nome' vai ser o título da página
            'pagetitle' => 'Apartamento',
            //todos os atributos do perfil
            'apartamento' => $apartamentoarr
        );

        $this->view = new View('Apartamento', 'visualizar');
        $this->view->output($dados);
    }

    /**
     * Este método monta a tela de confirmação antes de apagar
     * o Apartamento
     * @param $id = id do apartamento a ser deletado
     */
    public function confirmDelete($id)
    {
        $id = (int)$id;

        $apartamentoarr = $this->findById($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => '',
            //o campo 'nome' vai ser o título da página
            'pagetitle' => 'Apartamento',
            'apartamento' => $apartamentoarr
        );

        $this->view = new View('Apartamento', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $apartamento = $this->setDados();

                try {
                    $this->model->gravar($apartamento);
                    Session::flash('sucesso_salvar_apartamento', 'Cadastro salvo!', 'success');
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }

    }

    private function setDados()
    {
        $dto = new ApartamentoDTO();

        $dto->setCdApartamento(Input::get('cd_apartamento'))
            ->setCdSetor(Input::get('cd_setor'))
            ->setDescApartamento(Input::get('desc_apartamento'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerApartamento(ApartamentoDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                //$this->model->delete($dto);
                echo 'Deletou Apartamento';

            }
        }
    }


    protected function findById($id)
    {
        if (!$obj = $this->model->getById($id)) {
            /** Envia mensagem */
            Session::flash('fail', 'Cadastro não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }
} 