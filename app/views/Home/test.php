<?php

$obj = new ServicoAdicionalDTO();
$obj
    ->setCdOrdemServico(1)
    ->setCdPessoaFisica(1)
    ->setCdCatgServico(1)
    ->setCdVlCatgServico(1)
    ->setCdSetor(1)
    ->setCdVaga(1)
    ->setDtInicio('now()')
    ->setDtFim('now()')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$objDao = new ServicoAdicionalDAO();

/** @var ServicoAdicionalDTO $obj */
//$obj = $objDao->getById(2);
//$obj->setDtFim('25/12/2014');


$objDao->gravar($obj);

$res = $objDao->fullList();
var_dump($res);