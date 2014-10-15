<?php

$obj = new MoradorEnderecoDTO();

$obj ->setCdPessoaFisica(2)
    ->setCdApartamento(1)
    ->setDtEntrada('now()')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');


$dao = new MoradorEnderecoDAO();

$dao->gravar($obj);

/** @var CategoriaValorDTO $obj */

//$obj = $dao->getBy2Ids(56,3);

//var_dump($dao->getById(2));
