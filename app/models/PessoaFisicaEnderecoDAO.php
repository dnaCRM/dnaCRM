<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 16:52
 */
class PessoaFisicaEnderecoDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pf_endereco';
        $this->primaryKey = 'nr_sequencia';
        $this->dataTransfer = 'PessoaFisicaEnderecoDTO';
    }

    /**
     * @param PessoaFisicaEnderecoDTO $dto
     * @return DataTransferObject
     * @throws Exception
     */
    public function gravar(PessoaFisicaEnderecoDTO $dto)
    {
        if ($dto->getNrSequencia() == '') {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Inserir Endereço');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Endereço');
            }
        }

        return $this->first();
    }
}