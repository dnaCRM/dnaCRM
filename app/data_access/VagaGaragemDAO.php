<?php

/**
 * Created by PhpStorm.
 * Usuario: Raul
 * Date: 07/10/14
 * Time: 02:04
 */
class VagaGaragemDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_vaga_garagem';
        $this->primaryKey = 'cd_vaga';
        $this->dataTransfer = 'VagaGaragemDTO';
    }

    /**
     * @param VagaGaragemDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(VagaGaragemDTO $dto)
    {
        if ($dto->getCdVaga() == '') {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Inserir Vaga de Garagem');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Vaga de Garagem');
            }
        }
        return $obj;
    }
} 