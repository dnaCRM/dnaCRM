<?php

class Cidades extends Controller
{
    /** @var  CidadesModel */
    private $cidadesModel;

    public function __construct()
    {
        $this->setModel(new CidadesDAO());
        $this->cidadesModel = new CidadesModel();
    }

    /**
     * @param $id
     * @return string = JSON
     */
    public function findById($id)
    {
        $cidade = $this->model->getById($id);
        $return = $this->cidadesModel->setDTO($cidade)->getArrayDados();

        echo json_encode($return);
    }

    public function buscaAjax()
    {
        $return = $this->cidadesModel->getCidade();
        echo json_encode($return);
    }

} 