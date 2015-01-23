<?php


class Profissao extends Controller
{
    public function __construct()
    {
        $this->setModel(new ProfissaoDAO());
    }

    public function request()
    {
        if (Input::exists()) {

            if (Input::get('del_prof') != 's') {
                $this->cadastra();
            } else {
                $this->apagar();
            }
        }
    }

    private  function cadastra()
    {
        $profissao = $this->setDados();

        try {
            $prof = $this->model->gravar($profissao);
        } catch (Exception $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        $return = array(
            'id_profissao' => $prof->getCdProfissao(),
            'nome_profissao' => $prof->getNmProfissao(),
            'delete' => 'n'
        );

        echo json_encode($return);
    }

    private function apagar()
    {
        $id = Input::get('id_profissao');

        $dto = $this->model->getById($id);
        $profissao = $this->model->delete($dto);

        $return = array(
            'id_profissao' => $profissao->getCdProfissao(),
            'nome_profissao' => $profissao->getNmProfissao(),
            'delete' => 's'
        );

        echo json_encode($return);
    }

    public function findById($id)
    {
        $profissao = $this->model->getById($id);

        $return = array(
            'id_profissao' => $profissao->getCdProfissao(),
            'nome_profissao' => $profissao->getNmProfissao()
        );

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new ProfissaoDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdProfissao(Input::get('id_profissao'))
            ->setNmProfissao(Input::get('nome_profissao'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }


    public function checkExisteNome()
    {
        $nome = Input::get('nome_profissao');
        $id = Input::get('id_profissao');

        $queryString = "nm_profissao ilike '{$nome}'";

        if ($id) {
            $queryString .= " AND cd_profissao != {$id}";
        }

        $return = $this->model->get($queryString);


        $return = array(
            'valid' => (count($return) > 0 ? false : true)
        );

        echo json_encode($return);
    }
} 