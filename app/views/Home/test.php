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

while($r = $query->fetch()) {
    var_dump($r);
}

