<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 17:38
 */

class PessoaJuridicaTelefoneDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pj_telefone';
        $this->primaryKey = 'cd_pj_fone';
        $this->dataTransfer = 'PessoaJuridicaTelefoneDTO';
    }

    /**
     * @param PessoaJuridicaTelefoneDTO $dto
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(PessoaJuridicaTelefoneDTO $dto)
    {
        if ($dto->getCdPjFone() == '') {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Inserir Telefone');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Telefone');
            }
        }

        return $obj;
    }

    /**
     * @param $where
     * @return bool | DataTransferObject
     */
    public function get($where)
    {
        return $this->select($where, null, null, "{$this->primaryKey} desc");
    }
} 