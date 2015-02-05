<?php


class EstadosModel extends Model
{
    /** @var  EstadosDTO */
    private $dto;
    /** @var  EstadosDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new EstadosDAO();
    }

    public function getArrayDados()
    {
        return array(
            'id' => $this->dto->getId(),
            'nome' => $this->dto->getNome(),
            'sigla' => $this->dto->getSigla()
        );
    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(EstadosDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
}