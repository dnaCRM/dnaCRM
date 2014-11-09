<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 26/10/14
 * Time: 19:49
 */

class PessoaFisicaEndereco extends Controller
{
    private $categorias;
    private $estados;

    public function __construct()
    {
        $this->setModel(new PessoaFisicaEnderecoDAO());
        $this->categorias = (new CategoriaValorDAO())->get('cd_categoria = 9');
        $this->estados = (new CategoriaValorDAO())->get('cd_categoria = 2');

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

            $return = array(
                'id_endereco' => $endereco->getNrSequencia(),
                'cd_pessoa_fisica' => $endereco->getCdPessoaFisica(),
                'rua' => $endereco->getRua(),
                'numero' => $endereco->getNumero(),
                'bairro' => $endereco->getBairro(),
                'cidade' => $endereco->getCidade(),
                'cep' => $endereco->getCep(),
                'observacao' => ($endereco->getObservacao() ? $endereco->getObservacao() : '')
            );


            foreach ($this->categorias as $catg_end) {
                if ($catg_end->getCdVlCategoria() == $endereco->getCdVlCatgEnd()) {
                    $return['categoria'] = $catg_end->getDescVlCatg();
                }
            }

            foreach ($this->estados as $estado) {
                if ($estado->getCdVlCategoria() == $endereco->getCdVlCatgEstado()) {
                    $return['estado'] = $estado->getDescVlCatg();
                }
            }

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

        $return = array(
            'id_endereco' => $endereco->getNrSequencia(),
            'cd_pessoa_fisica' => $endereco->getCdPessoaFisica(),
            'rua' => $endereco->getRua(),
            'numero' => $endereco->getNumero(),
            'bairro' => $endereco->getBairro(),
            'cidade' => $endereco->getCidade(),
            'cep' => $endereco->getCep(),
            'observacao' => $endereco->getObservacao(),
            'categoria' => $endereco->getCdVlCatgEnd(),
            'estado' => $endereco->getCdVlCatgEstado()
        );

        echo json_encode($return);
    }

    public function apagar()
    {
        $id = Input::get('id_endereco');

        $dto = $this->model->getById($id);
        $endereco = $this->model->delete($dto);

        $return = array(
            'id_endereco' => $endereco->getNrSequencia(),
            'cd_pessoa_fisica' => $endereco->getCdPessoaFisica(),
            'rua' => $endereco->getRua(),
            'numero' => $endereco->getNumero(),
            'bairro' => $endereco->getBairro(),
            'cidade' => $endereco->getCidade(),
            'cep' => $endereco->getCep(),
            'observacao' => $endereco->getObservacao(),
            'categoria' => $endereco->getCdVlCatgEnd(),
            'estado' => $endereco->getCdVlCatgEstado()
        );

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new PessoaFisicaEnderecoDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setNrSequencia(Input::get('id_endereco'))
            ->setCdCatgEnd(9)
            ->setCdVlCatgEnd(Input::get('categoria'))
            ->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
            ->setCep(Input::get('cep'))
            ->setRua(Input::get('rua'))
            ->setNumero((int)Input::get('numero'))
            ->setBairro(Input::get('bairro'))
            ->setCidade(Input::get('cidade'))
            ->setCdCatgEstado(2)
            ->setCdVlCatgEstado(Input::get('estado'))
            ->setObservacao(Input::get('observacao'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }
} 