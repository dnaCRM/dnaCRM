<?php

class EstadosDAO extends DataAccessObject
{
    public function __construct(){

        parent::__construct();
        $this->tabela = 'tb_estados';
        $this->primaryKey = 'id';
        $this->dataTransfer = 'EstadosDTO';
    }
} 