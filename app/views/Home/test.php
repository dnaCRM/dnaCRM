<?php

$obj = new VagaGaragemDTO();
$obj
    ->setDsVaga(1)
    ->setCdSetor(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$objDao = new VagaGaragemDAO();

/** @var ServicoAdicionalDTO $obj */
//$obj = $objDao->getById(2);
//$obj->setDsVaga('T2');

/**
 * Deletar id selecionado
 */
//$obj = $objDao->getById(2);
//$objDao->delete($obj);

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