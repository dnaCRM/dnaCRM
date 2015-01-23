<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 18/10/14
 * Time: 14:59
 */

Class Ocorrencia extends Controller
{
    /** @var  OcorrenciaModel */
    private $ocorrenciaModel;

    public function __construct()
{ //o método é herdado da classe pai 'Controller'
    $this->setModel(new OcorrenciaDAO());
    $this->ocorrenciaModel = new OcorrenciaModel();
}


    public function start()
{ //Pega a lista completa de perfis
    $ocorrencia_list = (array)$this->model->fullList();

    $dados = array(
        'pagesubtitle' => '',
        'pagetitle' => 'Ocorrência',
        'list' => $ocorrencia_list
    );

    $this->view = new View('Ocorrencia', 'start');
    $this->view->output($dados);
}

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     * @todo Implementar busca de condomínio por Ajax para escolher Setor
     */
    public function formOcorrencia($id = null)
{
    $setor = (new SetorDAO())->fullList();
    $informante = (new PessoaFisicaDAO())->fullList();
    $estagio = (new CategoriaValorDAO())->get('cd_categoria = 3');
    $tipo = (new CategoriaValorDAO())->get('cd_categoria = 12');

    if ($id) {
        /** @var OrdemServicoDTO */
        $ocorrenciaarr = $this->findById($id);

        $dt_ocorrencia = new DateTime($ocorrenciaarr->getDtOcorrencia());
        $ocorrenciaarr->setDtOcorrencia($dt_ocorrencia->format('d/m/Y'));
        $ocorr_pessoas = $this->ocorrenciaModel->setDTO($ocorrenciaarr)->getPessoasEnvolvidas(new OcorrenciaPessoaFisicaEnvolvidaModel());

        if ($ocorrenciaarr->getDtFim()) {
            $dt_fim = new DateTime();
            $ocorrenciaarr->setDtFim($dt_fim->format('d/m/Y'));
        }

        $dados = array(

            'pagetitle' => $ocorrenciaarr->getDescAssunto(),
            'pagesubtitle' => 'Atualizar Ocorrência.',
            'id' => $id,
            'perfil' => $ocorrenciaarr,
            'setor' => $setor,
            'informante' => $informante,
            'estagio' => $estagio,
            'tipo' => $tipo,
            'pessoas' => $ocorr_pessoas
        );
    } else {
        $ocorrencia = new OcorrenciaDTO();
        $dados = array(
            'pagetitle' => 'Cadastro de Ocorrência',
            'pagesubtitle' => 'Ocorrência',
            'id' => null,
            'perfil' => $ocorrencia,
            'setor' => $setor,
            'informante' => $informante,
            'estagio' => $estagio,
            'tipo' => $tipo
        );
    }

    $this->view = new View('Ocorrencia', 'formOcorrencia');
    $this->view->output($dados);
}

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = null)
{
    $id = (int)$id;
    $ocorrenciaDTO = $this->findById($id);
    $this->ocorrenciaModel->setDTO($ocorrenciaDTO);
    $ocorrencia = $this->ocorrenciaModel->getArrayDados();
    $pessoas = $this->ocorrenciaModel->getPessoasEnvolvidas(new OcorrenciaPessoaFisicaEnvolvidaModel());

    $dados = array(
        //o campo 'obs' vai ser o subtítulo
        'pagesubtitle' => $ocorrencia['desc_assunto'],
        //o campo 'nome' vai ser o título da página
        'pagetitle' => 'Ocorrência',
        //todos os atributos do perfil
        'ocorrencia' => $ocorrencia,
        'pessoas' => $pessoas,
    );

    $this->view = new View('Ocorrencia', 'visualizar');
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


    $ocorrenciaarr = $this->findById($id);

    $dados = array(
        //o campo 'obs' vai ser o subtítulo
        'pagetitle' => $ocorrenciaarr->getDescAssunto(),
        //o campo 'nome' vai ser o título da página
        'pagesubtitle' => $ocorrenciaarr->getDescOcorrencia(),
        'perfil' => $ocorrenciaarr
    );

    $this->view = new View('Ocorrencia', 'confirmDelete');
    $this->view->output($dados);
}

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
    if (Input::exists()) {
        if (Token::check(Input::get('token'))) {

            $ocorrencia = $this->setDados();

            try {
                $obj = $this->model->gravar($ocorrencia);
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
    $dto = new OcorrenciaDTO();

    $dto ->setCdOcorrencia(Input::get('cd_ocorrencia'))
        ->setCdSetor(Input::get('setor'))
        ->setCdPfInformante(Input::get('informante'))
        ->setDescAssunto(Input::get('assunto'))
        ->setDescOcorrencia(Input::get('descricao'))
        ->setDtOcorrencia(Input::get('dt_ocorrencia'))
        ->setDtFim(Input::get('dt_fim'))
        ->setDescConclusao(Input::get('desc_conclusao'))
        ->setCdCatgEstagio(Input::get('estagio')?3:null)
        ->setCdVlCatgEstagio(Input::get('estagio'))
        ->setCdCatgTipo(Input::get('tipo')?12:null)
        ->setCdVlCatgTipo(Input::get('tipo'))
        ->setCdUsuarioCriacao(Session::get('user'))
        ->setDtUsuarioCriacao('now()')
        ->setCdUsuarioAtualiza(Session::get('user'))
        ->setDtUsuarioAtualiza('now()');

    return $dto;
}

    public function removerOcorrencia(OcorrenciaDTO $dto) {
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
            Session::flash('fail', 'Ocorrência não encontrada', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }
}

