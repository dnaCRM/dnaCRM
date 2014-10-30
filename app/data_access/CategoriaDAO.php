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

    /**
     * @param CategoriaDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(CategoriaDTO $dto){
        if($dto->getCdCategoria() == ''){
            if(!$obj = $this->insert($dto)){
             throw new Exception('Impossível Inserir Categoria!');
            }
        } else {
           if(!$obj = $this->update($dto)){
            throw new Exception('Impossível Atualizar Categoria!');
           }
        }

        return $obj;
    }

} 