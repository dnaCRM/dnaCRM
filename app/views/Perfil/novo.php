<div class="row">
    <div class="col-lg-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Alguma coisa!
            </p>

        </div>
    </div>
</div>

<!--Teste de Form-->
<div class="row">
    <div class="col-lg-6">

        <?php

        $perfil = new Perfil;
        $perfil->newPerfil();

        if (Session::exists('sucesso')) {
        ?>

        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Notificação!</strong>

            <?php
            echo Session::flash('sucesso');
            echo "</div>";
            }

            ?>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>
                    <legend>Cadastro</legend>
                    <div class="form-group">
                        <label for="fotoperfil" class="col-lg-2 control-label">Foto</label>

                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="fotoperfil" name="fotoperfil">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-lg-2 control-label">Nome</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="<?php echo escape(Input::get('nome')); ?>" placeholder="Nome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">Email</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?php echo escape(Input::get('email')); ?>" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel_fixo" class="col-lg-2 control-label">Telefone Fixo</label>

                        <div class="col-lg-10">
                            <input type="tel" class="form-control" id="email" name="tel_fixo"
                                   value="<?php echo escape(Input::get('tel_fixo')); ?>" placeholder="00 0000-0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel_cel" class="col-lg-2 control-label">Celular</label>

                        <div class="col-lg-10">
                            <input type="tel" class="form-control" id="tel_cel" name="tel_cel"
                                   value="<?php echo escape(Input::get('tel_cel')); ?>" placeholder="00 00000-0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cel_confirm" class="col-lg-2 control-label">Confirme o Celular</label>

                        <div class="col-lg-10">
                            <input type="tel" class="form-control" id="cel_confirm" name="cel_confirm"
                                   placeholder="00 00000-0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="obs" class="col-lg-2 control-label">Textarea</label>

                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" name="obs"
                                      id="obs"><?php echo escape(Input::get('obs')); ?></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button name="limpar" class="btn btn-default">Limpar</button>
                            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>

        <div class="col-lg-6">
            <?php
            echo '$_POST';
            var_dump($_POST);
            echo '$_SESSION';
            var_dump($_SESSION);
            echo '$_FILES';
            var_dump($_FILES);

            ?>
        </div>
    </div>