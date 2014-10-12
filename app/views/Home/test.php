<?php

$obj = new CondominioDTO();
$obj
    ->setNmCondominio('Spazio Florian')
    ->setCep('14000-123')
    ->setRua('Rua Jurema')
    ->setNumero(198)
    ->setBairro('Santa Terezinha')
    ->setCidade('Franca')
    ->setCdCatgEstado(1)
    ->setCdVlCatgEstado(1)
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()');

$dao = new CondominioDAO();


//$dao->gravar($obj);

var_dump($dao->getById(8));