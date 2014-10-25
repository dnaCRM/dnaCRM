<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 25/10/14
 * Time: 15:17
 */

class PessoaFisicaTelefone extends Controller
{
    public function __construct()
    { //o método é herdado da classe pai 'Controller'
        $this->setModel(new PessoaFisicaTelefoneDAO());
    }

    /**
     * @todo Sanitizar entrada de dados
     */
    public function cadastra() {

        if (Input::exists()) {

            //if (Token::check(Input::get('token'))) {

                $pessoaFisicaTelefone = $this->setDados();

                try {
                    $obj = $this->model->gravar($pessoaFisicaTelefone);
                } catch (Exception $e) {
                    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
                }

                $return = array(
                    'fone' => $obj->getFone(),
                    'observacao' => $obj->getObservacao()
                );
                echo json_encode($return);
            }
        //}

    }

    public function setDados()
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