<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16/10/14
 * Time: 21:25
 */
class Setor extends Controller
{
    /** @var  SetorModel */
    private $setorModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new SetorDAO());
        $this->setorModel = new SetorModel();
    }

    public function start()
    { //Pega a lista completa de perfis
        $setor_list = $this->model->fullList();

        $lista = array();
        foreach ($setor_list as $setor) {
            $lista[] = $this->setorModel->setDTO($setor)->getArrayDados();
        }

        // Exporta imagens de perfil
        $this->exportaImagens($setor_list);

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Setor',
            'list' => $lista
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
        $condominio = (new PessoaJuridicaDAO())->get('cd_ramo_atividade = 107');

        $torres_apartamentos = $this->model->get('cd_vl_catg_tipo = 160');
        $setores = $this->model->get('cd_catg_tipo = 17 AND cd_vl_catg_tipo != 160' );

        $tipos_setor = (new CategoriaValorDAO())->get('cd_categoria = 17');
        $tipos_apartamento = (new CategoriaValorDAO())->get('cd_categoria = 18');


        if ($id) {
            /** @var SetorDTO */
            $setorarr = $this->findById($id);

            $dados = array(

                'pagetitle' => $setorarr->getNmSetor(),
                'pagesubtitle' => 'Atualizar Setor.',
                'condominio' => $condominio,
                'id' => $id,
                'setor' => $setorarr,
                'tipos_setor' => $tipos_setor,
                'tipos_apartamento' => $tipos_apartamento,
                'setores' => $setores,
                'torres_apartamentos' => $torres_apartamentos
            );
        } else {
            $setor = new SetorDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Setor',
                'pagesubtitle' => '',
                'condominio' => $condominio,
                'id' => null,
                'setor' => $setor,
                'tipos_setor' => $tipos_setor,
                'tipos_apartamento' => $tipos_apartamento,
                'setores' => $setores,
                'torres_apartamentos' => $torres_apartamentos
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
        $setorDTO = $this->findById($id);
        $setor = $this->setorModel->setDTO($setorDTO)->getArrayDados();
        $apartamentos = $this->setorModel->getApartamentos(new ApartamentoModel());
        $ocorrencias = (new OcorrenciaModel())->getPorSetor($id);
        // Exporta imagem de perfil
        $this->exportaImagens($setorDTO);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $setor['condominio'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $setor['nm_setor'],
            //todos os atributos do perfil
            'setor' => $setor,
            'apartamentos' => $apartamentos,
            'ocorrencias' => $ocorrencias
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
            'pagesubtitle' => $setorarr->getNmSetor(),
             //o campo 'nome' vai ser o título da página
            'pagetitle' => 'Setor',
            'setor' => $setorarr
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
                    $obj = $this->model->gravar($setor);
                    $this->exportaImagens($obj);
                    return $obj;
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }
                return false;
            }
        }

    }

    private function setDados()
    {
        $dto = new SetorDTO();

        $dto
            ->setCdSetor(Input::get('cd_setor'))
            ->setCdSetorGrupo(Input::get('cd_setor_grupo'))
            ->setNmSetor(Input::get('nm_setor'))
            ->setCdCondominio((int)Input::get('cd_condominio'))
            ->setRamal(Input::get('ramal'))
            ->setObservacao(Input::get('observacao'))
            ->setCdCatgTipo((int)Input::get('cd_tipo'))
            ->setCdVlCatgTipo((int)Input::get('cd_sub_tipo'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');
        //var_dump($_POST);die;
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
     * @param $id
     */
    public function listByCondId($id)
    {
        $setores = $this->setorModel->getByCondominio((int)$id);
        $return = '<option value="">--</option>';
        foreach ($setores as $setor) {
            $return .= "<option value=\"{$setor['cd_setor']}\">{$setor['nm_setor']}</option>";
        }

        echo $return;
    }

    /**
     * @param $id
     * @param $id_condominio
     */
    public function listByTipoId($id, $id_condominio)
    {
        $id = (int)$id;
        $queryString = "cd_catg_tipo = {$id} AND cd_condominio = {$id_condominio}";
        if ($id == 18) {
            $queryString = "cd_vl_catg_tipo = 160 AND cd_condominio = {$id_condominio}";
        }
        $setores = $this->model->get($queryString);
        $return = '<option value="">Selecione</option>';
        foreach ($setores as $setor) {
            $return .= "<option value=\"{$setor->getCdSetor()}\">{$setor->getNmSetor()}</option>";
        }

        echo $return;
    }

    /**
     * @param String $nm_setor = Nome do Setor
     * @param Int $id_condominio = id FK do condominio
     */
    public function buscaPorCondAjax($nm_setor, $id_condominio)
    {
        $return = $this->setorModel->getByNmSetorIdCond($nm_setor, $id_condominio);
        echo json_encode($return);
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
                    $this->model->exportaFoto($setor->getCdSetor(),$setor->getImPerfil());
                }
            }
        } else {
            if ($arr_setor->getImPerfil()
                && !file_exists($this->model->getImgFolder() . $arr_setor->getCdSetor() . '.jpg')
            ) {
                $this->model->exportaFoto($arr_setor->getCdSetor(),$arr_setor->getImPerfil());
            }
        }
    }

    public function checkExisteNome()
    {
        $nome = Input::get('nm_setor');
        $id = Input::get('cd_setor');

        $return = array(
            'valid' => $this->setorModel->existeNome($nome, $id)
        );

        echo json_encode($return);
    }
}