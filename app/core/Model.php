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
    protected $primary_key; // chave primária da tabela

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, "{$this->primary_key} DESC");
        return $this->db->getResultado();
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
        $this->primary_key = $primary_key;
    }

    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primary_key;
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