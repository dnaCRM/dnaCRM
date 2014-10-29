<?php
//var_dump((new PessoaJuridicaEnderecoDAO())->fullList());die;
$class = 'MoradorEndereco';

$classModel = $class.'Model';
$model = new $classModel;
//$dto = $model->getDAO()->fullList();var_dump($dto);die;

$dto = $model->getDAO()->getById(2);
var_dump($model->getEnderecosMorador(2));die;
$obj = $model
    ->setDTO($dto)
    ->getArrayDados();
;

var_dump($obj);

/*
      private 'cd_condominio' => int 8
      private 'nm_condominio' => string 'Spazio Florian' (length=14)
      private 'im_perfil' => string 'img/icon-user.jpg' (length=17)
      private 'cep' => string '14000-123' (length=9)
      private 'rua' => string 'Rua Jurema' (length=10)
      private 'numero' => int 100
      private 'bairro' => string 'Santa Terezinha' (length=15)
      private 'cidade' => string 'Franca' (length=6)
      private 'cd_catg_estado' => int 1
      private 'cd_vl_catg_estado' => int 2
 */