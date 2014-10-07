<?php

$obj = new ProfissaoDTO();
$obj
    ->setNmProfissao("Lindo")
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$objDao = new ProfissaoDAO();

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