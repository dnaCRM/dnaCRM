<div class="container">
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
                $perfil = $data['perfil'];

                $action = new OrdemServico();
                $action->removerOrdemServico($perfil);

                ?>

                <?php
                if (!Input::exists()) {
                    ?>
                    <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                    <p>Deseja deletar a Ordem de Servico <strong><?php echo $perfil->getDescAssunto(); ?></strong>?</p>

                    <!-- form -->
                    <form action="" method="post">

                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                        <div class="form-group ">
                            <div class="col-md-10">
                                <a href="OrdemServico/visualizar/<?php echo $perfil->getCdOrdemServico(); ?>"
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
                    <h3>Cadastro Deletado!</h3>
                    <a href="OrdemServico"
                       class="btn btn-success" role="button">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</a>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>