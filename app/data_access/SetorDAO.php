<?php

/**
 * Created by PhpStorm.
 * Usuario: Raul
 * Date: 07/10/14
 * Time: 01:43
 */
class SetorDAO extends DataAccessObject
{

    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_setor';
        $this->primaryKey = 'cd_setor';
        $this->dataTransfer = 'SetorDTO';
        $this->colunaImagem = 'im_perfil';
        $this->imgFolder = IMG_UPLOADS_FOLDER . "{$this->tabela}/";
        $this->fotoDefault = ICON_USER;

    }

    /**
     * @param SetorDTO $setor
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(SetorDTO $setor)
    {
        if ($setor->getCdSetor() == '') {
            if (!$obj = $this->insert($setor)) {
                throw new Exception('Impossível Inserir Setor');
            }
        } else {
            if (!$obj = $this->update($setor)) {
                throw new Exception('Impossível Atualizar Setor');
            }
        }

        if ($this->importaFoto($obj->getCdSetor())) {
            $this->exportaFoto($obj->getCdSetor());
        }
        return $obj;
    }


    public function getImgFolder()
    {
        return $this->imgFolder;
    }

    /**
     * @return string
     */
    public function getFotoDefault()
    {
        return $this->fotoDefault;
    }

}