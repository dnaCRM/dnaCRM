<div class="row">
    <div class="col-lg-6">
        <h1><?php echo (isset($data['pagetitle']) ? $data['pagetitle'] : ""); ?></h1>

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

        $user = new User;
        $user->processRegister();

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
                <legend>Cadastro</legend>
                <div class="form-group">
                    <label for="usuario" class="col-lg-2 control-label">Usuário</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo escape(Input::get('usuario')); ?>" placeholder="Usuário">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-lg-2 control-label">Senha</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="senha" name="senha" value="" placeholder="Senha">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmar_senha" class="col-lg-2 control-label">Confirme a senha</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" value="" placeholder="Confirme a senha">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nome_usuario" class="col-lg-2 control-label">Nome</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" value="<?php echo escape(Input::get('nome_usuario')); ?>" placeholder="Nome">
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

        ?>
    </div>
</div>