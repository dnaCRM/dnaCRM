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
        if ($this->dto->getCdPfExecutor()) {
            $executor = $pessoaFisicaDao->getById($this->dto->getCdPfExecutor())
                ->getNmPessoaFisica();
        }

        $solicitante = '';
        if ($this->dto->getCdPfSolicitante()) {
            $solicitante = $pessoaFisicaDao->getById($this->dto->getCdPfSolicitante())
                ->getNmPessoaFisica();
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

        return array(
            'cd_ordem_servico' => $this->dto->getCdOrdemServico(),
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ordem_servico' => $this->dto->getDescOrdemServico(),
            'desc_ocorrencia' => $ocorrencia,
            'cd_pf_executor' => $this->dto->getCdPfExecutor(),
            'executor' => $executor,
            'cd_pf_solicitante' => $this->dto->getCdPfSolicitante(),
            'solicitante' => $solicitante,
            'cd_catg_estagio' => $this->dto->getCdCatgEstagio(),
            'cd_vl_catg_estagio' => $this->dto->getCdVlCatgEstagio(),
            'estagio' => $estagio,
            'desc_conclusao' => $this->dto->getDescConclusao(),
            'dt_inicio' => (new DateTime($this->dto->getDtInicio()))->format('d/m/Y'),
            'dt_fim' => (new DateTime($this->dto->getDtFim()))->format('d/m/Y'),
        );
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