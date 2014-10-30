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
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(PessoaJuridicaEnderecoDTO $dto)
    {
        if ($dto->getNrSequencia() == '') {
            if (!$obj = $this->insert($dto)) {
                throw new Exception('Impossível Inserir Endereço');
            }
        } else {
            if (!$obj = $this->update($dto)) {
                throw new Exception('Impossível Atualizar Endereço');
            }
        }
        return $obj;
    }
}