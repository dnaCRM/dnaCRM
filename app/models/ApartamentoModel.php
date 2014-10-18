<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 17/10/14
 * Time: 11:16
 */

class ApartamentoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('tb_apartamento');
        $this->setPrimaryKey('cd_apartamento');
    }
}