<?php


class Categoria extends Controller
{
    public function __construct()
    {
        $this->setModel(new CategoriaDAO());
    }

    public function request()
    {
        if (Input::exists()) {

            if (Input::get('del_categ') != 's') {
                $this->cadastra();
            } else {
                $this->apagar();
            }
        }
    }

    private  function cadastra()
    {
        $categoria = $this->setDados();

        try {
            $cat = $this->model->gravar($categoria);
        } catch (Exception $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        $return = array(
            'id_categoria' => $cat->getCdCategoria(),
            'nome_categoria' => $cat->getDescCategoria(),
            'delete' => 'n'
        );

        echo json_encode($return);
    }

    private function apagar()
    {
        $id = Input::get('id_categoria');

        $dto = $this->model->getById($id);
        $categoria = $this->model->delete($dto);

        $return = array(
            'id_categoria' => $categoria->getCdCategoria(),
            'nome_categoria' => $categoria->getDescCategoria(),
            'delete' => 's'
        );

        echo json_encode($return);
    }

    public function findById($id)
    {
        $categoria = $this->model->getById($id);

        $return = array(
            'id_categoria' => $categoria->getCdCategoria(),
            'nome_categoria' => $categoria->getDescCategoria()
        );

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new CategoriaDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdCategoria(Input::get('id_categoria'))
            ->setDescCategoria(Input::get('nome_categoria'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function checkExisteNome()
    {
        $nome = Input::get('nome_categoria');
        $id = Input::get('id_categoria');

        $queryString = "desc_categoria = '{$nome}'";

        if ($id) {
            $queryString .= " AND cd_categoria != {$id}";
        }

        $return = $this->model->get($queryString);


        $return = array(
            'valid' => (count($return) > 0 ? false : true)
        );

        echo json_encode($return);
    }
} 