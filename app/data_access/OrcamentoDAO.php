<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 12/10/14
 * Time: 20:30
 */

class OrcamentoDAO extends DataAccessObject {

    public function __construct(){
        parent::__construct();
        $this->tabela = 'tb_orcamento';
        $this->primaryKey = 'cd_orcamento';
        $this->dataTransfer = 'OrcamentoDTO';
    }


    public function gravar(OrcamentoDTO $dto)
    {
        if($dto->getCdOrcamento() == ''){
            if(!$obj = $this->insert($dto)){
                throw new Exception('Impossível Inserir Orçamento!');
            }
        } else {
            if(!$obj = $this->update($dto)){
                throw new Exception('Impossível Atualizar Orçamento!');
            }
        }
        return $obj;
    }



} 