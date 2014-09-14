<?php
/**
 * Created by PhpStorm.
 * User: Vinicius
 * Date: 14/09/14
 * Time: 00:51
 */

$con = DataBase::getConnection();

$query = $con->query("select * from tb_pessoa_fisica");
$query->setFetchMode(PDO::FETCH_CLASS, 'PessoaFisica');

$r = $query->fetch();

$arrObj = new ArrayObject();
$arrObj[] = $r;
var_dump($arrObj);

foreach($arrObj as $obj) {
    echo $obj->getNmPessoaFisica();
}