<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                $perfil = $data['perfil'];

                $action = new PessoaFisica();
                $action->removerPessoaFisica($perfil);

                ?>

                <div class="container">
                    <?php
                    if (!Input::exists()) {
                        ?>
                        <div class="col-md-4">
                            <img class="img-circle profilefoto left"
                                 src="<?php echo $perfil->getImPerfil(); ?>">
                        </div>
                        <div class="col-md-8">
                            <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                            <p>Deseja deletar o perfil <strong><?php echo $perfil->getNmPessoaFisica(); ?></strong>?</p>

                            <!-- form -->
                            <form action="" method="post">

                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                                <div class="form-group ">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <a href="PessoaFisica/visualizar/<?php echo $perfil->getCdPessoaFisica(); ?>"
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
                            <h3>Perfil Deletado!</h3>
                            <a href="PessoaFisica"
                               class="btn btn-success" role="button">
                                <span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</a>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>