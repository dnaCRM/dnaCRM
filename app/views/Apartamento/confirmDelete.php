<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
        </h3>
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
                        <h1><span class="glyphicon glyphicon-arrow-right"></span> Atenção!</h1>

                        <p>Deseja deletar o apartamento <strong><?php echo $apartamento->getCdApartamento(); ?></strong>?
                        </p> <!-- TENHO QUE RESOLVER PARA MOSTRAR O NOME EM VEZ DE CHAVE PRIMARIA !
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
                <?php
                } else {
                    ?>
                    <h3>Apartamento Deletado!</h3>
                    <a href="Apartamento"
                       class="btn btn-success" role="button">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Voltar</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
