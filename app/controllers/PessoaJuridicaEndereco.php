<?php

class PessoaJuridicaEndereco extends Controller
{
    private $categorias;
    /** @var  PessoaJuridicaEnderecoModel */
    private $pessoaJuridicaEnderecoModel;

    public function __construct()
    {
        $this->setModel(new PessoaJuridicaEnderecoDAO());
        $this->categorias = (new CategoriaValorDAO())->get('cd_categoria = 9');
        $this->pessoaJuridicaEnderecoModel = new PessoaJuridicaEnderecoModel();

    }
    public function cadastra()
    {
        if (Input::exists()) {

            $pessoaJuridicaEndereco = $this->setDados();

            try {
                $endereco = $this->model->gravar($pessoaJuridicaEndereco);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

            $return = $this->pessoaJuridicaEnderecoModel->setDTO($endereco)->getArrayDados();

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
        $return = $this->pessoaJuridicaEnderecoModel->setDTO($endereco)->getArrayDados();

        echo json_encode($return);
    }

    public function apagar()
    {
        $id = Input::get('id_endereco');

        $dto = $this->model->getById($id);
        $endereco = $this->model->delete($dto);

        $return = $this->pessoaJuridicaEnderecoModel->setDTO($endereco)->getArrayDados();

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new PessoaJuridicaEnderecoDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setNrSequencia(Input::get('id_endereco'))
            ->setCdCatgEnd(Input::get('categoria')?9:null)
            ->setCdVlCatgEnd(Input::get('categoria'))
            ->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
            ->setCep(Input::get('cep'))
            ->setRua(Input::get('rua'))
            ->setNumero((int)Input::get('numero'))
            ->setBairro(Input::get('bairro'))
            ->setCidade(Input::get('cidade'))
            ->setCdCatgEstado(Input::get('estado')?2:null)
            ->setCdVlCatgEstado(Input::get('estado'))
            ->setObservacao(Input::get('observacao'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

} 