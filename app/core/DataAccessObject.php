<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 13/09/14
 * Time: 22:41
 */
abstract class DataAccessObject
{
    protected $success = false;
    protected $resultado;
    protected $numRegistros;
    protected $dataTransfer;

    /** @var PDOStatement */
    protected $statement;

    protected $tabela; // tabela referente ao model
    protected $primaryKey; // chave primária da tabela
    /** @var  PDO */
    protected $con;

    public function __construct()
    {
        $this->con = DataBase::getConnection();
    }

    /**
     * @param DataTransferObject $dto
     * @return bool | DataTransferObject
     */
    public function insert(DataTransferObject $dto)
    {
        $reflex = $dto->getReflex();
        unset($reflex[$this->getPrimaryKey()]);

        $colunas = implode(', ', array_keys($reflex));
        $campos = ':' . implode(', :', array_keys($reflex));

        $sql = "INSERT INTO {$this->getTabela()} ({$colunas}) VALUES ({$campos}) returning *";

        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != $this->getPrimaryKey()) {
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
     * @return bool| DataTransferObject
     */
    public function update(DataTransferObject $dto)
    {
        foreach ($dto->getReflex() as $atributo => $method) {
            if ($atributo != $this->getPrimaryKey()) {
                $parametros[] = $atributo . ' = :' . $atributo;
            }
        }
        $parametros = implode(', ', $parametros);

        $sql = "UPDATE {$this->getTabela()} SET {$parametros} WHERE {$this->getPrimaryKey()} = :{$this->getPrimaryKey()}";

        foreach ($dto->getReflex() as $atributo => $method) {
            $dados[$atributo] = $dto->{$method}();
        }


        if ($this->query($sql, $this->dataTransfer, $dados)->success()) {
            return $this->getResultado()[0] ;
        }
        return false;
    }

    /**
     * @param null $where
     * @param null $limit
     * @param null $offset
     * @param null $orderby
     * @return bool| DataTransferObject
     */
    public function select($where = null, $limit = null, $offset = null, $orderby = null)
    {
        $where = ($where != null ? " WHERE {$where}" : "");
        $limit = ($limit != null ? " LIMIT {$limit}" : "");
        $offset = ($offset != null ? " OFFSET {$offset}" : "");
        $orderby = ($orderby != null ? " ORDER BY {$orderby}" : "");

        $sql = "SELECT * FROM {$this->tabela}{$where}{$limit}{$offset}{$orderby}";

        if ($this->query($sql, $this->dataTransfer, array())->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * @param $where
     * @return bool | DataTransferObject
     */
    public function get($where) {
        return $this->select($this->table, $where, null, null, null);
    }

    /**
     * @param $id
     * @return | DataTransferObject
     */
    public function getById($id)
    {
        return $this->get($this->tabela, "{$this->getPrimaryKey()} = {$id};")[0];
    }

    /**
     * @param DataTransferObject $dto
     * @return bool | DataTransferObject
     */
    public function delete(DataTransferObject $dto)
    {
        //$where = ($where != null ? " WHERE {$where}" : "");
        $sql = "DELETE FROM {$this->tabela} WHERE {$this->getPrimaryKey()} = {$dto->{$dto->getReflex()[$this->getPrimaryKey()]}()}";
        if ($this->query($sql, $this->dataTransfer, array())->success()) {
            return $this->getResultado();
        }
        return false;
    }

    /**
     * @param string $sql = SQL para ser preparada
     * @param DataTransferObject $obj = Objeto usado para capturar a classe
     * @param array $parametros = dados a serem enviados para o banco de dados
     * @return $this
     */
    private function query($sql, $obj, array $parametros)
    {
        try {
            $this->statement = $this->con->prepare($sql);
            if (count($parametros)) {
                $this->statement->execute($parametros);
            } else {
                $this->statement->execute();
            }
            $this->resultado = $this->statement->fetchAll(PDO::FETCH_CLASS, $this->dataTransfer);
            $this->numRegistros = $this->statement->rowCount();
            $this->success = true;
        } catch (PDOException $e) {
            $this->success = false;
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        return $this;
    }

    /**
     * @return bool
     */
    private function success()
    {
        return $this->success;
    }

    /**
     * @return mixed = resultado da query
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    public function fullList()
    {
        return $this->select($this->tabela, null, null, null, "{$this->primaryKey} DESC");

    }
    /**
     * Retorna primeiro objeto resultante da consulta ao banco de dados
     * @return PDO::FETCH_CLASS
     */
    public function first() {
        return $this->resultado[0];
    }

    /**
     * @return int $numregistros = numero de registros retornados da query
     */
    public function getNumRegistros()
    {
        return $this->numRegistros;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    /**
     * @param mixed $primaryKey
     */
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
    }

    /**
     * @param mixed $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    public function getCon()
    {
        return $this->con;
    }

}