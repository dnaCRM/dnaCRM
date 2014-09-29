<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */



class PessoaFisicaDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pessoa_fisica';
        $this->primaryKey = 'cd_pessoa_fisica';
        $this->dataTransfer = 'PessoaFisicaDTO';
        $this->colunaImagem = 'im_perfil';
        $this->imgFolder = IMG_UPLOADS_FOLDER . "{$this->tabela}/";
        $this->fotoDefault = IMG_UPLOADS_FOLDER . 'icon-user.jpg';

    }

    public function gravar(PessoaFisicaDTO $pessoaFisica)
    {
        if ($pessoaFisica->getCdPessoaFisica() == '') {
            $obj = $this->insert($pessoaFisica);
        } else {
            $obj = $this->update($pessoaFisica);
        }
        var_dump($obj);

        if ($this->importaFoto($obj->getCdPessoaFisica())) {
            $this->exportaFoto($obj->getCdPessoaFisica());
        }

    }

}