<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 16/10/14
 * Time: 03:05
 */
class CondominioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('tb_condominio');
        $this->setPrimaryKey('cd_condominio');
    }
}