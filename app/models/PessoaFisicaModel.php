<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/10/14
 * Time: 17:56
 */

class PessoaFisicaModel extends Model
{
    /** @var  PessoaFisicaDTO */
    private $pessoaFisicaDTO;
    /** @var  PessoaFisicaDAO */
    private $pessoaFisicaDAO;

    public function __contruct(PessoaFisicaDTO $dto, PessoaFisicaDAO $dao)
    {
        $this->pessoaFisicaDTO = $dto;
        $this->pessoaFisicaDAO = $dao;
    }

    public function getPessoaFisica()
    {

    }

    public function getEmpresa(PessoaJuridicaDao $empresa)
    {
        return $empresa->getById($this->pessoaFisicaDTO->getCdPessoaJuridica());
    }

    public function getProfissao(ProfissaoDAO $profissao)
    {
        return $profissao->getById(($this->pessoaFisicaDTO->getCdProfissao()));
    }

    public function getOrgRg(CategoriaV $categoria)
    {

    }
} 