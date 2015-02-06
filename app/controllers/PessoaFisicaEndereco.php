<?php

class PessoaFisicaEndereco extends Controller
{
    private $categorias;
    /** @var  PessoaFisicaEnderecoModel */
    private $pessoaFisicaEnderecoModel;

    public function __construct()
    {
        $this->setModel(new PessoaFisicaEnderecoDAO());
        $this->categorias = (new CategoriaValorDAO())->get('cd_categoria = 9');
        $this->pessoaFisicaEnderecoModel = new PessoaFisicaEnderecoModel();
    }
    public function cadastra()
    {
        if (Input::exists()) {

            $pessoaFisicaEndereco = $this->setDados();

            try {
                $endereco = $this->model->gravar($pessoaFisicaEndereco);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

            $return = $this->pessoaFisicaEnderecoModel->setDTO($endereco)->getArrayDados();

            echo json_encode($return);
        }
    }

    /**
     * @param $id
     * @return string = JSON
     */
    public function findById($id)
    {
        $endereco = $this->model->getById($id);
        $return = $this->pessoaFisicaEnderecoModel->setDTO($endereco)->getArrayDados();

        echo json_encode($return);
    }

    public function apagar()
    {
        $id = Input::get('id_endereco');

        $dto = $this->model->getById($id);
        $endereco = $this->model->delete($dto);

        $return = $this->pessoaFisicaEnderecoModel->setDTO($endereco)->getArrayDados();

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new PessoaFisicaEnderecoDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setNrSequencia(Input::get('id_endereco'))
            ->setCdCatgEnd(Input::get('categoria')?9:null)
            ->setCdVlCatgEnd(Input::get('categoria'))
            ->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
            ->setCep(Input::get('cep'))
            ->setRua(Input::get('rua'))
            ->setNumero((int)Input::get('numero'))
            ->setBairro(Input::get('bairro'))
            ->setCidade(Input::get('cidade'))
            ->setEstado(Input::get('estado'))
            ->setObservacao(Input::get('observacao'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }
} 