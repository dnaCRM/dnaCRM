<?php
/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 02/08/14
 * Time: 19:14
 */

class CondominioDAO extends DataAccessObject{


    public function __construct()
    {
        parent::__construct();
        $this->tabela = 'tb_condominio';
        $this->primaryKey = 'cd_condominio';
        $this->dataTransfer = 'CondominioDTO';
        $this->colunaImagem = 'im_perfil';
        $this->imgFolder = IMG_UPLOADS_FOLDER . "{$this->tabela}/";
        $this->fotoDefault = ICON_USER;
    }

    /**
     * @param CondominioDTO $condominio
     * @return bool|DataTransferObject
     * @throws Exception
     */
    public function gravar(CondominioDTO $condominio)
    {
        if($condominio->getCdCondominio() == ''){
            if(!$obj = $this->insert($condominio)){
                throw new Exception('Impossível Inserir Condominio');
            }
        } else {
            if(!$obj = $this->update($condominio)){
                throw new Exception ('Impossível Update Condominio');
            }
        }

        if($this->importaFoto($obj->getCdCondominio())){
           $this->exportaFoto($obj->getCdCondominio());
        }

        return $obj;
    }

    public function getImgFolder()
    {
        return $this->imgFolder;
    }

    public function getFotoDefault()
    {
        return $this->fotoDefault;
    }
} 