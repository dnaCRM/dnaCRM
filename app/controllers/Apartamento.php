<?php

class Apartamento extends Controller
{
    /** @var  ApartamentoModel */
    private $apartamentoModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new SetorDAO());
        $this->apartamentoModel = new ApartamentoModel();
    }


    public function start()
    { //Pega a lista completa de apartamentos

        $apartamento_list = $this->model->get('cd_catg_tipo = 18');
        $dados = array();
        foreach($apartamento_list as $ap) {
            $dados[] = $this->apartamentoModel->setDTO($ap)->getArrayDados();
        }

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Apartamento',
            'list' => $dados
        );

        $this->view = new View('Apartamento', 'start');
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
        $this->apartamentoModel->setDTO($apartamentoarr);
        $moradorEnderecoModel = new MoradorEnderecoModel();
        $moradores = $this->apartamentoModel->getMoradores($moradorEnderecoModel);
        $ex_moradores = $this->apartamentoModel->getExMoradores($moradorEnderecoModel);
        $dados = $this->apartamentoModel->getArrayDados();
        // Exporta imagem de perfil
        $ocorrencias = (new OcorrenciaModel())->getPorSetor($id);
        $ordens_servico = (new OrdemServicoModel())->getPorSetor($id);
        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => 'Ramal '.$dados['ramal'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => $dados['desc_apartamento'],
            //todos os atributos do perfil
            'apartamento' => $dados,
            'ocorrencias' => $ocorrencias,
            'ordens_servico' => $ordens_servico,
            'moradores' => $moradores,
            'ex_moradores' => $ex_moradores
        );

        $this->view = new View('Apartamento', 'visualizar');
        $this->view->output($dados);
    }

        /**
     * @param $id
     */
    public function listBySetorId($id)
    {
        $apartamentos = $this->model->get("cd_setor_grupo = {$id}");
        $return = '<option value="">--</option>';
        foreach ($apartamentos as $apartamento) {
            $return .= "<option value=\"{$apartamento->getSetor()}\">{$apartamento->getNmSetor()}</option>";
        }

        echo $return;
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

    public function apartamentoJSON($id)
    {
        $id = (int)$id;
        $dto = $this->findById($id);
        $return =  $this->apartamentoModel->setDTO($dto)->getArrayDados();

        echo json_encode($return);
    }
} 