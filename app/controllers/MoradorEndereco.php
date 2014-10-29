<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 28/10/14
 * Time: 11:21
 */

class MoradorEndereco extends Controller
{
    private $moradorEnderecoModel;
    public function __construct()
    {
        $this->setModel(new MoradorEnderecoDAO());
        $this->moradorEnderecoModel = new MoradorEnderecoModel();
    }

    public function cadastra()
    {
        if (Input::exists()) {
            $obj = $this->setDados();

            try {
                $moradorEndereco = $this->model->gravar($obj);
                $arrayDados = $this->moradorEnderecoModel->getArrayDados($moradorEndereco);
                echo json_encode($arrayDados);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

        }
    }

    public function setDados()
    {
        $dto = new MoradorEnderecoDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setNrSequencia(Input::get('id_m_end'))
            ->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
            ->setCdApartamento(Input::get('m_end_apartamento'))
            ->setDtEntrada(Input::get('m_end_dt_entrada'))
            ->setDtSaida(Input::get('m_end_dt_saida'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function findById($id)
    {
        $moradorEndereco = $this->model->getById($id);
        $result = $this->moradorEnderecoModel->getArrayDados($moradorEndereco);
        //var_dump($moradorEndereco,$result,json_encode($result));die;
        echo json_encode($result);
    }

    public function apagar()
    {
        $id = Input::get('id_m_end');

        $dto = $this->model->getById($id);
        $moradorEndereco = $this->model->delete($dto);

        $result = $this->moradorEnderecoModel->getArrayDados($moradorEndereco);
        echo json_encode($result);
    }
} 