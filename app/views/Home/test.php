<?php

$obj = new PessoaJuridicaEnderecoDTO();
$obj
    ->setCdCatgEnd(1)
    ->setCdVlCatgEnd(1)
    ->setCdPessoaFisica(2)
    ->setCep('14403-180')
    ->setRua('Rua Alfredo Tosi')
    ->setNumero('1821')
    ->setBairro('Núcleo Alpha')
    ->setCidade('Franca')
    ->setCdCatgEstado(1)
    ->setCdVlCatgEstado(1)
    ->setObservacao('Orgplan')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$objDao = new PessoaJuridicaEnderecoDAO();

/** @var PessoaJuridicaEnderecoDTO $obj */
$obj = $objDao->getById(2);
$obj->setObservacao('ORGPLAN PARTICIPAÇÕES LTDA');


$obj = $objDao->gravar($obj);
$obj = $objDao->fullList();
var_dump($obj);