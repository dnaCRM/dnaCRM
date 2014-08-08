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
    protected $method;
    protected $view;
    protected $data;

    public function model($model)
    {
        require_once 'app/models/' . $model . '.php';
        return new $model();
    }
}