<?php

/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 23/07/14
 * Time: 10:25
 */
class View
{
    /**
     * @var string = endereço que define qual arquivo de view será requerido
     */
    protected $viewfile;

    /**
     * @param $controllerclass = a classe Controller
     * @param $metodo = o método que será chamado (este definirá qual view será carregada)
     */
    public function __construct($controllerclass, $metodo)
    {
        $this->viewfile = 'app/views/' . $controllerclass . '/' . $metodo . '.php';
    }

    /**
     * @param array $data = array associativo que será enviado para a tela de saída (view)
     * @param string $template = modelo de página que irá carregar a view
     */
    public function output(array $data, $template = 'defaulttemplate')
    {
        $templatefile = 'app/views/' . $template . '.php';

        if (!file_exists($this->viewfile)) {
            $data['pagetitle'] = 'Erro! View não encontrada.';
            $this->viewfile = 'app/views/Erro/errorview.php';
        }

        if (file_exists($templatefile)) {
            require $templatefile;
        } else {
            require 'app/views/defaulttemplate.php';
        }
    }
}