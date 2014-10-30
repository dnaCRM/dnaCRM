<?php

class ApartamentoDAO extends DataAccessObject
{

    public function __construct(){

        parent::__construct();
        $this->tabela = 'tb_apartamento';
        $this->primaryKey = 'cd_apartamento';
        $this->dataTransfer = 'ApartamentoDTO';


    }

    /**
     * @param ApartamentoDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(ApartamentoDTO $dto)
    {
        if($dto->getCdApartamento() == ''){
           if(!$obj = $this->insert($dto)){
               throw new Exception('Impossível Inserir Apartamento!');
           }
        }else{
            if(!$obj = $this->update($dto)){
               throw new Exception('Impossível Atualizar Apartamento!') ;
            }
        }

        return $obj;
    }










}