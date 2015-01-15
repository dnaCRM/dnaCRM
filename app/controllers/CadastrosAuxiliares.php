<?php

class CadastrosAuxiliares extends Controller
{
    public function start()
    {
        $categorias = (new CategoriaDAO())->fullList();

        $dados = array(
            'categorias' => $categorias
        );
        $this->view = new View('CadastrosAuxiliares', 'start');
        $this->view->output($dados);
    }
} 