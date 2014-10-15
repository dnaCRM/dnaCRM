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

<!--Teste de Perfil-->
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <?php
            $perfil = $data['perfil'];

            $action = new OrdemServico();
            $action->removerOrdemServico($perfil);

            ?>

            <div class="container">
                <?php
                if (!Input::exists()) {
                    ?>
                    </div>
                    <div class="col-md-8">
                        <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                        <p>Deseja deletar a Ordem de Servico <strong><?php echo $perfil->getDescAssunto(); ?></strong>?</p>

                        <!-- form -->
                        <form action="" method="post">

                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                            <div class="form-group ">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a href="PessoaFisica/visualizar/<?php echo $perfil->getCdOrdemServico(); ?>"
                                       class="btn btn-success" role="button">
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
                        <h3>Cadastro Deletado!</h3>
                        <a href="OrdemServico"
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