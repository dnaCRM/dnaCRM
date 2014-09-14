<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 22/07/14
 * Time: 21:20
 * class Home
 * Propósito: Responsável por montar e atualizar a tela de entrada do sistema
 */
class Home extends Controller
{
    private $name;

    /**
     * O construtor apenas instancia um objeto da camada de Modelo (dados)
     */
    public
    function __construct()
    {
        $this->setModel(new HomeModel);
    }

    /**
     *
     * @param string $param = um parâmetro que o método pode receber
     * e enviar para a view ou para o model se for o caso
     */
    public
    function start($param = 'Alex') // Só um exemplo de parâmetro recebido pelo método
    {

        $this->name = $param;

        /** $dados é um array que o método envia para a view usando o método output() */
        $dados = [
            'pagesubtitle' => 'Olá mundo',
            'pagetitle' => 'Página',
            'name' => $this->name
        ];

        /** O parâmetros 'Home' define o Controller e 'start' define o método que será executado*/
        $this->view = new View('Home', 'start');
        $this->view->output($dados);
    }

    public
    function test()
    {
        $dados = [
            'pagesubtitle' => 'Testes com Banco de dados',
            'pagetitle' => 'Testando'
        ];

        $this->view = new View('Home', 'test');
        $this->view->output($dados);
    }
    public
    function help()
    {
        $dados = [
            'pagesubtitle' => 'Testes com Banco de dados',
            'pagetitle' => 'Testando'
        ];

        $this->view = new View('Home', 'help');
        $this->view->output($dados);
    }

}