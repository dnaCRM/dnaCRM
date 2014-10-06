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
     * @throws Exception
     */
    public function gravar(PessoaFisicaTelefoneDTO $dto)
    {
        if ($dto->getCdPfFone() == '') {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Inserir Telefone');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Telefone');
            }
        }
    }
} 