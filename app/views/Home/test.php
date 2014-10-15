<?php

$obj = new MoradorEnderecoDTO();

$obj ->setNrSequencia(2);


$dao = new MoradorEnderecoDAO();

$dao->delete($obj);

/** @var CategoriaValorDTO $obj */

//$obj = $dao->getBy2Ids(56,3);

//var_dump($dao->getById(2));