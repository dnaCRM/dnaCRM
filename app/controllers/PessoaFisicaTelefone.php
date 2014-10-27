<?php

/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 25/10/14
 * Time: 15:17
 */
class PessoaFisicaTelefone extends Controller
{
    private $operadoras;
    private $categorias;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaFisicaTelefoneDAO());
        $this->operadoras = (new CategoriaValorDAO())->get('cd_categoria = 10');
        $this->categorias = (new CategoriaValorDAO())->get('cd_categoria = 5');
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra()
    {

        if (Input::exists()) {

            $pessoaFisicaTelefone = $this->setDados();

            try {
                $telefone = $this->model->gravar($pessoaFisicaTelefone);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

            $return['fone']  =$telefone->getFone();

            foreach ($this->operadoras as $catg_tel) {
                if ($catg_tel->getCdVlCategoria() == $telefone->getCdVlCatgOperadora()) {
                    $return['operadora'] = $catg_tel->getDescVlCatg();
                }
            }

            foreach ($this->categorias as $pf_tel) {
                if ($pf_tel->getCdVlCategoria() == $telefone->getCdVlCatgFonePf()) {
                    $return['categoria'] = $pf_tel->getDescVlCatg();
                }
            }
            $return['observacao'] = $telefone->getObservacao();
            $return['cd_pf_fone'] = $telefone->getCdPfFone();

            echo json_encode($return);
        }

    }

    public function apagar()
    {
        $id = Input::get('cd_pf_fone');

        $dto = $this->model->getById($id);
        $telefone = $this->model->delete($dto);

        $return = array(
            'cd_pf_fone' => $telefone->getCdPfFone(),
            'fone' => $telefone->getFone(),
            'operadora' => $telefone->getCdVlCatgOperadora(),
            'observacao' => $telefone->getObservacao(),
            'categoria' => $telefone->getCdVlCatgFonePf()
        );

        echo json_encode($return);
    }

    /**
     * @param $id
     * @return string = JSON
     */
    public function findById($id)
    {
        $telefone = $this->model->getById($id);

        $return = array(
            'cd_pf_fone' => $telefone->getCdPfFone(),
            'fone' => $telefone->getFone(),
            'operadora' => $telefone->getCdVlCatgOperadora(),
            'observacao' => $telefone->getObservacao(),
            'categoria' => $telefone->getCdVlCatgFonePf()
        );

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new PessoaFisicaTelefoneDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdPfFone(Input::get('cd_pf_fone'))
            ->setCdPessoaFisica(Input::get('cd_pessoa_fisica'))
            ->setFone(Input::get('fone'))
            ->setObservacao(Input::get('observacao'))
            ->setCdCatgFonePf(5)
            ->setCdVlCatgFonePf(Input::get('categoria'))
            ->setCdCatgOperadora(10)
            ->setCdVlCatgOperadora(Input::get('operadora'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }
}