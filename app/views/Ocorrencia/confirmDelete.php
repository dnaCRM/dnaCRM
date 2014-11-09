<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>
    </div>
</div>

<!--Teste de Perfil-->
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <?php
            $ocorrencia = $data['perfil'];

            $action = new Ocorrencia();
            $action->removerOcorrencia($ocorrencia);

            ?>

            <div class="container">
                <?php
                if (!Input::exists()) {
                    ?>
                        <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                        <p>Deseja deletar a ocorrência <strong><?php echo $ocorrencia->getDescAssunto(); ?></strong>?</p>

                        <!-- form -->
                        <form action="" method="post">

                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                            <div class="form-group ">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <a href="Ocorrencia/visualizar/<?php echo $ocorrencia->getCdOcorrencia(); ?>"
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
                        <h3>Ocorrencia Deletada!</h3>
                        <a href="Ocorrencia"
                           class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</a>

                <?php
                }
                ?>
            </div>

        </div>

    </div>
</div>