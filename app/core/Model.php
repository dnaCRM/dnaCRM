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
    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primary_key;
    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, "{$this->primary_key} DESC");
        return $this->db->getResultado();
    }

    protected function emptyToNull()
    {
        foreach ($this->dados as $campo => $conteudo) {
            $this->dados[$campo] = (!empty($conteudo) ? $conteudo : null);
        }
    }
}