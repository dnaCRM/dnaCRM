<?php

class ApartamentoDAO extends DataAccessObject
{

    public function __construct(){

        parent::__construct();
        $this->tabela = 'tb_apartamento';
        $this->primaryKey = 'cd_apartamento';
        $this->dataTransfer = 'ApartamentoDTO';


    }


    public function gravar(ApartamentoDTO $dto)
    {
        if($dto->getCdApartamento() == ''){
           if(!$this->insert($dto)){
               throw new Exception('Impossível Inserir Apartamento!');
           }
        }else{
            if(!$this->update($dto)){
               throw new Exception('Impossível Atualizar Apartamento!') ;
            }
        }
    }










}