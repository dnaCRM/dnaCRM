<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
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
        $this->fotoDefault = ICON_PESSOA_FISICA;
    }

    /**
     * @param PessoaFisicaDTO $pessoaFisica
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(PessoaFisicaDTO $pessoaFisica)
    {
        if ($pessoaFisica->getCdPessoaFisica() == '') {
            if (!$obj = $this->insert($pessoaFisica)) {
                throw new Exception('Impossível Inserir Pessoa Física');
            }
        } else {
            if (!$obj = $this->update($pessoaFisica)) {
                throw new Exception('Impossível Atualizar Pessoa Física');
            }
        }

        if ($this->importaFoto($obj->getCdPessoaFisica())) {
            $obj = $this->getById($obj->getCdPessoaFisica());
            $this->exportaFoto($obj->getCdPessoaFisica(), $obj->getImPerfil());
        }

        return $obj;
    }

    public function getImgFolder()
    {
        return $this->imgFolder;
    }

    /**
     * @return mixed
     */
    public function getFotoDefault()
    {
        return $this->fotoDefault;
    }

    /**
     * @return bool| DataTransferObject
     */
    public function fullList()
    {
        return $this->select(null, null, null, "nm_pessoa_fisica");

    }
}