<?php

$obj = new OcorrenciaPessoaFisicaEnvolvidaDTO();
$obj

    ->setCdOcorrencia(2)
    ->setCdPessoaFisica(2)
    ->setCdOcorrencia(1)
    ->setCdPessoaFisica(3)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$objDao = new OcorrenciaPessoaFisicaEnvolvidaDAO();

$obj = $objDao->getById(2);
//$obj->setDtUsuarioAtualiza('07/10/2014');

//$obj = $objDao->gravar($obj);
$obj = $objDao->delete($obj);
$obj = $objDao->fullList();

//$obj = $objDao->fullList();
//$obj = $objDao->getBy2Ids(1,3);

$objDao->gravar($obj);
//$obj = $objDao->delete($obj);
//$obj = $objDao->fullList();
var_dump($obj);
