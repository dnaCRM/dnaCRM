<?php

class InstituicaoEnsino extends Controller
{
    /** @var  InstituicaoEnsinoModel */
    private $instituicaoEnsinoModel;

    public function __construct()
    {
        $this->setModel(new InstituicaoEnsinoDAO());
        $this->instituicaoEnsinoModel = new InstituicaoEnsinoModel();
    }

    public function request()
    {
        if (Input::exists()) {
            if (Input::get('del_inst_ens') != 's') {
                $this->cadastra();
            } else {
                $this->apagar();
            }
        }
    }

    private function cadastra()
    {
        $dto = $this->setDados();

        try{
            $instEnsino = $this->model->gravar($dto);
        } catch (Exception $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        $return = $this->instituicaoEnsinoModel->setDTO($instEnsino)->getArrayDados();
        $return['delete'] = 'n';

        echo json_encode($return);
    }

    public function apagar()
    {
        $id = Input::get('id_inst_ensino');

        $dto = $this->model->getById($id);
        $instEnsino = $this->model->delete($dto);

        $return = $this->instituicaoEnsinoModel->setDTO($instEnsino)->getArrayDados();
        $return['delete'] = 's';

        echo json_encode($return);
    }

    public function findById($id)
    {
        $dto = $this->model->getById($id);
        $return = $this->instituicaoEnsinoModel->setDTO($dto)->getArrayDados();

        echo json_encode($return);
    }

    public function setDados()
    {
        $dto = new InstituicaoEnsinoDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdInstituicao(Input::get('id_inst_ensino'))
            ->setDsInstituicao(Input::get('nome_inst_ensino'))
            ->setCdCatgInstituicao(8)
            ->setCdVlCatgInstituicao(Input::get('select_cat_ens'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function checkExisteNome()
    {
        $nome = Input::get('nome_inst_ensino');
        $id = Input::get('id_inst_ensino');

        $return = array(
            'valid' => $this->instituicaoEnsinoModel->existeNome($nome, $id)
        );

        echo json_encode($return);
    }
} 