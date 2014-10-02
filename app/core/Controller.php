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
        if (!$obj = $this->getModel()->getById($id)) {
            /** Envia mensagem */
            Session::flash('fail', 'Cadastro não encontrado', 'danger');
            /** Redireciona para página de lista de Perfis */
            Redirect::to(SITE_URL . get_called_class());
        }
        return $obj;
    }

}