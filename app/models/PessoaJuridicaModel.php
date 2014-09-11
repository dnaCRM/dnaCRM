<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 19/08/14
 * Time: 16:31
 */

class PessoaJuridicaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabela('tb_pessoa_juridica');
        $this->setPrimaryKey('cd_pessoa_juridica');
    }
} 