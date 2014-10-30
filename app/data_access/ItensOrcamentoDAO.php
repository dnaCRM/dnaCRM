<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 14/10/14
 * Time: 00:34
 */

class ItensOrcamentoDAO extends DataAccessObject{

    public function __construct(){

        parent::__construct();
        $this->tabela = 'tb_itens_orcamento';
        $this->primaryKey = 'nr_sequencia';
        $this->dataTransfer = 'ItensOrcamentoDTO';
    }

    /**
     * @param ItensOrcamentoDTO $dto
     * @return bool
     * @throws Exception
     */
    public function gravar(ItensOrcamentoDTO $dto){
        if($dto->getNrSequencia() == ''){
            if($obj = !$this->insert($dto)){
                throw new Exception('Impossível Inserir Item Orçamento!');
            }
        }else{
            if($obj = !$this->update($dto)){
                throw new Exception('Impossível Inserir Item Orçamento!');
            }

        }

        return $obj;
    }

} 