<?php

class CategoriaValor extends Controller
{
    /** @var CategoriaValorModel */
    private $categoriaValorModel;

    public function __construct()
    {
        $this->setModel(new CategoriaValorDAO());
        $this->categoriaValorModel = new CategoriaValorModel();
    }

    public function request()
    {
        if (Input::exists()) {
            if (Input::get('del_sub_categ') != 's') {
                $this->cadastra();
            } else {
                $this->apagar();
            }
        }
    }

    private function cadastra()
    {
        $categoriaValor = $this->setDados();

        try{
            $catValor = $this->model->gravar($categoriaValor);
        } catch (Exception $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        $return = $this->categoriaValorModel->setDTO($catValor)->getArrayDados();
        $return['delete'] = 'n';

        echo json_encode($return);
    }

    private function apagar()
    {
        $id_sub_cat = Input::get('id_sub_categoria');

        $dto = $this->model->getById($id_sub_cat);
        $categoria = $this->model->delete($dto);

        $return = $this->categoriaValorModel->setDTO($categoria)->getArrayDados();
        $return['delete'] = 's';

        echo json_encode($return);

    }

    public function findById($id_sub_cat)
    {
        $dto = $this->model->getById($id_sub_cat);
        $return = $this->categoriaValorModel->setDTO($dto)->getArrayDados();

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new CategoriaValorDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdCategoria(Input::get('select_cat'))
            ->setCdVlCategoria(Input::get('id_sub_categoria'))
            ->setDescVlCatg(Input::get('nome_sub_categoria'))
            ->setGenero(Input::get('genero'))
            ->setCdGrupo(Input::get('cd_grupo'))
            ->setCdCatGrupo(Input::get('cd_cat_grupo'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function checkExisteNome()
    {
        $nome = Input::get('nome_sub_categoria');
        $id = Input::get('id_sub_categoria');

        $return = array(
            'valid' => $this->categoriaValorModel->existeNome($nome, $id)
        );

        echo json_encode($return);
    }
} 