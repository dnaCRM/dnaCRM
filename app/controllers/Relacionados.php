<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 07/11/14
 * Time: 20:55
 */

class Relacionados extends Controller
{
    /** @var  RelacionadosModel */
    private $relacionadosModel;

    public function __construct()
    {
        $this->setModel(new RelacionadosDAO());
        $this->relacionadosModel = new RelacionadosModel();
    }

    public function cadastra()
    {
        if (Input::exists()) {
            $obj = $this->setDados();
            $deletar = (isset($_POST['delete']) ? Input::get('delete') : null);

            try {
                $gravar = array();
                $relacDados = array();
                if ($gravar = $this->model->save($obj, $deletar)) {
                    $relacDados = $this->relacionadosModel->setDTO($obj)->getArrayDados();
                }

                echo json_encode(array_merge($gravar, $relacDados));

            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }
            return false;
        }
    }

    public function setDados()
    {
        $dto = new RelacionadosDTO();

        $dto
            ->setCdPessoaFisica1((int)Input::get('cd_pessoa_fisica_1'))
            ->setCdPessoaFisica2((int)Input::get('cd_pessoa_fisica_2'))
            ->setCdCatgRelac(Input::get('catg_relac')?4:null)
            ->setCdCatgVlRelac(Input::get('catg_relac'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');
        return $dto;
    }

    public function findBy2Ids()
    {
        $pessoa1 = (int)Input::get('cd_pessoa_fisica_2');
        $pessoa2 = (int)Input::get('cd_pessoa_fisica_2');

        $dto = $this->model->getBy2Ids($pessoa1, $pessoa2);

        $result = $this->relacionadosModel->setDTO($dto)->getArrayDados();

        echo json_encode($result);
    }

    public function apagar()
    {
        $pessoa1 = (int)Input::get('cd_pessoa_fisica_2');
        $pessoa2 = (int)Input::get('cd_pessoa_fisica_2');

        $dto = $this->model->getBy2Ids($pessoa1, $pessoa2);
        $result = $this->model->save($dto,'D');

        //$result = $this->relacionadosModel->setDTO($dto)->getArrayDados();

        echo json_encode($result);
    }
}
