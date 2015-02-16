<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 29/10/14
 * Time: 15:40
 */
class OrdemServicoModel extends Model
{
    /** @var  OrdemServicoDTO */
    private $dto;
    /** @var  OrdemServicoDAO */
    private $dao;
    /** @var array  */
    private $icons;

    public function __construct()
    {
        $this->dao = new OrdemServicoDAO();
        $this->icons = array(
            154 => '<i class="fa fa-smile-o fa-2x"></i>',
            155 => '<i class="fa fa-meh-o fa-2x"></i>',
            156 => '<i class="fa fa-frown-o fa-2x"></i>'
        );
    }

    public function getArrayDados()
    {
        $pessoaFisicaDao = new PessoaFisicaDAO();
        $setorDTO = (new SetorDAO())->getById($this->dto->getCdSetor());
        $setorDados = (new SetorModel())->setDTO($setorDTO)->getArrayDados();

        $executor = '';
        $executor_foto = '';
        if ($this->dto->getCdPfExecutor()) {
            $execDTO = $pessoaFisicaDao->getById($this->dto->getCdPfExecutor());
            $executor = $execDTO->getNmPessoaFisica();
            $executor_foto = Image::get($execDTO);
        } else {
            $execDTO = new PessoaFisicaDTO();
            $executor = 'Executor não definido';
            $executor_foto = Image::get($execDTO);
        }

        $solicitante = '';
        $solicitante_foto = '';
        if ($this->dto->getCdPfSolicitante()) {
            $soDTO = $pessoaFisicaDao->getById($this->dto->getCdPfSolicitante());
            $solicitante = $soDTO->getNmPessoaFisica();
            $solicitante_foto = Image::get($soDTO);
        }

        $ocorrencia = '';
        $dt_ocorrencia = '';
        if ($this->dto->getCdOcorrencia()) {
            /** @var  $ocorrenciaDTO */
            $ocorrenciaDTO = (new OcorrenciaDAO())->getById($this->dto->getCdOcorrencia());
            $ocorrencia = $ocorrenciaDTO->getDescAssunto();
            $dt_ocorrencia = (new DateTime($ocorrenciaDTO->getDtOcorrencia()))->format('d/m/Y');
        }

        $categoria = new CategoriaValorDAO();
        $estagio = '';

        if ($this->dto->getCdCatgEstagio()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgEstagio(), $this->dto->getCdCatgEstagio());
            $estagio = $catg->getDescVlCatg();
        }

        $tipo = '';

        if ($this->dto->getCdCatgTipo()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgTipo(), $this->dto->getCdCatgTipo());
            $tipo = $catg->getDescVlCatg();
        }

        $sub_tipo = '';

        if ($this->dto->getCdCatgSubTipo()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgSubTipo(), $this->dto->getCdCatgSubTipo());
            $sub_tipo = $catg->getDescVlCatg();
        }

        $atendimento = '';

        if ($this->dto->getCdCatgAvalAtendimento()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgAvalAtendimento(), $this->dto->getCdCatgAvalAtendimento());
            $atendimento = $catg->getDescVlCatg();
        }

        $qualidade = '';

        if ($this->dto->getCdCatgAvalQualidade()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgAvalQualidade(), $this->dto->getCdCatgAvalQualidade());
            $qualidade = $catg->getDescVlCatg();
        }

        return array(
            'cd_ordem_servico' => $this->dto->getCdOrdemServico(),
            'cd_setor' => $this->dto->getCdSetor(),
            'setor_dados' => $setorDados,
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'desc_ocorrencia' => $ocorrencia,
            'dt_ocorrencia' => $dt_ocorrencia,
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ordem_servico' => $this->dto->getDescOrdemServico(),
            'desc_conclusao' => ($this->dto->getDescConclusao() ? $this->dto->getDescConclusao() : 'Não informada.'),
            'cd_pf_executor' => $this->dto->getCdPfExecutor(),
            'executor' => $executor,
            'executor_foto' => $executor_foto,
            'cd_pf_solicitante' => $this->dto->getCdPfSolicitante(),
            'solicitante' => $solicitante,
            'solicitante_foto' => $solicitante_foto,
            'cd_catg_estagio' => $this->dto->getCdCatgEstagio(),
            'cd_vl_catg_estagio' => $this->dto->getCdVlCatgEstagio(),
            'cd_catg_tipo' => $this->dto->getCdCatgTipo(),
            'cd_vl_catg_tipo' => $this->dto->getCdVlCatgTipo(),
            'cd_catg_sub_tipo' => $this->dto->getCdCatgSubTipo(),
            'cd_vl_catg_sub_tipo' => $this->dto->getCdVlCatgSubTipo(),
            'cd_catg_aval_atendimento' => $this->dto->getCdCatgAvalAtendimento(),
            'cd_vl_catg_aval_atendimento' => $this->dto->getCdVlCatgAvalAtendimento(),
            'desc_aval_atendimento' => $atendimento,
            'cd_catg_aval_qualidade' => $this->dto->getCdCatgAvalQualidade(),
            'cd_vl_catg_aval_qualidade' => $this->dto->getCdVlCatgAvalQualidade(),
            'desc_aval_qualidade' => $qualidade,
            'valor_material' => 'R$ ' . number_format($this->dto->getValorMaterial(), 2, ',', '.'),
            'valor_servico' => 'R$ ' . number_format($this->dto->getValorServico(), 2, ',', '.'),
            'icon_atendimento' => $this->getIcons($this->dto->getCdVlCatgAvalQualidade()),
            'icon_qualidade' => '',
            'estagio' => $estagio,
            'tipo' => $tipo,
            'sub_tipo' => $sub_tipo,
            'dt_inicio' => (new DateTime($this->dto->getDtInicio()))->format('d/m/Y'),
            'dt_fim' => ($this->dto->getDtFim() ? (new DateTime($this->dto->getDtFim()))->format('d/m/Y') : 'em aberto')
        );
    }

    private function getIcons($id)
    {
        $stringIcon = '';
        switch($id){
            case 154:
                $stringIcon = $this->icons[154];
                break;
            case 155:
                $stringIcon = $this->icons[155];
                break;
            case 156:
                $stringIcon = $this->icons[156];
                break;
        }
    }

    /**
     * @param $id = id de uma Pessoa Física
     * @return array
     */
    public function getPorExecutor($id)
    {
        $ordens = $this->dao->get("cd_pf_executor = {$id}");
        $lista = array();
        foreach($ordens as $os){
            $lista[] = $this->setDTO($os)->getArrayDados();
        }
        return $lista;
    }

    /**
     * @param $id = id de uma Pessoa Física
     * @return array
     */
    public function getPorSolicitante($id)
    {
        $ordens = $this->dao->get("cd_pf_solicitante = {$id}");
        $lista = array();
        foreach($ordens as $os){
            $lista[] = $this->setDTO($os)->getArrayDados();
        }
        return $lista;
    }

    /**
     * @param $id = id de um Setor
     * @return array
     */
    public function getPorSetor($id)
    {
        $ordens = $this->dao->get("cd_setor = {$id}");
        $lista = array();
        foreach($ordens as $os){
            $lista[] = $this->setDTO($os)->getArrayDados();
        }
        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(OrdemServicoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 