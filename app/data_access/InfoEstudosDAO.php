<?php

class InfoEstudosDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_info_estudos';
        $this->primaryKey = 'cd_info_estudos';
        $this->dataTransfer = 'InfoEstudosDTO';
    }

    /**
     * @param InfoEstudosDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(InfoEstudosDTO $dto)
    {
        if ($dto->getCdInfoEstudos() == '') {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Inserir Informações');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Informações');
            }
        }
        return $obj;
    }

    /**
     * @return bool| DataTransferObject
     */
    public function fullList()
    {
        return $this->select(null, null, null, "cd_info_estudos");

    }
} 