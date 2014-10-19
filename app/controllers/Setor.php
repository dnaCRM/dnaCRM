<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16/10/14
 * Time: 21:25
 */
class Setor extends Controller
{

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new SetorDAO());
    }

    public function start()
    { //Pega a lista completa de perfis
        $setor_list = (array)$this->model->fullList();

        // Exporta imagens de perfil
        $this->exportaImagens($setor_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Perfis',
            'list' => $setor_list
        );

        $this->view = new View('Setor', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     */
    public function formSetor($id = null)
    {
        $condominio = (new CondominioDAO())->fullList();


        if ($id) {
            /** @var SetorDTO */
            $setorarr = $this->findById($id);

            $dados = array(

                'pagetitle' => $setorarr->getNmSetor(),
                'pagesubtitle' => 'Atualizar Setor.',
                'condominio' => $condominio,
                'id' => $id,
                'perfil' => $setorarr
            );
        } else {
            $perfil = new SetorDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Setor',
                'pagesubtitle' => 'Setor.',
                'condominio' => $condominio,
                'id' => null,
                'perfil' => $perfil
            );
        }

        $this->view = new View('Setor', 'formSetor');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $setorarr = $this->findById($id);

        // Exporta imagem de perfil
        $this->exportaImagens($setorarr);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $setorarr->getObservacao(),
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $setorarr->getNmSetor(),
            //todos os atributos do perfil
            'perfil' => $setorarr
        );

        $this->view = new View('Setor', 'visualizar');
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

        $setorarr = $this->findById($id);

        $dados = array(
             //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $setorarr->getObservacao(),
             //o campo 'nome' vai ser o título da página
            'pagetitle' => $setorarr->getNmSetor(),
            'perfil' => $setorarr
        );

        $this->view = new View('Setor', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $setor = $this->setDados();

                try {
                    $this->model->gravar($setor);
                    Session::flash('sucesso_salvar_st', 'Cadastro salvo!', 'success');
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
            }
        }

    }

    private function setDados()
    {
        $dto = new SetorDTO();

        $dto->setCdSetor(Input::get('cd_setor'))
            ->setNmSetor(Input::get('nm_setor'))
            ->setCdCondominio(Input::get('cd_condominio'))
            ->setObservacao(Input::get('observacao'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerSetor(SetorDTO $dto) {
        if (Input::exists()) {

            if (Token::check(Input::get('token'))) {

                $this->model->delete($dto);

            }
        }
    }

    protected function findById($id)
    {
        if (!$obj = $this->model->getById($id)) {
            /** Envia mensagem */
            Session::flash('fail', 'Setor não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }

    /**
     * Deve receber um array contento objetos do tipo PessoaFisicaDTO
     * Percorre os objetos testando se as imagens já foram exportadas
     * e exporta caso necessário
     */
    protected function exportaImagens($arr_setor)
    {
        if (is_array($arr_setor)) {
            foreach ($arr_setor as $setor) {
                if ($setor->getImPerfil()
                    && !file_exists($this->model->getImgFolder() . $setor->getCdSetor() . '.jpg')
                ) {
                    $this->model->exportaFoto($setor->getCdSetor());
                }
            }
        } else {
            if ($arr_setor->getImPerfil()
                && !file_exists($this->model->getImgFolder() . $arr_setor->getCdSetor() . '.jpg')
            ) {
                $this->model->exportaFoto($arr_setor->getCdSetor());
            }
        }
    }
}