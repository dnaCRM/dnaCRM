<?php
require '../init.php';

$_POST = filter_input_array(INPUT_POST);

$p = new PessoaFisicaDTO();

$p
    ->setNmPessoaFisica(Input::get('nm_pessoa_fisica'))
    ->setCpf(Input::get('cpf'))
    ->setRg(Input::get('rg'))
    ->setEmail(Input::get('email'))
    ->setDtNascimento(Input::get('dt_nascimento'))
    ->setIeSexo(Input::get('ie_sexo'))
    ->setCdUsuarioCriacao(Session::get('user'))
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(Session::get('user'))
    ->setDtUsuarioAtualiza('now()');

$pDao = new PessoaFisicaDAO();

try {
    $pDao->gravar($p);
    Session::put('ajax_success', 'Gravado com sucesso', 'success');
    $msg = Session::flash('ajax_success');
} catch (Exception $e) {
    Session::put('ajax_success', "{$e->getMessage()}", 'danger');
    $msg = Session::flash('ajax_success');
}

echo $msg;

