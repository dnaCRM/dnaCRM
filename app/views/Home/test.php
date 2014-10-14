<?php

$obj = new CategoriaValorDTO();
$obj
    ->setCdCategoria(12)
    ->setDescVlCatg('Bebedeira')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$dao = new CategoriaValorDAO();

//$dao->gravar($obj);

/** @var CategoriaValorDTO $obj */

//$obj = $dao->getBy2Ids(56,3);

var_dump($dao->getBy2Ids(117,12));