<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 14/09/14
 * Time: 00:51
 */

/*$con = DataBase::getConnection();

$query = $con->query("select * from tb_pessoa_fisica");
$query->setFetchMode(PDO::FETCH_CLASS, 'PessoaFisicaDTO');
$r = new PessoaFisicaDTO();
$r = $query->fetch();*/

$rPessoaFisica = new PessoaFisicaDAO();
//$r = $rPessoaFisica->getById(32);
$arrObj = new ArrayObject();
//var_dump($r);

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
$arr = $pdao->fullList();
var_dump($arr);
//$pdao->gravar($pe);
