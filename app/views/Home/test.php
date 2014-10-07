<?php

$obj = new RelacionadosDTO();
$obj
    ->setCdPessoaFisica1(2)
    ->setCdPessoaFisica2(1)
    ->setCdCatgRelacPf1(1)
    ->setCdVlCatgRelacPf1(1)
    ->setCdCatgRelacPf2(1)
    ->setCdVlCatgRelacPf2(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$objDao = new RelacionadosDAO();

/** @var RelacionadosDTO $obj */
//$obj = $objDao->getById(null,2);
//$obj->setDtFim('25/12/2014');


//$obj = $objDao->gravar($obj);
$obj = $objDao->fullList();
var_dump($obj);