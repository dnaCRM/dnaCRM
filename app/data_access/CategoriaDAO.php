<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 11/10/14
 * Time: 21:53
 */

class CategoriaDAO extends DataAccessObject {

    public function __construct(){
        parent::__construct();
        $this->tabela = 'tb_categoria';
        $this->primaryKey = 'cd_categoria';
        $this->dataTransfer = 'CategoriaDTO';
    }

    public function gravar(CategoriaDTO $dto){
        if($dto->getCdCategoria() == ''){
            if(!$this->insert($dto)){
             throw new Exception('Impossível Inserir Categoria!');
            }
        } else {
           if(!$this->update($dto)){
            throw new Exception('Impossível Atualizar Categoria!');
           }
        }
    }

} 