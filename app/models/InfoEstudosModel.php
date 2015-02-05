<?php

class InfoEstudosModel extends Model
{
    /** @var  InfoEstudosDTO */
    private $dto;
    /** @var  InfoEstudosDAO */
    private $dao;

    public function __construct()
    {
        $this->dao = new InfoEstudosDAO();
    }

    public function getArrayDados()
    {

    }

    public function getDAO()
    {
        return $this->dao;
    }

    public function setDTO(InfoEstudosDTO $dto)
    {
        $this->dto = $dto;
        return $this;
    }
} 