<?php
/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 22/07/14
 * Time: 21:10
 */

class App
{
    private $controller = 'Home';
    private $method = 'start';
    private $params = array();

    public function __construct()
    {
        /*Verifica se existe uma sessão de login ativo*/
        if (!Session::exists('user')) {
            //caso o usuário não esteja logado
            //executa o método loginScreen da Classe Usuario

            require_once 'app/controllers/Usuario.php';
            return (new Usuario)->loginScreen();
        }

        $url = $this->parseUrl();

        if (file_exists('app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            /**
             * @todo Melhorar teste de permissão de rota
             */
            //Testa se o usuário tem permissão para a rota 'confirmDelete'
            if ((Session::get('nivel') > 1) && ($url[1] == 'confirmDelete' )) {
                require_once 'app/controllers/Home.php';
                return (new Home)->start();
            }

            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //reseta o array para iniciar no zero
        //se params estiver vazio, recebe um array vazio
        $this->params = $url ? array_values($url) : array();

        call_user_func_array(array($this->controller, $this->method), $this->params);
    }

    /**
     * @return array
     */
    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}