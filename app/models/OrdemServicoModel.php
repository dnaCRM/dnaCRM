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

    public function __construct()
    {
        $this->dao = new OrdemServicoDAO();
    }

    public function getArrayDados()
    {
        $pessoaFisicaDao = new PessoaFisicaDAO();

        $executor = '';
        $executor_foto = '';
        if ($this->dto->getCdPfExecutor()) {
            $execDTO = $pessoaFisicaDao->getById($this->dto->getCdPfExecutor());
            $executor = $execDTO->getNmPessoaFisica();
            $executor_foto = $execDTO->getImPerfil();
        }

        $solicitante = '';
        $solicitante_foto = '';
        if ($this->dto->getCdPfSolicitante()) {
            $soDTO = $pessoaFisicaDao->getById($this->dto->getCdPfSolicitante());
            $solicitante = $soDTO->getNmPessoaFisica();
            $solicitante_foto = $soDTO->getImPerfil();
        }

        $ocorrencia = '';
        if ($this->dto->getCdOcorrencia()) {
            $ocorrencia = (new OcorrenciaDAO())->getById($this->dto->getCdOcorrencia())
                ->getDescOcorrencia();
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

        return array(
            'cd_ordem_servico' => $this->dto->getCdOrdemServico(),
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ordem_servico' => $this->dto->getDescOrdemServico(),
            'desc_ocorrencia' => $ocorrencia,
            'cd_pf_executor' => $this->dto->getCdPfExecutor(),
            'executor' => $executor,
            'executor_foto' => $executor_foto,
            'cd_pf_solicitante' => $this->dto->getCdPfSolicitante(),
            'solicitante' => $solicitante,
            'solicitante_foto' => $solicitante_foto,
            'cd_catg_estagio' => $this->dto->getCdCatgEstagio(),
            'cd_vl_catg_estagio' => $this->dto->getCdVlCatgEstagio(),
            'estagio' => $estagio,
            'cd_catg_tipo' => $this->dto->getCdCatgTipo(),
            'cd_vl_catg_tipo' => $this->dto->getCdVlCatgTipo(),
            'tipo' => $tipo,
            'desc_conclusao' => $this->dto->getDescConclusao(),
            'dt_inicio' => (new DateTime($this->dto->getDtInicio()))->format('d/m/Y'),
            'dt_fim' => ($this->dto->getDtFim() ? (new DateTime($this->dto->getDtFim()))->format('d/m/Y') : 'em aberto')
        );
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