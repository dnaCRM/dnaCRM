<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 22/07/14
 * Time: 21:16
 */

abstract class Controller
{
    protected $model;
    protected $view;
    protected $dados;

    protected  function setModel(Model $model)
    {
        $this->model = $model;
    }
/*
 * 
 */
    protected function getModel()
    {
        return $this->model;
    }

}