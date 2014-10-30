<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 04/10/14
 * Time: 09:46
 */

class InstituicaoEnsinoDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_instituicao_ensino';
        $this->primaryKey = 'cd_instituicao';
        $this->dataTransfer = 'InstituicaoEnsinoDTO';
    }

    /**
     * @param InstituicaoEnsinoDTO $dto
     * @return bool
     * @throws Exception
     */
    public function gravar(InstituicaoEnsinoDTO $dto)
    {
        if ($dto->getCdInstituicao() == '') {
            if (!$obj = $this->insert($dto)){
                throw new Exception('Impossível Inserir Instituição');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Instituição');
            }
        }

        return $obj;
    }
} 