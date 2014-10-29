<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 16:52
 */
class PessoaJuridicaEnderecoDAO extends DataAccessObject
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pj_endereco';
        $this->primaryKey = 'nr_sequencia';
        $this->dataTransfer = 'PessoaJuridicaEnderecoDTO';
    }

    /**
     * @param PessoaJuridicaEnderecoDTO $dto
     * @throws Exception
     */
    public function gravar(PessoaJuridicaEnderecoDTO $dto)
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