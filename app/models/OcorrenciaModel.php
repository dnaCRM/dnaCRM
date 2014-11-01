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
        $setor = '';
        if ($this->dto->getCdSetor()) {
            $setor = (new SetorDAO())->getById($this->dto->getCdSetor())->getNmSetor();
        }

        $categoria = new CategoriaValorDAO();
        $estagio = '';
        if ($this->dto->getCdCatgEstagio()) {
            $catg = $categoria->getBy2Ids($this->dto->getCdVlCatgEstagio(), $this->dto->getCdCatgEstagio());
            $estagio = $catg->getDescVlCatg();
        }

        return array(
            'cd_ocorrencia' => $this->dto->getCdOcorrencia(),
            'cd_setor' => $this->dto->getCdSetor(),
            'setor' => $setor,
            'cd_pf_informante' => $this->dto->getCdPfInformante(),
            'informante' => $informante->getNmPessoaFisica(),
            'desc_assunto' => $this->dto->getDescAssunto(),
            'desc_ocorrencia' => $this->dto->getDescOcorrencia(),
            'dt_ocorrencia' => (new DateTime($this->dto->getDtOcorrencia()))->format('d/m/Y'),
            'dt_fim' => ($this->dto->getDtFim() ? (new DateTime($this->dto->getDtFim()))->format('d/m/Y') : 'em aberto'),
            'desc_conclusao' => $this->dto->getDescConclusao(),
            'cd_catg_estagio' => $this->dto->getCdCatgEstagio(),
            'cd_vl_catg_estagio' => $this->dto->getCdVlCatgEstagio(),
            'estagio' => $estagio,
        );
    }

    public function getPessoasEnvolvidas(OcorrenciaPessoaFisicaEnvolvidaModel $pessoas)
    {
        return $pessoas->getPessoasPorOcorrencia(new PessoaFisicaModel(), $this->dto->getCdOcorrencia());
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