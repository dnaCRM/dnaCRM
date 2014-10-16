<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <img src="img/dna_m_big.png" class="img-responsive pull-left">
            </div>
            <div class="col-sm-4 pull-left">
                <h1><?php echo(isset($data['pagetitle']) ? $data['pagetitle'] : ""); ?></h1>

                <p class="lead">
                    <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
                </p>
            </div>

        </div>
    </div>
</div>
<p></p>

<div class="row">

    <div class="col-sm-6">

        <?php

        $user = new Usuario;
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
        <form id="login" class="form-horizontal" method="post" action="">
            <fieldset>
                <div class="form-group" id="user-form-group">
                    <label for="usuario" class="col-sm-2 control-label">Usuário</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuario" name="usuario"
                               value="<?php echo escape(Input::get('usuario')); ?>" placeholder="Usuário">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                        <br>
                    </div>
                </div>

                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary" id="login">Login</button>
                    </div>
                </div>
            </fieldset>
        </form>

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
                    <div id="collapseOne" class="panel-collapse collapse">
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
                                <i class="glyphicon glyphicon-leaf"></i> $data
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php

                            var_dump($data);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>