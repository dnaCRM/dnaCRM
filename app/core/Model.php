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

    /**
     * @return mixed
     */
    public function getPk()
    {
        return $this->pk;
    }

}