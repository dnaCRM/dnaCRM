<?php

class CadastrosAuxiliares extends Controller
{
    public function start()
    {
        $categorias = (new CategoriaDAO())->get('cd_categoria != 4 ORDER BY desc_categoria');
        $categoria_valor = (new CategoriaValorDAO())->get('cd_categoria != 4');
        $cvModel = new CategoriaValorModel();

        $sub_cats = array();
        foreach($categoria_valor as $sc){
            $sub_cats[] = $cvModel->setDTO($sc)->getArrayDados();
        };

        $dados = array(
            'categorias' => $categorias,
            'categoria_valor' => $sub_cats
        );
        $this->view = new View('CadastrosAuxiliares', 'start');
        $this->view->output($dados);
    }
} 