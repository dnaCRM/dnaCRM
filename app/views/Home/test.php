<?php

$pj = new PessoaJuridicaDTO();
$pj
    ->setCnpj('22.345.654/0001-09')
    ->setNmFantasia('WayneTech')
    ->setDescRazao('Future Technology')
    ->setDescAtividade('Tecnologia em Bugingangas')
    ->setEmail('wayne@tech.com')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(2)
    ->setDtUsuarioAtualiza('now()');

$pjDao = new PessoaJuridicaDAO();

$pj = $pjDao->fullList();

var_dump($pj);