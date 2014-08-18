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

        $perfil = $data['perfil'];
        $nasc = new DateTime($perfil['dt_nascimento']);
        $perfil['dt_nascimento'] = $nasc->format('d/m/Y');

        $atualiza_perfil = new Perfil;
        $atualiza_perfil->newPerfil($perfil['cd_pessoa_fisica']);
        $erros = array_keys($atualiza_perfil->getErroArr());

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
             <img class="img-circle profilefoto"
                  src="<?php echo $data['img_folder'] . $perfil['cd_pessoa_fisica'] . '.jpg'; ?>">

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
                            <input type="text" class="form-control" id="cd_cgc" name="cd_cgc"
                                   value="<?php echo $perfil['cd_cgc']; ?>" placeholder="Empresa">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cd_profissao" class="col-lg-2 control-label">Profissão</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="cd_profissao" name="cd_profissao"
                                   value="<?php echo $perfil['cd_profissao']; ?>" placeholder="Profissão">
                        </div>
                    </div>

                    <div class="form-group <?php echo Validate::cssClass('nm_pessoa_fisica', $erros); ?>">
                        <label for="nm_pessoa_fisica" class="col-lg-2 control-label">Nome</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nm_pessoa_fisica" name="nm_pessoa_fisica"
                                   value="<?php echo $perfil['nm_pessoa_fisica']; ?>" placeholder="Nome">
                        </div>
                    </div>
                    <div class="form-group <?php echo Validate::cssClass('email', $erros); ?>">
                        <label for="email" class="col-lg-2 control-label">Email</label>

                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?php echo $perfil['email']; ?>" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-lg-2 control-label">CPF</label>

                        <div class="col-lg-3 <?php echo Validate::cssClass('cpf', $erros); ?>">
                            <input type="text" class="form-control" id="cpf" name="cpf"
                                   value="<?php echo $perfil['cpf']; ?>" placeholder="000.000.000-00"
                                   maxlength="14">
                        </div>
                        <label for="rg" class="col-lg-1 control-label">RG</label>

                        <div class="col-lg-3 <?php echo Validate::cssClass('rg', $erros); ?>">
                            <input type="text" class="form-control" id="rg" name="rg"
                                   value="<?php echo $perfil['rg']; ?>" placeholder="000.000.000-00"
                                   maxlength="12">
                        </div>
                        <label for="org_rg" class="col-lg-1 control-label">UF</label>

                        <div class="col-lg-2 <?php echo Validate::cssClass('org_rg', $erros); ?>">
                            <input type="text" class="form-control" id="org_rg" name="org_rg"
                                   value="<?php echo $perfil['org_rg']; ?>" placeholder="XX" maxlength="2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fone" class="col-lg-2 control-label">Telefone</label>

                        <div class="col-lg-4 <?php echo Validate::cssClass('fone', $erros); ?>">
                            <input type="tel" class="form-control" id="fone" name="fone"
                                   value="<?php echo $perfil['fone']; ?>" placeholder="00 0000-0000">
                        </div>

                        <label for="celular" class="col-lg-2 control-label">Celular</label>

                        <div class="col-lg-4 <?php echo Validate::cssClass('celular', $erros); ?>">
                            <input type="tel" class="form-control" id="celular" name="celular"
                                   value="<?php echo $perfil['celular']; ?>" placeholder="00 00000-0000">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dt_nascimento" class="col-lg-2 control-label">Nascimento</label>

                        <div class="col-lg-4 <?php echo Validate::cssClass('dt_nascimento', $erros); ?>">
                            <input type="text" class="form-control"
                                   value="<?php echo $perfil['dt_nascimento']; ?>" id="dt_nascimento"
                                   name="dt_nascimento">
                        </div>

                        <label class="col-lg-1 control-label">Sexo</label>
                        <label class="col-lg-2 control-label <?php echo Validate::cssClass('ie_sexo', $erros); ?>">
                            <input type="radio" name="ie_sexo" id="masculino" value="m" <?php echo (($perfil['ie_sexo']) == 'm') ? 'checked':''; ?>>
                            Masc.
                        </label>
                        <label class="col-lg-2 control-label">
                            <input type="radio" name="ie_sexo" id="feminino" value="f" <?php echo (($perfil['ie_sexo']) == 'f') ? 'checked':''; ?>>
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