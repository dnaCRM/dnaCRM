<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 14/09/14
 * Time: 00:51
 */

$pe = new PessoaFisicaDTO();

$pe->setNmPessoaFisica('Clark Kent')
    ->setCdPessoaJuridica(1)
    ->setCdProfissao(1)
    ->setCpf('213.416.489-09')
    ->setRg('111031')
    ->setCdCatgOrgRg(1)
    ->setCdVlCatgOrgRg(1)
    ->setEmail('clark@net.com')
    ->setDtNascimento('12/12/1987')
    ->setIeSexo('f')
    ->setCdUsuarioCriacao(1)
    ->setDtUsuarioCriacao('now()')
    ->setCdUsuarioAtualiza(1)
    ->setDtUsuarioAtualiza('now()')
    ->setIeEstuda('A')
    ->setCdInstituicao(1);

$pdao = new PessoaFisicaDAO();
var_dump($pe);
/** @var $r PessoaFisicaDTO */
//$r = $pdao->getById(1);
//$r->setCpf("123.456.789-87");
//$r->setNmPessoaFisica('Meu nome');
$pdao->gravar($pe);
//$pdao->gravar($pe);

