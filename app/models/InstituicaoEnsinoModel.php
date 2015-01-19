<?php

class InstituicaoEnsinoModel extends Model
{
    /** @var  InstituicaoEnsinoDTO */
    private $dto;
    /** @var  InstituicaoEnsinoDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new InstituicaoEnsinoDAO();
    }

    public function getArrayDados()
    {
        $categoria = (new CategoriaValorDAO())->getById($this->dto->getCdVlCatgInstituicao());
        $desc_categoria = $categoria->getDescVlCatg();

        return array(
            'cd_instituicao' => $this->dto->getCdInstituicao(),
            'ds_instituicao' => $this->dto->getDsInstituicao(),
            'cd_catg_instituicao' => $this->dto->getCdCatgInstituicao(),
            'cd_vl_catg_instituicao' => $this->dto->getCdVlCatgInstituicao(),
            'desc_catg_instuicao' => $desc_categoria,
        );
    }

    public function getRelacao(){
        $lista_dto = $this->dao->fullList();
        $lista = array();

        foreach ($lista_dto as $dto) {
            $lista[] =  $this->setDTO($dto)->getArrayDados();
        }

        return $lista;

    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(InstituicaoEnsinoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 