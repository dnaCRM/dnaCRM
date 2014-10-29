<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 29/10/14
 * Time: 09:32
 */
class PessoaFisicaTelefoneModel extends Model
{
    /** @var  PessoaFisicaTelefoneDTO */
    private $dto;
    /** @var  PessoaFisicaTelefoneDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new PessoaFisicaTelefoneDAO();
    }

    public function getArrayDados()
    {
        $categoria = (new CategoriaValorDAO())->getBy2Ids($this->dto->getCdVlCatgFonePf(), 5)
            ->getDescVlCatg();
        $operadora = (new CategoriaValorDAO())->getBy2Ids($this->dto->getCdVlCatgOperadora(), 10)
            ->getDescVlCatg();

        return array(
            'id_pessoa_fisica' => $this->dto->getCdPessoaFisica(),
            'id_fone' => $this->dto->getCdPfFone(),
            'fone' => $this->dto->getFone(),
            'id_categoria' => $this->dto->getCdVlCatgFonePf(),
            'categoria' => $categoria,
            'id_operadora' => $this->dto->getCdVlCatgOperadora(),
            'operadora' => $operadora,
            'observacao' => $this->dto->getObservacao()
        );
    }

    public function getTelefonesPessoaFisica($id)
    {
        $telefones = $this->dao->get("cd_pessoa_fisica = {$id}");
        $lista = array();
        foreach ($telefones as $tel) {
            $lista[] = $this->setDTO($tel)->getArrayDados();
        }
        return $lista;
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(PessoaFisicaTelefoneDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 