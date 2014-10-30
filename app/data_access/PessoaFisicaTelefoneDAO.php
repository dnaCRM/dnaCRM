<?php
class PessoaFisicaTelefoneDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pf_telefone';
        $this->primaryKey = 'cd_pf_fone';
        $this->dataTransfer = 'PessoaFisicaTelefoneDTO';
    }

    /**
     * @param PessoaFisicaTelefoneDTO $dto
     * @return bool
     * @throws Exception
     */
    public function gravar(PessoaFisicaTelefoneDTO $dto)
    {
        if ($dto->getCdPfFone() == '') {
            if ($obj = !$this->insert($dto)) {
                throw new Exception('Impossível Inserir Telefone');
            }
        } else {
            if ($obj = !$this->update($dto)) {
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