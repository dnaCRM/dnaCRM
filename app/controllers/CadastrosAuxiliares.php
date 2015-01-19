<?php

class CadastrosAuxiliares extends Controller
{
    public function start()
    {
        $cvModel = new CategoriaValorModel();

        $categorias = (new CategoriaDAO())->get('cd_categoria != 4 ORDER BY desc_categoria');
        $categoria_valor = (new CategoriaValorDAO())->get('cd_categoria != 4');
        $relacionamentos = (new CategoriaValorDAO())->get('cd_categoria = 4');
        $cat_inst_ensino = (new CategoriaValorDAO())->get('cd_categoria = 8');

        $relacoes = (new RelacionamentoParametroModel())->getRelacionamentos();

        $profissoes = (new ProfissaoDAO())->fullList();
        $instituicoes_ensino = (new InstituicaoEnsinoModel())->getRelacao();

        $sub_cats = array();
        foreach($categoria_valor as $sc){
            $sub_cats[] = $cvModel->setDTO($sc)->getArrayDados();
        };

        $dados = array(
            'pagetitle' => 'Cadastros Auxiliares',
            'categorias' => $categorias,
            'categoria_valor' => $sub_cats,
            'relacionamentos' => $relacionamentos,
            'relacoes' => $relacoes,
            'profissoes' => $profissoes,
            'cat_inst_ensino' => $cat_inst_ensino,
            'inst_ensino' => $instituicoes_ensino
        );
        $this->view = new View('CadastrosAuxiliares', 'start');
        $this->view->output($dados);
    }
} 