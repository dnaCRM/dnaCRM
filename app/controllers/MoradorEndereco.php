<?php

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
                $arrayDados = $this->moradorEnderecoModel->setDTO($moradorEndereco)->getArrayDados();
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
            ->setFgResidente(Input::get('residente') == '' ? null : Input::get('residente'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

    public function findById($id)
    {
        $moradorEndereco = $this->model->getById($id);
        $result = $this->moradorEnderecoModel->setDTO($moradorEndereco)->getArrayDados();

        echo json_encode($result);
    }

    public function apagar()
    {
        $id = Input::get('id_m_end');

        $dto = $this->model->getById($id);
        $moradorEndereco = $this->model->delete($dto);

        $result = $this->moradorEnderecoModel->setDTO($moradorEndereco)->getArrayDados();
        echo json_encode($result);
    }
} 