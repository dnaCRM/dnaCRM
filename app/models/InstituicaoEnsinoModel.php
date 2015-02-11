<?php

class InstituicaoEnsinoModel extends PessoaJuridicaModel
{

    public function getRelacao(){
        $lista_dto = $this->dao->fullList();
        $lista = array();

        foreach ($lista_dto as $dto) {
            $lista[] =  $this->setDTO($dto)->getArrayDados();
        }

        return $lista;

    }

}