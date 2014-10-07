<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 22/07/14
 * Time: 21:16
 */

abstract class Controller
{
    /** @var  DataAccessObject */
    protected $model;
    /** @var  View */
    protected $view;
    protected $dados;

    protected  function setModel(DataAccessObject $model)
    {
        $this->model = $model;
    }

    protected function getModel()
    {
        return $this->model;
    }

    protected function findById($id)
    {
        if (!$obj = $this->model->getById($id)) {
            /** Envia mensagem */
            Session::flash('fail', 'Cadastro não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }

    /**
     * Deve receber um array contento objetos do tipo PessoaFisicaDTO
     * Percorre os objetos testando se as imagens já foram exportadas
     * e exporta caso necessário
     * @param array $arr_perfil
     */
    protected function exportaImagens(array $arr_perfil)
    {
        foreach($arr_perfil as $perfil) {
            if ($perfil->getImPerfil()
                && !file_exists($this->model->getImgFolder().$perfil->getCdPessoaFisica().'.jpg')) {

                $this->model->exportaFoto($perfil->getCdPessoaFisica());

            }
        }
    }
}