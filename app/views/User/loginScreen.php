<div class="row">
    <div class="col-lg-6">
        <h1><?php echo(isset($data['pagetitle']) ? $data['pagetitle'] : ""); ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Bem-vindo! "Lembrar de definir includes para header e scripts"
            </p>

        </div>
    </div>
</div>

<!--Teste de Form-->
<div class="row">
    <div class="col-lg-6">

        <?php

        $user = new User;
        $user->processLogin();

        if (Session::exists('msg')) {
            echo Session::flash('msg');
        }
        if (Session::exists('erros')) {
            foreach (Session::get('erros') as $erro) {
                CodeError($erro, E_USER_WARNING);
            }
        }
        ?>
        <!--Formulário de Cadastro-->
        <form class="form-horizontal" method="post" action="">
            <fieldset>
                <div class="form-group" id="user-form-group">
                    <label for="usuario" class="col-lg-2 control-label">Usuário</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="usuario" name="usuario"
                               value="<?php echo escape(Input::get('usuario')); ?>" placeholder="Usuário">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-lg-2 control-label">Senha</label>

                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>
                </div>

                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button name="limpar" class="btn btn-default">Limpar</button>
                        <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Submit">
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

    <div class="col-lg-6">
<!--        --><?php
/*        Echo '$_SESSION';
        var_dump($_SESSION);
        Echo '$_POST';
        var_dump($_POST);
        */?>
    </div>
</div>