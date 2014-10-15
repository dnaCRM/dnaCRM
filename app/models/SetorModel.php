<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 14/10/14
 * Time: 23:50
 */
class SetorModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('tb_setor');
        $this->setPrimaryKey('cd_setor');
    }
}