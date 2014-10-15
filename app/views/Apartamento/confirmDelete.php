<div class="row">
    <div class="col-md-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-md-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            Well...

        </div>
    </div>
</div>

<!--Teste de Apartamento-->
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <?php
            $apartamento = $data['apartamento'];

            $action = new Apartamento();
            $action->removerApartamento($apartamento);

            ?>

            <div class="container">
                <?php
                if (!Input::exists()) {
                    ?>

                    <div class="col-md-8">
                        <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                        <p>Deseja deletar o apartamento <strong><?php echo $apartamento->getCdSetor(); ?>
                            </strong>?</p> <!-- TENHO QUE RESOLVER PARA MOSTRAR O NOME EM VEZ DE CHAVE PRIMARIA !
                        <!-- form -->
                        <form action="" method="post">

                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                            <div class="form-group ">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a href="Apartamento/visualizar/<?php echo $apartamento->getCdApartamento(); ?>"
                                       class="btn btn-success" role="button">
                                        <!--TENHO QUE RESOLVER COMO COLOCAR O NOME EM VEZ DE ID -->

                                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Cancelar</a>
                                    <button type="submit" name="deletar" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span> Deletar
                                    </button>
                                </div>
                            </div>

                        </form>
                        <!-- end form -->

                    </div>
                <?php
                } else {
                    ?>
                    <div class="col-md-8">
                        <h3>Apartamento Deletado!</h3>
                        <a href="Apartamento"
                           class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</a>
                    </div>

                <?php
                }
                ?>
            </div>

        </div>

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
        </div>
    </div>
</div>
