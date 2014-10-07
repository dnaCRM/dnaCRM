<?php

$obj = new OrdemServicoDTO();
$obj
    ->setCdOcorrencia(1)
    ->setCdPfExecutor(1)
    ->setCdPfSolicitante(1)
    ->setDescAssunto(1)
    ->setDescOrdemServico(1)
    ->setDtInicio('now()')
    ->setDtFim('now()')
    ->setCdCatgEstagio(1)
    ->setCdVlCatgEstagio(1)
    ->setDescConclusao(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$objDao = new OrdemServicoDAO();

/** @var ServicoAdicionalDTO $obj */
//$obj = $objDao->getById(2);
//$obj->setDtFim('25/12/2014');

/**
 * Deletar id selecionado
 */
//$obj = $objDao->getById(3);
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