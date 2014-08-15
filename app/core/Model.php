<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 23/07/14
 * Time: 17:58
 */

abstract class Model {
    protected $id;
    protected $tabela;
    protected $dados;
    protected $db;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}