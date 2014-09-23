<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 14/09/14
 * Time: 00:51
 */

$pe = new PessoaFisicaDTO();

$pe->setNmPessoaFisica('Bruce Banner');
$pe->setCdPessoaJuridica(1);
$pe->setCdProfissao(1);
$pe->setCpf('213.416.489-89');
$pe->setRg('111231');
$pe->setCdCatgOrgRg(1);
$pe->setCdVlCatgOrgRg(1);
$pe->setEmail('banner@net.com');
$pe->setDtNascimento('12/12/1987');
$pe->setFone('11223-1111');
$pe->setCelular('99999-9888');
$pe->setIeSexo('f');
$pe->setImPerfil(12345);
$pe->setCdUsuarioCriacao(1);
$pe->setDtUsuarioCriacao('12/12/1987');
$pe->setCdUsuarioAtualiza(1);
$pe->setDtUsuarioAtualiza('12/12/1987');
$pe->setIeEstuda('A');
$pe->setCdInstituicao(3);

$pdao = new PessoaFisicaDAO();

/** @var $r PessoaFisicaDTO */
$r = $pdao->getById(1);
$r->setCpf("123.456.789-87");
//$r->setNmPessoaFisica('Meu nome');
$pdao->gravar($r);
//$pdao->gravar($pe);
$pdao->
var_dump($r);