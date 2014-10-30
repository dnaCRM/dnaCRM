<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 29/10/14
 * Time: 18:25
 */

class PessoaJuridicaTelefoneModel extends Model
{
    /** @var  PessoaJuridicaTelefoneDTO */
    private $dto;
    /** @var  PessoaJuridicaTelefoneDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new PessoaJuridicaTelefoneDAO();
    }

    public function getArrayDados()
    {
        $categoria = (new CategoriaValorDAO())->getBy2Ids($this->dto->getCdVlCatgFonePj(), 6)
            ->getDescVlCatg();
        $operadora = (new CategoriaValorDAO())->getBy2Ids($this->dto->getCdVlCatgOperadora(), 10)
            ->getDescVlCatg();

        return array(
            'cd_pj_fone' => $this->dto->getCdPjFone(),
            'cd_pessoa_juridica' => $this->dto->getCdPessoaJuridica(),
            'empresa' => '',
            'fone' => $this->dto->getFone(),
            'observacao' => $this->dto->getObservacao(),
            'categoria' => $categoria,
            'cd_catg_fone_pj' => $this->dto->getCdCatgFonePj(),
            'cd_vl_catg_fone_pj' => $this->dto->getCdVlCatgFonePj(),
            'operadora' => $operadora,
            'cd_catg_operadora' => $this->dto->getCdCatgOperadora(),
            'cd_vl_catg_operadora' => $this->dto->getCdVlCatgOperadora()
        );
    }

    public function getTelefonesPessoaJuridica($id)
    {
        $telefones = $this->dao->get("cd_pessoa_juridica = {$id}");
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

    public function setDTO(PessoaJuridicaTelefoneDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
}