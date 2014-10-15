<?php

<<<<<<< HEAD
$obj = new MoradorEnderecoDTO();

$obj ->setCdPessoaFisica(1)
    ->setCdApartamento(1)
    ->setDtEntrada('now()')
=======
$r = new RelacionadosDTO();
$r
    ->setCdPessoaFisica1(1)
    ->setCdPessoaFisica2(4)
    ->setCdCatgRelacPf1(1)
    ->setCdVlCatgRelacPf1(1)
    ->setCdCatgRelacPf2(1)
    ->setCdVlCatgRelacPf2(1)
>>>>>>> 093539074a1b89a261fdda44a7cfd9e716d7c2c0
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

<<<<<<< HEAD

$dao = new MoradorEnderecoDAO();

$dao->gravar($obj);
=======
$rd = new RelacionadosDAO();
//$rd->gravar($r);

>>>>>>> 093539074a1b89a261fdda44a7cfd9e716d7c2c0

$dao = new PessoaFisicaDAO();
//$pf = new PessoaFisicaDTO();
$pf = $dao->getById(1);

$pfModel = new PessoaFisicaModel($pf, $dao);

<<<<<<< HEAD
//var_dump($dao->getById(2));
=======
/** @var ProfissaoDTO $agregado */
$agregado = $pfModel->getGrauEnsino(new CategoriaValorDAO());

var_dump($agregado);
>>>>>>> 093539074a1b89a261fdda44a7cfd9e716d7c2c0
