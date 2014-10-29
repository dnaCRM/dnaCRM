<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 19/08/14
 * Time: 16:30
 */
class ProfissaoModel extends Model
{
    /** @var  ProfissaoDTO */
    private $dto;
    /** @var  ProfissaoDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new ProfissaoDAO();
    }

    public function getArrayDados()
    {
        return array(
            'cd_profissao' => $this->dto->getCdProfissao(),
            'nm_profissao' => $this->dto->getNmProfissao()
        );
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(ProfissaoDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 