<?php

$obj = new PessoaFisicaTelefoneDTO();
$obj
    ->setCdPessoaFisica(2)
    ->setFone(1)
    ->setObservacao(1)
    ->setCdCatgFonePf(1)
    ->setCdVlCatgFonePf(1)
    ->setCdCatgOperadora(1)
    ->setCdVlCatgOperadora(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$objDao = new PessoaFisicaTelefoneDAO();

/** @var ServicoAdicionalDTO $obj */
//$obj = $objDao->getById(8);
//$obj->setDtUsuarioAtualiza('25/12/2014');

/**
 * Deletar id selecionado
 */
//$obj = $objDao->getById(8);
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