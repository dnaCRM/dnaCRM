<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 23/07/14
 * Time: 17:58
 */

abstract class Model {
    protected $db;
    protected $dados;
    protected $tabela;// tabela referente ao model
    protected $primaryKey; // chave primária da tabela

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, "{$this->primaryKey} DESC");
        return $this->db->getResultado();
    }

    /**
     * @param mixed $dados
     */
    public function setDados($dados)
    {
        $this->dados = $dados;
    }


    /**
     * @return mixed
     */
    public function getDados()
    {
        return $this->dados;
    }

    /**
     * @param mixed $primary_key
     */
    public function setPrimaryKey($primary_key)
    {
        $this->primaryKey = $primary_key;
    }

    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @param mixed $tabela
     */
    public function setTabela($tabela)
    {
        $this->tabela = $tabela;
    }

    /**
     * @return mixed
     */
    public function getTabela()
    {
        return $this->tabela;
    }

}