<?php

$obj = new OcorrenciaPessoaFisicaEnvolvidaDTO();
$obj
    ->setCdOcorrencia(1)
    ->setCdPessoaFisica(3)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$objDao = new OcorrenciaPessoaFisicaEnvolvidaDAO();

//$obj = $objDao->fullList();
//$obj = $objDao->getBy2Ids(1,3);

$objDao->gravar($obj);
//$obj = $objDao->delete($obj);
//$obj = $objDao->fullList();
var_dump($obj);
