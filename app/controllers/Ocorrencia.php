<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 18/10/14
 * Time: 14:59
 */

Class Ocorrencia extends Controller
{

    public function __construct()
{ //o método é herdado da classe pai 'Controller'
    $this->setModel(new OcorrenciaDAO());
}


    public function start()
{ //Pega a lista completa de perfis
    $ocorrencia_list = (array)$this->model->fullList();

    $dados = array(
        'pagesubtitle' => '',
        'pagetitle' => 'Orcorrência',
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
     */
    public function formOcorrencia($id = null)
{
    $informante = (new PessoaFisicaDAO())->fullList();
    $estagio = (new CategoriaValorDAO())->get('cd_categoria = 3');

    if ($id) {
        /** @var OrdemServicoDTO */
        $ocorrenciaarr = $this->findById($id);

        $dt_ocorrencia = new DateTime($ocorrenciaarr->getDtOcorrencia());
        $ocorrenciaarr->setDtOcorrencia($dt_ocorrencia->format('d/m/Y'));

        $dt_fim = new DateTime($ocorrenciaarr->getDtFim());
        $ocorrenciaarr->setDtFim($dt_fim->format('d/m/Y'));

        $dados = array(

            'pagetitle' => $ocorrenciaarr->getDescAssunto(),
            'pagesubtitle' => 'Atualizar Ocorrência.',
            'id' => $id,
            'perfil' => $ocorrenciaarr,
            'informante' => $informante,
            'estagio' => $estagio
        );
    } else {
        $ocorrencia = new OcorrenciaDTO();
        $dados = array(
            'pagetitle' => 'Cadastro de Ocorrência',
            'pagesubtitle' => 'Ocorrência',
            'id' => null,
            'perfil' => $ocorrencia,
            'informante' => $informante,
            'estagio' => $estagio
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
    $ocorrenciaarr = $this->findById($id);


    $dados = array(
        //o campo 'obs' vai ser o subtítulo
        'pagesubtitle' => $ocorrenciaarr->getDescAssunto(),
        //o campo 'nome' vai ser o título da página
        'pagetitle' => '',
        //todos os atributos do perfil
        'perfil' => $ocorrenciaarr
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
                $this->model->gravar($ocorrencia);
                Session::flash('sucesso_salvar_oc', 'Ocorrência salva!', 'success');
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
        }
    }

}

    private function setDados()
{
    $dto = new OcorrenciaDTO();

    $dto ->setCdOcorrencia(Input::get('ocorrencia'))
        ->setCdPfInformante(Input::get('informante'))
        ->setDescAssunto(Input::get('assunto'))
        ->setDescOcorrencia(Input::get('descricao'))
        ->setDtOcorrencia(Input::get('dt_ocorrencia'))
        ->setDtFim(Input::get('dt_fim'))
        ->setDescConclusao(Input::get('desc_conclusao'))
        ->setCdCatgEstagio(3)
        ->setCdVlCatgEstagio(Input::get('estagio'))
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
            echo 'Deletou Ocorrência';

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

