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
        <img class="img-circle profilefoto"
             src="<?php echo $data['perfil']['im_foto']; ?>">
        <?php

        $user = new User;
        $user->newUser();
        $perfil = $data['perfil'];

        if (Session::exists('msg')) {
            echo Session::flash('msg');
        }

        ?>
        <!--Formulário de Cadastro-->
        <form id="cadastro_usuario" class="form-horizontal" method="post" action="">
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

                <input type="hidden" name="id_perfil" value="<?php echo $perfil['cd_pessoa_fisica']; ?>">
                <input type="hidden" name="nivel" value="1">
                <input type="hidden" name="ie_status" value="A">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" name="cancelar" class="btn btn-info"><span class="fa fa-recycle"></span> Limpar</button>
                        <button type="submit" name="cadastrar" class="btn btn-primary"><span class="fa fa-save"></span> Cadastrar</button>
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