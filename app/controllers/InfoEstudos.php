<?php

class InfoEstudos extends Controller
{
    /** @var  infoEstudosModel */
    private $infoEstudosModel;

    public function __construct()
    {
        $this->setModel(new InfoEstudosDAO());
        $this->infoEstudosModel = new InfoEstudosModel();
    }

    public function request()
    {
        if (Input::exists()) {

            if (Input::get('del_info_estudos') != 's') {
                $this->cadastra();
            } else {
                $this->apagar();
            }
        }
    }

    private function cadastra()
    {
        $info_estudos = $this->setDados();

        try {
            $dto = $this->model->gravar($info_estudos);
        } catch (Exception $e) {
            CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }

        $return = $this->infoEstudosModel->setDTO($dto)->getArrayDados();
        $return['delete'] = 'n';

        echo json_encode($return);
    }

    public function apagar()
    {
        $id = Input::get('cd_info_estudos');

        $dto = $this->model->getById($id);
        $info_estudos = $this->model->delete($dto);

        $return = $this->infoEstudosModel->setDTO($info_estudos)->getArrayDados();
        $return['delete'] = 's';

        echo json_encode($return);
    }

    public function findById($id)
    {
        $dto = $this->model->getById($id);
        $return = $this->infoEstudosModel->setDTO($dto)->getArrayDados();

        echo json_encode($return);
    }

    public function setDados()
    {
        $dto = new InfoEstudosDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdInfoEstudos(Input::get('cd_info_estudos'))
            ->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
            ->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
            ->setCdCatgCurso(Input::get('cd_catg_curso'))
            ->setCdVlCatgCurso(Input::get('cd_vl_catg_curso'))
            ->setCdCatgPeriodo(Input::get('cd_catg_periodo'))
            ->setCdVlCatgPeriodo(Input::get('cd_vl_catg_periodo'))
            ->setDtInicio(Input::get('dt_inicio'))
            ->setDtFim(Input::get('dt_fim'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;

    }

    public function checkExisteInfoEstudos()
    {
        $_POST = filter_input_array(INPUT_POST);
        $cd_info_estudos = Input::get('cd_info_estudos');
        $cd_pessoa_fisica = Input::get('cd_pessoa_fisica');
        $cd_pessoa_juridica = Input::get('cd_pessoa_juridica');
        $cd_vl_catg_curso = Input::get('cd_vl_catg_curso');
        $cd_vl_catg_periodo = Input::get('cd_vl_catg_periodo');
        $dt_inicio = Input::get('dt_inicio');
        $dt_fim = Input::get('dt_fim');

        $return = array(
            'valid' => $this->infoEstudosModel
                        ->existeInfoEstudos(
                            $cd_info_estudos,
                            $cd_pessoa_fisica,
                            $cd_pessoa_juridica,
                            $cd_vl_catg_curso,
                            $cd_vl_catg_periodo,
                            $dt_inicio,
                            $dt_fim
                        )
                    );

        echo json_encode($return);
    }
} 