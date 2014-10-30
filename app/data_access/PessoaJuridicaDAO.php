<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 04/10/14
 * Time: 21:22
 */

class PessoaJuridicaDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_pessoa_juridica';
        $this->primaryKey = 'cd_pessoa_juridica';
        $this->dataTransfer = 'PessoaJuridicaDTO';
        $this->colunaImagem = 'im_perfil';
        $this->imgFolder = IMG_UPLOADS_FOLDER . "{$this->tabela}/";
        $this->fotoDefault = ICON_USER;

    }

    /**
     * @param PessoaJuridicaDTO $pessoaJuridica
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(PessoaJuridicaDTO $pessoaJuridica)
    {
        if ($pessoaJuridica->getCdPessoaJuridica() == '') {
            if (!$obj = $this->insert($pessoaJuridica)) {
                throw new Exception('Impossível Inserir Pessoa Jurídica');
            }
        } else {
            if (!$obj = $this->update($pessoaJuridica)) {
                throw new Exception('Impossível Atualizar Pessoa Jurídica');
            }
        }

        if ($this->importaFoto($obj->getCdPessoaJuridica())) {
            $this->exportaFoto($obj->getCdPessoaJuridica());
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
} 