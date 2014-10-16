<div class="row">
    <div class="col-sm-6">
        <h1><?php echo(isset($data['pagetitle']) ? $data['pagetitle'] : ""); ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>

    </div>
    <div class="col-sm-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Alguma coisa!
            </p>

        </div>
    </div>
</div>

<!--Teste de Form-->
<div class="row">
    <div class="col-sm-6">
        <div class="well">
            <img class="img-circle profilefoto"
                 src="<?php echo $data['perfil']->getImPerfil(); ?>">
            <?php

            $user = new Usuario();
            $user->setAtualizar($data['atualizar']);
            $user->salvarUsuario();
            $perfil = $data['perfil'];
            $usuario = $data['usuario'];

            if (Session::exists('usuario_cadastrado')) {
                echo Session::flash('usuario_cadastrado');
            }

            ?>
            <!--Formulário de Cadastro-->
            <form id="cadastro_usuario" class="form-horizontal" method="post" action="">
                <fieldset>
                    <legend>Cadastro</legend>
                    <div class="form-group">
                        <label for="usuario" class="col-sm-2 control-label">Usuário</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                   value="<?php echo $usuario->getLogin() ?
                                       $usuario->getLogin() : escape(Input::get('usuario')); ?>"
                                   placeholder="Usuário">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="col-sm-2 control-label">Senha</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="senha" name="senha" value=""
                                   placeholder="Senha">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmar_senha" class="col-sm-2 control-label">Confirme a senha</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha"
                                   value="" placeholder="Confirme a senha">
                        </div>
                    </div>

                    <input type="hidden" name="id_perfil" value="<?php echo $perfil->getCdPessoaFisica(); ?>">
                    <input type="hidden" name="nivel" value="1">
                    <input type="hidden" name="ie_status" value="A">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="reset" name="cancelar" class="btn btn-info"><span
                                    class="fa fa-recycle"></span> Limpar
                            </button>
                            <button type="submit" name="cadastrar" class="btn btn-primary"><span
                                    class="fa fa-save"></span> Cadastrar
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>

    <div class="col-sm-6">
        <?php
        echo '$_POST';
        var_dump($_POST);
        echo '$_SESSION';
        var_dump($_SESSION);

        ?>
    </div>
</div>