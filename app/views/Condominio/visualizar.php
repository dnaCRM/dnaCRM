<!--
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 16/10/14
 * Time: 02:55
 */
 -->
<div class="row">
    <div class="col-md-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-md-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <a class="btn btn-primary btn-sm"
               href="Condominio/formcondominio/<?php echo $data['condominio']->getCdCondominio(); ?>">
                <span class="fa fa-edit"></span> Editar</a>

            <a class="btn btn-warning btn-sm"
               href="Condominio/confirmDelete/<?php echo $data['condominio']->getCdCondominio(); ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>

        </div>
    </div>
</div>

<!--Teste de Perfil-->
<div class="row">
    <div class="col-md-6">

        <img class="img-circle profilefoto"
             src="<?php echo $data['condominio']->getImPerfil(); ?>">
        <?php
        $condominio = $data['condominio'];
        echo '<table class="table table-striped table-hover ">';

        echo '<tr>';
        echo "<td><strong>Nome Condominio: </strong>: {$condominio->getNmCondominio()}</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td><strong>Cep: </strong>: {$condominio->getCep()}</td>";
        echo '</tr>';


        echo '</table>';
        ?>

    </div>

    <div class="col-md-6">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            $_POST
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
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
                            <i class="glyphicon glyphicon-leaf"></i> $data
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($data);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>