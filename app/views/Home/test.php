<?php
/**
 * Created by PhpStorm.
 * Usuario: Vinicius
 * Date: 14/09/14
 * Time: 00:51
 */

// Testando Pessoa Física
$pdao = new PessoaFisicaDAO();
/** @var $r PessoaFisicaDTO */
$r = $pdao->getById(1);
//$r->setCpf("123.456.789-87");
$r->setNmPessoaFisica('Administrador');




// Testado
//--fc_criar_usuario(login,senha,nivel,status,cd_pessoa_fisica,login_trocar)
    //SELECT fc_criar_usuario('maria','123456',1,'A',2,null)

$in = new InstituicaoEnsinoDTO();
$in->setDsInstituicao('Unifran')
    ->setCdCatgInstituicao(1)
    ->setCdVlCatgInstituicao(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$inDao = new InstituicaoEnsinoDAO();

/** @var InstituicaoEnsinoDTO $i */
$i = $inDao->getById(5);

$i->setCdCatgInstituicao(1);
try {
    //$inDao->gravar($i);
    $pdao->gravar($r);
    Session::flash('sucesso_salvar_pf', 'Cadastro salvo!', 'success');
} catch (Exception $e) {
    CodeFail((int)$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
}

if (Session::exists('sucesso_salvar_pf')){
    Session::flash('sucesso_salvar_pf');
}

var_dump($r);
