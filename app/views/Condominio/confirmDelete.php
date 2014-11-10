<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?>
                <small>
                    <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
                </small>
            </h3>

        </div>
    </div>

    <!--Teste de Perfil-->
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <?php
                $condominio = $data['condominio'];

                $action = new Condominio();
                $action->removerCondominio($condominio);

                ?>

                <div class="container">
                    <?php
                    if (!Input::exists()) {
                    ?>
                    <div class="col-md-4">
                        <img class="img-circle profilefoto left"
                             src="<?php echo $condominio->getImPerfil(); ?>">
                    </div>
                    <div class="col-md-8">
                        <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                        <p>Deseja deletar Condominio <strong><?php echo $condominio->getNmCondominio(); ?></strong>?</p>

                        <!-- form -->
                        <form action="" method="post">

                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                            <div class="form-group ">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a href="Condominio/visualizar/<?php echo $condominio->getCdCondominio(); ?>"
                                       class="btn btn-success" role="button">
                                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Cancelar</a>
                                    <button type="submit" name="deletar" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span> Deletar
                                    </button>
                                </div>
                            </div>

                        </form>
                        <!-- end form -->
                        <?php
                        } else {
                            ?>
                            <h3>Condominio Deletado!</h3>
                            <a href="Condominio"
                               class="btn btn-success" role="button">
                                <span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</a>
                        <?php
                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>