<?php

$obj = new OcorrenciaPessoaFisicaEnvolvidaDTO();
$obj
    ->setCdOcorrencia(2)
    ->setCdPessoaFisica(2)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$objDao = new OcorrenciaPessoaFisicaEnvolvidaDAO();

/** @var ServicoAdicionalDTO $obj */
$obj = $objDao->getById(2);
$obj->setDtUsuarioAtualiza('07/10/2014');

/**
 * Deletar id selecionado
 */
//$obj = $objDao->getById(1);
//$objDao->delete($obj);
//var_dump($obj);

$obj = $objDao->gravar($obj);

$obj = $objDao->fullList();
var_dump($obj);

/**
 *   Atualizar Foto da Pessoa Fisica
 */
//$p = new PessoaFisicaDAO();
//$peee = $p->getById(18);
//var_dump($peee);
///$p->exportaFoto(18);