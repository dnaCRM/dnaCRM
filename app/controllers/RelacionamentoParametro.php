<?php

class RelacionamentoParametro extends Controller
{
    /** @var  RelacionamentoParametroModel */
    private $relacionamentoParametroModel;

    public function __construct()
    {
        $this->setModel(new RelacionamentoParametroDAO());
        $this->relacionamentoParametroModel = new RelacionamentoParametroModel();
    }

    public function request()
    {
        if (Input::exists()) {
            if (Input::get('del_relacao') != 's') {
                $this->cadastra();
            } else {
                $this->apagar();
            }
        }
    }

    private function cadastra()
    {
        $relacao = $this->setDados();

        if (!$this->checkExists($relacao->getCdCatgVlRelac1(), $relacao->getCdCatgVlRelac2())) {
            try {
                $dto = $this->model->gravar($relacao);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

            $return = $this->relacionamentoParametroModel->setDTO($dto)->getArrayDados();
            $return['delete'] = 'n';

            echo json_encode($return);
        } else {
            echo json_encode(array('exist'=>true));
        }
    }

    private function apagar()
    {
        $id_relac_1 = Input::get('relac_1');
        $id_relac_2 = Input::get('relac_2');

        $dto = $this->model->getBy2Ids($id_relac_1, $id_relac_2);
        $relacao = $this->model->delete($dto);

        $return = $this->relacionamentoParametroModel->setDTO($relacao)->getArrayDados();
        $return['delete'] = 's';

        echo json_encode($return);
    }

    public function findBy2Ids($id_relac_1, $id_relac_2)
    {
        $dto = $this->model->getBy2Ids($id_relac_1, $id_relac_2);
        $return = $this->relacionamentoParametroModel->setDTO($dto)->getArrayDados();

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new RelacionamentoParametroDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdCatgRelac1(4)
            ->setCdCatgVlRelac1((int)Input::get('relac_1'))
            ->setCdCatgRelac2(4)
            ->setCdCatgVlRelac2((int)Input::get('relac_2'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    private function checkExists($id_1, $id_2)
    {
        return $this->relacionamentoParametroModel->exists($id_1, $id_2);
    }
} 