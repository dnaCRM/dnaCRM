<?php

$obj = new PessoaJuridicaTelefoneDTO();
$obj
    ->setCdPessoaJuridica(1)
    ->setFone('(16) 3344-5566')
    ->setObservacao('Isto é uma observação. Então observe!')
    ->setCdCatgFonePj(1)
    ->setCdVlCatgFonePj(1)
    ->setCdCatgOperadora(1)
    ->setCdVlCatgOperadora(1)
    ->setObservacao('Orgplan')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$objDao = new PessoaJuridicaTelefoneDAO();

/** @var PessoaJuridicaEnderecoDTO $obj */
$obj = $objDao->getById(1);
$obj->setObservacao('Número Desconhecido');


$obj = $objDao->gravar($obj);
$obj = $objDao->fullList();
var_dump($obj);