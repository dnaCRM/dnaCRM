<?php
//var_dump((new PessoaJuridicaEnderecoDAO())->fullList());die;
$class = 'PessoaFisica';

$classModel = $class.'Model';
$model = new $classModel;
//$dto = $model->getDAO()->fullList();var_dump($dto);die;

$dto = $model->getDAO()->getById(205);
//var_dump($model->getEnderecosMorador(2));die;
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
?>
<!-- NAO DELETAR DESTA LINHA PRA BAIXO -->
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    $_POST
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <?php

                var_dump($_POST);

                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    $_SESSION
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <?php

                var_dump($_SESSION);

                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <i class="glyphicon glyphicon-leaf"></i> $_FILES
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <?php

                var_dump($_FILES);

                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    <i class="glyphicon glyphicon-user"></i> $perfil
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <?php

                var_dump($perfil, $data);

                ?>
            </div>
        </div>
    </div>
</div>