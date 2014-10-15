<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 12/10/14
 * Time: 21:10
 */

class MoradorEnderecoDAO extends DataAccessObject {

     public function __construct(){
         $this->tabela = 'tb_morador_endereco';
         $this->primaryKey = 'nr_sequencia';
         $this->dataTransfer = 'MoradorEnderecoDTO';
     }

    public function gravar(MoradorEnderecoDTO $dto){
        if($dto->getNrSequencia() == ''){
            if(!$this->insert($dto)){
                throw new Exception('Impossível Inserir Morador Endereço!');
            }
        }else{
            if(!$this->update($dto)){
                throw new Exception('Impossível Atualizar Morador Endereço!');
            }
        }
    }
}