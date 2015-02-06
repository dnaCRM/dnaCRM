<?php

class EstadosDAO extends DataAccessObject
{
    public function __construct(){

        parent::__construct();
        $this->tabela = 'tb_estados';
        $this->primaryKey = 'id';
        $this->dataTransfer = 'EstadosDTO';
    }

    /**
     * @return bool| DataTransferObject
     */
    public function fullList()
    {
        return $this->select(null, null, null, "sigla");

    }
} 