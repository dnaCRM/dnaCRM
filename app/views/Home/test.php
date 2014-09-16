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

$arr = get_object_vars($r);

$a = $r->Attrs();
$m = $r->methods();

/** Deletando o campo cd_pessoa_fisica */
unset($a[0]);


/** Processando Insert */
$colunas = implode(', ', array_values($a));
$campos = ':' . implode(', :', array_values($a));

echo "COLUNAS:<br>";
var_dump($colunas);
echo "CAMPOS:<br>";
var_dump($campos);

echo "STRING PARA UPDATE:<br>";
/** Processando Update */
foreach ($a as $parametro => $valor) {
    $parametros[] = $valor . ' = :' . $valor;
}
/** Converte o Array em String */
$parametros = implode(', ', $parametros);
echo $parametros;

//Chamando métodos dinâmicamente
foreach($m as $getter) {
    echo $r->{$getter}() . '<br>';
}


$pe = new PessoaFisica();

$pe->setNmPessoaFisica('Alfredo');
$pe->setCdPessoaFisica(1);
$pe->setCdProfissao(1);
$pe->setCpf('123.456.789-09');
$pe->setRg('11221122');
$pe->setCdCatgOrgRg(1);
$pe->setCdVlCatgOrgRg(1);
$pe->setEmail('email@internet.com');
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
$pe->setCdInstituicao(1);

$pdao = new PessoaFisicaDAO();
$pdao->save($pe);
