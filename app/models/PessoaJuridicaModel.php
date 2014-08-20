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
        $this->tabela = 'pessoa_juridica_tb';
        $this->pk = 'cd_cgc';
    }
} 