<?php
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 28/10/14
 * Time: 00:12
 */

class PessoaJuridicaTelefone extends Controller
{
    private $operadoras;
    private $categorias;

    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaJuridicaTelefoneDAO());
        $this->operadoras = (new CategoriaValorDAO())->get('cd_categoria = 10');
        $this->categorias = (new CategoriaValorDAO())->get('cd_categoria = 6');
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra()
    {

        if (Input::exists()) {

            $pessoaJuridicaTelefone = $this->setDados();

            try {
                $telefone = $this->model->gravar($pessoaJuridicaTelefone);
            } catch (Exception $e) {
                CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            }

            $return['fone']  =$telefone->getFone();

            foreach ($this->operadoras as $catg_tel) {
                if ($catg_tel->getCdVlCategoria() == $telefone->getCdVlCatgOperadora()) {
                    $return['operadora'] = $catg_tel->getDescVlCatg();
                }
            }

            foreach ($this->categorias as $pj_tel) {
                if ($pj_tel->getCdVlCategoria() == $telefone->getCdVlCatgFonePf()) {
                    $return['categoria'] = $pj_tel->getDescVlCatg();
                }
            }
            $return['observacao'] = $telefone->getObservacao();
            $return['cd_pf_fone'] = $telefone->getCdPjFone();

            echo json_encode($return);
        }

    }

    public function apagar()
    {
        $id = Input::get('cd_pj_fone');

        $dto = $this->model->getById($id);
        $telefone = $this->model->delete($dto);

        $return = array(
            'cd_pj_fone' => $telefone->getCdPjFone(),
            'fone' => $telefone->getFone(),
            'operadora' => $telefone->getCdVlCatgOperadora(),
            'observacao' => $telefone->getObservacao(),
            'categoria' => $telefone->getCdVlCatgFonePj()
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
            'cd_pj_fone' => $telefone->getCdPjFone(),
            'fone' => $telefone->getFone(),
            'operadora' => $telefone->getCdVlCatgOperadora(),
            'observacao' => $telefone->getObservacao(),
            'categoria' => $telefone->getCdVlCatgFonePj()
        );

        echo json_encode($return);
    }

    private function setDados()
    {
        $dto = new PessoaJuridicaTelefoneDTO();
        $_POST = filter_input_array(INPUT_POST);

        $dto
            ->setCdPjFone(Input::get('cd_pj_fone'))
            ->setCdPessoaJuridica(Input::get('cd_pessoa_juridica'))
            ->setFone(Input::get('fone'))
            ->setObservacao(Input::get('observacao'))
            ->setCdCatgFonePj(6)
            ->setCdVlCatgFonePj(Input::get('categoria'))
            ->setCdCatgOperadora(10)
            ->setCdVlCatgOperadora(Input::get('operadora'))
            ->setCdUsuarioCriacao(Session::get('user'))
            ->setDtUsuarioCriacao('now()')
            ->setCdUsuarioAtualiza(Session::get('user'))
            ->setDtUsuarioAtualiza('now()');

        return $dto;
    }

} 