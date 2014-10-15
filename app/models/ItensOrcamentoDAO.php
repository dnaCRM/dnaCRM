<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/10/14
 * Time: 00:34
 */

class ItensOrcamentoDAO extends DataAccessObject{

    public function __construct(){
        $this->tabela = 'tb_itens_orcamento';
        $this->primaryKey = 'nr_sequencia';
        $this->dataTransfer = 'ItensOrcamentoDTO';
    }

    /**
     * @param ItensOrcamentoDTO $dto
     * @throws Exception
     */
    public function gravar(ItensOrcamentoDTO $dto){
        if($dto->getNrSequencia() == ''){
            if(!$this->insert($dto)){
                throw new Exception('Impossível Inserir Item Orçamento!');
            }
        }else{
            if(!$this->update($dto)){
                throw new Exception('Impossível Inserir Item Orçamento!');
            }

        }

    }

} 