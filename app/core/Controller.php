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

    protected function setModel(DataAccessObject $model)
    {
        $this->model = $model;
    }

    protected function getModel()
    {
        return $this->model;
    }

}