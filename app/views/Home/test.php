<?php

$obj = new OcorrenciaDTO();
$obj
    ->setCdPfInformante(2)
    ->setDescAssunto(2)
    ->setDescOcorrencia(2)
    ->setDtOcorrencia('now()')
    ->setIeSituacao(2)
    ->setDtFim('now()')
    ->setDescConclusao(1)
    ->setCdCatgEstagio(1)
    ->setCdVlCatgEstagio(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$objDao = new OcorrenciaDAO();

/** @var ServicoAdicionalDTO $obj */
//$obj = $objDao->getById(2);
//$obj->setDtFim('25/12/2014');

$obj = $objDao->getById(4);
$objDao->delete($obj);

//$obj = $objDao->gravar($obj);

$obj = $objDao->fullList();
var_dump($obj);

//Atualizar Foto da Pessoa Fisica
//$p = new PessoaFisicaDAO();
//$peee = $p->getById(18);
//var_dump($peee);
///$p->exportaFoto(18);