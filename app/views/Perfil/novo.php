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

        $erros = array_keys($perfil->getErroArr());
        //var_dump($erros);

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
                        <label for="im_foto" class="col-lg-2 control-label">Foto</label>

                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="im_foto" name="im_foto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cd_cgc" class="col-lg-2 control-label">Empresa</label>

                        <div class="col-lg-10">
                            <select class="form-control" id="cd_cgc" name="cd_cgc">
                                <option value="">-- Selecione uma empresa</option>
                                <?php //echo escape(Input::get('cd_cgc'));
                                foreach((new PessoaJuridicaModel())->fullList() as $empresa) {
                                    echo '<option value="' . $empresa['cd_cgc'] . '">' . $empresa['nm_fantasia'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cd_profissao" class="col-lg-2 control-label">Profissão</label>

                        <div class="col-lg-10">
                            <select class="form-control" id="cd_profissao" name="cd_profissao">
                                <option value="">-- Selecione uma profissão</option>
                                   <?php //echo escape(Input::get('cd_profissao'));
                                   foreach((new ProfissoesModel())->fullList() as $profissao) {
                                       echo '<option value="' . $profissao['cd_profissao'] . '">' . $profissao['nm_profissao'] . '</option>';
                                   }
                                   ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group <?php echo Validate::cssClass('nm_pessoa_fisica', $erros); ?>">
                        <label for="nm_pessoa_fisica" class="col-lg-2 control-label">Nome</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nm_pessoa_fisica" name="nm_pessoa_fisica"
                                   value="<?php echo escape(Input::get('nm_pessoa_fisica')); ?>" placeholder="Nome">
                        </div>
                    </div>
                    <div class="form-group <?php echo Validate::cssClass('email', $erros); ?>">
                        <label for="email" class="col-lg-2 control-label">Email</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?php echo escape(Input::get('email')); ?>" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-lg-2 control-label">CPF</label>

                        <div class="col-lg-3 <?php echo Validate::cssClass('cpf', $erros); ?>">
                            <input type="text" class="form-control" id="cpf" name="cpf"
                                   value="<?php echo escape(Input::get('cpf')); ?>" placeholder="000.000.000-00"
                                   maxlength="14">
                        </div>
                        <label for="rg" class="col-lg-1 control-label">RG</label>

                        <div class="col-lg-3 <?php echo Validate::cssClass('rg', $erros); ?>">
                            <input type="text" class="form-control" id="rg" name="rg"
                                   value="<?php echo escape(Input::get('rg')); ?>" placeholder="000.000.000-00"
                                   maxlength="12">
                        </div>
                        <label for="org_rg" class="col-lg-1 control-label">UF</label>

                        <div class="col-lg-2 <?php echo Validate::cssClass('org_rg', $erros); ?>">
                            <input type="text" class="form-control" id="org_rg" name="org_rg"
                                   value="<?php echo escape(Input::get('org_rg')); ?>" placeholder="XX" maxlength="2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fone" class="col-lg-2 control-label">Telefone</label>

                        <div class="col-lg-4 <?php echo Validate::cssClass('fone', $erros); ?>">
                            <input type="tel" class="form-control" id="fone" name="fone"
                                   value="<?php echo escape(Input::get('fone')); ?>" placeholder="00 0000-0000">
                        </div>

                        <label for="celular" class="col-lg-2 control-label">Celular</label>

                        <div class="col-lg-4 <?php echo Validate::cssClass('celular', $erros); ?>">
                            <input type="tel" class="form-control" id="celular" name="celular"
                                   value="<?php echo escape(Input::get('celular')); ?>" placeholder="00 00000-0000">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dt_nascimento" class="col-lg-2 control-label">Nascimento</label>

                        <div class="col-lg-4 <?php echo Validate::cssClass('dt_nascimento', $erros); ?>">
                            <input type="text" class="form-control"
                                   value="<?php echo escape(Input::get('dt_nascimento')); ?>" id="dt_nascimento"
                                   name="dt_nascimento">
                        </div>

                        <label class="col-lg-1 control-label">Sexo</label>
                        <label class="col-lg-2 control-label <?php echo Validate::cssClass('ie_sexo', $erros); ?>">
                            <input type="radio" name="ie_sexo" id="masculino" value="m" <?php echo ((Input::get('ie_sexo') == 'm') ? 'checked':''); ?>>
                            Masc.
                        </label>
                        <label class="col-lg-2 control-label">
                            <input type="radio" name="ie_sexo" id="feminino" value="f" <?php echo ((Input::get('ie_sexo') == 'f') ? 'checked':''); ?>>
                            Femin.
                        </label>
                    </div>

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <div class="form-group ">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button name="limpar" class="btn btn-default">Limpar</button>
                            <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>

        <div class="col-lg-6">

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
            </div>
        </div>
    </div>