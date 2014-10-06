<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 05/10/14
 * Time: 18:07
 */
class RelacionadosDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_relacionados';
        $this->primaryKey = 'cd_pessoa_fisica_1, cd_pessoa_fisica_2'; //Chave composta
        $this->dataTransfer = 'RelacionadosDTO';
    }

    /**
     * @todo A tabela correspondente a esta Classe usa chave composta.
     * Como resolver?
     */
    public function gravar(RelacionadosDTO $dto)
    {
        if (!$this->getById($dto->getCdPessoaFisica1(), $dto->getCdPessoaFisica2())) {
            if (!$this->insert($dto)) {
                throw new Exception('Impossível Gravar Relacionamento');
            }
        } else {
            if (!$this->update($dto)) {
                throw new Exception('Impossível Atualizar Relacionamento');
            }
        }
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    public function insert(DataTransferObject $dto)
    {
        $reflex = $dto->getReflex();

        $colunas = implode(', ', array_keys($reflex));
        $campos = ':' . implode(', :', array_keys($reflex));

        $sql = "INSERT INTO {$this->tabela} ({$colunas})
                VALUES ({$campos}) returning *";

        foreach ($dto->getReflex() as $atributo => $method) {
            $dados[$atributo] = $dto->{$method}();
        }

        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0];
        }
        return false;
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    public function update(DataTransferObject $dto)
    {
        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != 'cd_usuario_criacao' && $atributo != 'dt_usuario_criacao') {
                $parametros[] = $atributo . ' = :' . $atributo;
            }
        }
        $parametros = implode(', ', $parametros);

        $sql = "UPDATE {$this->tabela}
                SET {$parametros}
                WHERE cd_pessoa_fisica_1 = :cd_pessoa_fisica_1
                 AND cd_pessoa_fisica_2 = :cd_pessoa_fisica_2 returning *";

        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != 'cd_usuario_criacao' && $atributo != 'dt_usuario_criacao') {
                $dados[$atributo] = $dto->{$method}();
            }
        }

        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0];
        }
        return false;
    }

    /**
     * @param DataTransferObject $dto
     * @return bool|DataTransferObject
     */
    public function delete(DataTransferObject $dto)
    {
        $sql = "DELETE FROM {$this->tabela}
                WHERE cd_pessoa_fisica_1 = :cd_pessoa_fisica_1
                 AND cd_pessoa_fisica_2 = :cd_pessoa_fisica_2 returning *";

        if ($this->query($sql, $this->dataTransfer, array())->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * Informar código de acordo com o critério de pesquisa
     * $pf1 para pesquisar pela Pessoa Física 1 (informar null para não usar)
     * $pf2 para pesquisar pela Pessoa Física 2 (informar null para não usar)
     * Informar os dois parâmetros para pesquiser a chave primária inteira
     * @param null $pf1
     * @param null $pf2
     * @return bool|DataTransferObject
     */
    public function getById($pf1 = null, $pf2 = null)
    {
        $where = "";
        if ($pf1) {
            $pf1 = (int)$pf1;
            $where .= "cd_pessoa_fisica_1 = {$pf1}";
        } elseif ($pf2) {
            $pf2 = (int)$pf2;
            $where .= "cd_pessoa_fisica_2 = {$pf2}";
        } elseif ($pf2 && $pf2) {
            $pf1 = (int)$pf1;
            $pf2 = (int)$pf2;
            $where .= "cd_pessoa_fisica_1 = {$pf1}
                      AND cd_pessoa_fisica_2 = {$pf2}";
        }
        $this->resultado = $this->get($where);

        if ($this->resultado) {
            return $this->resultado[0];
        }

        return false;
    }

} 