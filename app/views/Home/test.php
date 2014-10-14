<?php

$r = new RelacionadosDTO();
$r
    ->setCdPessoaFisica1(1)
    ->setCdPessoaFisica2(4)
    ->setCdCatgRelacPf1(1)
    ->setCdVlCatgRelacPf1(1)
    ->setCdCatgRelacPf2(1)
    ->setCdVlCatgRelacPf2(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$rd = new RelacionadosDAO();
//$rd->gravar($r);


$dao = new PessoaFisicaDAO();
//$pf = new PessoaFisicaDTO();
$pf = $dao->getById(1);

$pfModel = new PessoaFisicaModel($pf, $dao);

/** @var ProfissaoDTO $agregado */
$agregado = $pfModel->getGrauEnsino(new CategoriaValorDAO());

var_dump($agregado);
