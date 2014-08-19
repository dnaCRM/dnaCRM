<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 23/07/14
 * Time: 17:58
 */

abstract class Model {
    protected $pk;
    protected $tabela;
    protected $dados;
    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }
    /**
     * @return mixed
     */
    public function getPk()
    {
        return $this->pk;
    }

    public function fullList()
    {
        $this->db->select($this->tabela, null, null, null, "{$this->pk} DESC");
        return $this->db->getResultado();
    }
}