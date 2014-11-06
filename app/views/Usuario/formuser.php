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
                               placeholder="Usuário" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha" name="senha" value=""
                               placeholder="Senha" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmar_senha" class="col-sm-2 control-label">Confirme a senha</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha"
                               value="" placeholder="Confirme a senha" autocomplete="off">
                    </div>
                </div>

                <input type="hidden" name="id_perfil" value="<?php echo $perfil->getCdPessoaFisica(); ?>">


                <div class="form-group">
                    <label for="nivel" class="col-sm-2 control-label">Nível de Acesso</label>

                    <div class="col-sm-10">
                        <select class="form-control" name="nivel">
                            <option value="">Escolha um nível</option>
                            <?php
                            $usuario->setNivel($usuario->getNivel() == '' ? Input::get('nivel') : $usuario->getNivel());
                            foreach ($data['niveis'] as $chave => $descricao) {
                                if ($chave == $usuario->getNivel()) {
                                    echo '<option value="' . $chave . '" selected>' . $descricao . '</option>';
                                } else {
                                    echo '<option value="' . $chave . ' ">' . $descricao . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-10">
                        <div class="btn-group" data-toggle="buttons">
                            <label
                                class="btn btn-default control-label<?php echo (($usuario->getIeStatus()) == 'A' || Input::get('ie_status') == 'A') ? ' active' : ''; ?>">
                                <input type="radio" name="ie_status"
                                       value="A" <?php echo (($usuario->getIeStatus()) == 'A' || Input::get('ie_status') == 'A') ? 'checked' : ''; ?>/>
                                Ativo
                            </label>
                            <label
                                class="btn btn-default control-label<?php echo (($usuario->getIeStatus()) == 'I' || Input::get('ie_status') == 'I') ? ' active' : ''; ?>">
                                <input type="radio" name="ie_status"
                                       value="I" <?php echo (($usuario->getIeStatus()) == 'I' || Input::get('ie_status') == 'I') ? 'checked' : ''; ?>/>
                                Inativo
                            </label>
                        </div>
                    </div>
                </div>

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

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        $_POST
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php

                    var_dump($_POST);

                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        $_SESSION
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php

                    var_dump($_SESSION);

                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <i class="glyphicon glyphicon-leaf"></i> $_FILES
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php

                    var_dump($_FILES);

                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <i class="glyphicon glyphicon-user"></i> $data
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php

                    var_dump($data);

                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <i class="glyphicon glyphicon-user"></i> $perfil
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php

                    var_dump($perfil);

                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        <i class="glyphicon glyphicon-user"></i> $usuario
                    </a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php

                    var_dump($usuario);

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
