<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 19/08/14
 * Time: 16:30
 */
class ProfissoesModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'profissao_tb';
        $this->pk = 'cd_profissao';
    }
} 