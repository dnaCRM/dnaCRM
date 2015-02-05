<?php

class CidadesDAO extends DataAccessObject
{
    public function __construct(){

        parent::__construct();
        $this->tabela = 'tb_cidades';
        $this->primaryKey = 'id';
        $this->dataTransfer = 'CidadesDTO';
    }
}