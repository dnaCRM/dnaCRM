<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 29/10/14
 * Time: 15:26
 */

class OcorrenciaModel extends Model
{
    /** @var  OcorrenciaDTO */
    private $dto;
    /** @var  OcorrenciaDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new OcorrenciaDAO();
    }

    public function getArrayDados()
    {
        $informante = (new PessoaFisicaDAO())->getById($this->dto->getCdPfInformante());

        return array(
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'cd_setor' => $this->dto->getCdSetor(),
            'cd_pf_informante' => $this->dto->getCdPfInformante(),
            'informante' => $informante->getNmPessoaFisica(),
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ocorrencia' => $this->dto->getDescOcorrencia(),
            'dt_ocorrencia' => $this->dto->getDtOcorrencia(),
            'dt_fim' => $this->dto->getDtFim(),
            'desc_conclusao' => $this->dto->getDescConclusao(),
            'cd_catg_estagio' => $this->dto->getCdCatgEstagio(),
            'cd_vl_catg_estagio' => $this->dto->getCdVlCatgEstagio(),
        );
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(OcorrenciaDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 