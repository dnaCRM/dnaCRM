<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 13/10/14
 * Time: 22:54
 */

class OrdemServico extends Controller
{
    /** @var  OrdemServicoModel */
    private $ordemServicoModel;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new OrdemServicoDAO());
        $this->ordemServicoModel = new OrdemServicoModel();
    }

    public function start()
    { //Pega a lista completa de perfis
        $perfil_list = (array)$this->model->fullList();

        $dados = array(
            'pagesubtitle' => '',
            'pagetitle' => 'Ordens de Serviço',
            'list' => $perfil_list
        );

        $this->view = new View('OrdemServico', 'start');
        $this->view->output($dados);
    }

    /**
     * @param int $id = Caso receba um id retorna um array
     * para a view com os dados do perfil. Este array irá popular o formulário
     * permitindo editar dados do perfil e gravar no banco
     * Se não receber um id o formulário estará vazio e permitirá registrar
     * um novo perfil
     */
    public function formOrdemServico($id = null)
    {
        $condominios = (new PessoaJuridicaDAO())->get('cd_ramo_atividade = 107');
        $ocorrencia = (new OcorrenciaDAO())->fullList();
        $executor = (new PessoaFisicaDAO())->fullList();
        $solicitante = (new PessoaFisicaDAO())->fullList();
        $estagio = (new CategoriaValorDAO())->get('cd_categoria = 3');
        $tipo = (new CategoriaValorDAO())->get("cd_categoria = 13 AND genero = 'GR'");

        if ($id) {
            /** @var OrdemServicoDTO */
            $perfilarr = $this->findById($id);
            $os_dados = $this->ordemServicoModel->setDTO($perfilarr)->getArrayDados();

            $dt_inicio = new DateTime($perfilarr->getDtInicio());
            $perfilarr->setDtInicio($dt_inicio->format('d/m/Y'));

            if ($perfilarr->getDtFim()) {
                $dt_fim = new DateTime($perfilarr->getDtFim());
                $perfilarr->setDtFim($dt_fim->format('d/m/Y'));
            }
            $sub_tipos = (new CategoriaValorDAO())->get("cd_grupo = {$perfilarr->getCdVlCatgTipo()}");

            $dados = array(

                'pagetitle' => $perfilarr->getDescAssunto(),
                'pagesubtitle' => 'Atualizar OS.',
                'id' => $id,
                'perfil' => $perfilarr,
                'ocorrencia' => $ocorrencia,
                'executor' => $executor,
                'solicitante' => $solicitante,
                'estagio' => $estagio,
                'tipo' => $tipo,
                'sub_tipos' => $sub_tipos,
                'condominios' => $condominios,
                'dados' => $os_dados,
            );
        } else {
            $perfil = new OrdemServicoDTO();
            $dados = array(
                'pagetitle' => 'Cadastro de Ordem de Servico',
                'pagesubtitle' => 'Ordem de Servico',
                'id' => null,
                'perfil' => $perfil,
                'ocorrencia' => $ocorrencia,
                'executor' => $executor,
                'solicitante' => $solicitante,
                'estagio' => $estagio,
                'tipo' => $tipo,
                'condominios' => $condominios
            );
        }

        $this->view = new View('OrdemServico', 'formOrdemServico');
        $this->view->output($dados);
    }

    /**
     * @param string $id = id(chave primária da tabela de perfis)
     * O método recebe o id e monta respecttiva a tela de perfil
     */
    public function visualizar($id = null)
    {
        $id = (int)$id;
        $ordemServicoDTO = $this->findById($id);
        $this->ordemServicoModel->setDTO($ordemServicoDTO);
        $ordemServico = $this->ordemServicoModel->getArrayDados();

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagesubtitle' => $ordemServico['desc_assunto'],
            //o campo 'nome' vai ser o título da página
            'pagetitle' => 'Ordem de Serviço',
            //todos os atributos do perfil
            'ordem_servico' => $ordemServico
        );

        $this->view = new View('OrdemServico', 'visualizar');
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

        $perfilarr = $this->findById($id);

        $dados = array(
            //o campo 'obs' vai ser o subtítulo
            'pagetitle' => $perfilarr->getDescAssunto(),
            //o campo 'nome' vai ser o título da página
            'pagesubtitle' => '',
            'perfil' => $perfilarr
        );

        $this->view = new View('OrdemServico', 'confirmDelete');
        $this->view->output($dados);
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {
        if (Input::exists()) {
            if (Token::check(Input::get('token'))) {

                $ordemServico = $this->setDados();

                try {
                    $obj = $this->model->gravar($ordemServico);
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
        $dto = new OrdemServicoDTO();

        $dto->setCdOrdemServico(Input::get('ordemservico'))
            ->setCdSetor(Input::get('cd_setor'))
            ->setCdOcorrencia(Input::get('ocorrencia'))
            ->setCdPfExecutor(Input::get('executor'))
            ->setCdPfSolicitante(Input::get('solicitante'))
            ->setDescAssunto(Input::get('assunto'))
            ->setDescOrdemServico(Input::get('descricao'))
            ->setDtInicio(Input::get('dt_inicio'))
            ->setDtFim(Input::get('dt_fim'))
            ->setCdCatgEstagio(Input::get('estagio')?3:null)
            ->setCdVlCatgEstagio((int)Input::get('estagio'))
            ->setCdCatgTipo(13)
            ->setCdVlCatgTipo((int)Input::get('tipo'))
            ->setCdCatgSubTipo(13)
            ->setCdVlCatgSubTipo((int)Input::get('sub_tipo'))
            ->setCdCatgAvalAtendimento(Input::get('aval_atend')?15:null)
            ->setCdVlCatgAvalAtendimento((int)Input::get('aval_atend'))
            ->setCdCatgAvalQualidade(Input::get('aval_quali')?15:null)
            ->setCdVlCatgAvalQualidade((int)Input::get('aval_quali'))
            ->setDescConclusao(Input::get('desc_conclusao'))
            ->setValorMaterial(getMoeda(Input::get('valor_material')))
            ->setValorServico(getMoeda(Input::get('valor_servico')))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function removerOrdemServico(OrdemServicoDTO $dto) {
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
            Session::flash('fail', 'Cadastro não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }

} 