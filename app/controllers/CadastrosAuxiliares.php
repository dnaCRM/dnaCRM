<?php

class CadastrosAuxiliares extends Controller
{
    public function start()
    {
        $dados = array(
            'pagetitle' => 'Cadastros Auxiliares',
            'pagesubtitle' => 'Cadastros Auxiliares'
        );
        $this->view = new View('CadastrosAuxiliares', 'start');
        $this->view->output($dados);
    }

    public function formcategoria()
    {
        $cvModel = new CategoriaValorModel();

        $categorias = (new CategoriaDAO())->get('cd_categoria != 4 ORDER BY desc_categoria');
        $categoria_valor = (new CategoriaValorDAO())->get('cd_categoria != 4');

        $sub_cats = array();
        foreach($categoria_valor as $sc){
            $sub_cats[] = $cvModel->setDTO($sc)->getArrayDados();
        };

        $dados = array(
            'pagetitle' => 'Cadastros Auxiliares',
            'categorias' => $categorias,
            'categoria_valor' => $sub_cats
        );
        $this->view = new View('CadastrosAuxiliares', 'formcategoria');
        $this->view->output($dados);
    }

    public function forminstensino()
    {
        $cat_inst_ensino = (new CategoriaValorDAO())->get('cd_categoria = 8');
        $instituicoes_ensino = (new InstituicaoEnsinoModel())->getRelacao();

        $dados = array(
            'pagetitle' => 'Cadastros Auxiliares',
            'cat_inst_ensino' => $cat_inst_ensino,
            'inst_ensino' => $instituicoes_ensino
        );
        $this->view = new View('CadastrosAuxiliares', 'forminstensino');
        $this->view->output($dados);
    }

    public function formprofissao()
    {
        $profissoes = (new ProfissaoDAO())->fullList();

        $dados = array(
            'pagetitle' => 'Cadastros Auxiliares',
            'profissoes' => $profissoes
        );
        $this->view = new View('CadastrosAuxiliares', 'formprofissao');
        $this->view->output($dados);
    }

    public function formrelacionamento()
    {
        $relacionamentos = (new CategoriaValorDAO())->get('cd_categoria = 4');
        $relacoes = (new RelacionamentoParametroModel())->getRelacionamentos();

        $dados = array(
            'pagetitle' => 'Cadastros Auxiliares',
            'relacionamentos' => $relacionamentos,
            'relacoes' => $relacoes,
        );
        $this->view = new View('CadastrosAuxiliares', 'formrelacionamento');
        $this->view->output($dados);
    }
} 