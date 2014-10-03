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
$perfil_form = new PessoaFisica();
$perfil_form->cadastra($perfil);//Não cadastra na entra pois ainda não tem Token

if (Session::exists('sucesso_salvar_pf')) {
    Session::flash('sucesso_salvar_pf');
}

?>
    <img class="img-circle profilefoto"
         src="<?php echo $perfil->getImPerfil(); ?>">

    <form id="pessoafisicaform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Cadastro</legend>
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="im_perfil" class="control-label">Foto</label>


                    <input type="file" class="form-control" id="im_perfil" name="im_perfil">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12 selectContainer">
                    <label for="cd_pessoa_juridica" class="control-label">Empresa</label>


                    <select class="form-control" id="cd_cgc" name="cd_pessoa_juridica">
                        <option value="">-- Selecione uma empresa</option>
                        <?php //echo escape(Input::get('cd_cgc'));
                        $perfil->setCdPessoaJuridica($perfil->getCdPessoaJuridica() == '' ? Input::get('cd_cgc') : $perfil->getCdPessoaJuridica());
                        foreach ((new PessoaJuridicaModel())->fullList() as $empresa) {

                            if ($empresa['cd_pessoa_juridica'] == $perfil->getCdPessoaJuridica()) {
                                echo '<option value="' . $empresa['cd_pessoa_juridica'] . '" selected>' . $empresa['nm_fantasia'] . '</option>';
                            } else {
                                echo '<option value="' . $empresa['cd_pessoa_juridica'] . ' ">' . $empresa['nm_fantasia'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12 selectContainer">
                    <label for="cd_profissao" class="control-label">Profissão</label>

                    <select class="form-control" id="cd_profissao" name="cd_profissao">
                        <option value="">-- Selecione uma profissão</option>
                        <?php //echo escape(Input::get('cd_profissao'));
                        $perfil->setCdProfissao($perfil->getCdProfissao() == '' ? Input::get('cd_profissao') : $perfil->getCdProfissao());
                        foreach ((new ProfissoesModel())->fullList() as $profissao) {
                            if ($profissao['cd_profissao'] == $perfil->getCdProfissao()) {
                                echo '<option value="' . $profissao['cd_profissao'] . '" selected>' . $profissao['nm_profissao'] . '</option>';
                            } else {
                                echo '<option value="' . $profissao['cd_profissao'] . ' ">' . $profissao['nm_profissao'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12 inputGroupContainer">
                    <label for="nm_pessoa_fisica" class="control-label">Nome</label>


                    <input type="text" class="form-control" id="nm_pessoa_fisica" name="nm_pessoa_fisica"
                           value="<?php echo $perfil->getNmPessoaFisica() == '' ? Input::get('nm_pessoa_fisica') : $perfil->getNmPessoaFisica(); ?>" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 inputGroupContainer">
                    <label for="email" class="control-label">Email</label>


                    <input type="text" class="form-control" id="email" name="email"
                           value="<?php echo $perfil->getEmail() == '' ? Input::get('email') : $perfil->getEmail(); ?>" placeholder="Email">
                </div>
            </div>


            <div class="form-group">


                <div class="col-lg-4 inputGroupContainer" id="datetimepicker">
                    <label for="dt_nascimento" class="control-label">Nascimento</label>


                    <input type="text" class="form-control"
                           value="<?php echo $perfil->getDtNascimento() == '' ? Input::get('dt_nascimento') : $perfil->getDtNascimento(); ?>" id="dt_nascimento"
                           name="dt_nascimento" placeholder="___/___/____">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-4 inputGroupContainer">
                    <label for="cpf" class="control-label">CPF</label>


                    <input type="text" class="form-control" id="cpf" name="cpf"
                           value="<?php echo $perfil->getCpf() == '' ? Input::get('cpf') : $perfil->getCpf(); ?>" placeholder="000.000.000-00"
                           maxlength="14">
                </div>
                <div class="col-lg-4 inputGroupContainer">
                    <label for="rg" class="control-label">RG</label>


                    <input type="text" class="form-control" id="rg" name="rg"
                           value="<?php echo $perfil->getRg() == '' ? Input::get('rg') : $perfil->getRg(); ?>" placeholder="00000000"
                           maxlength="12">
                </div>
                <div class="col-lg-4 inputGroupContainer">
                    <label for="org_rg" class="control-label">UF</label>


                    <input type="text" class="form-control" id="org_rg" name="org_rg"
                           value="" placeholder="XX" maxlength="2" disabled>
                </div>
            </div>

            <div class="form-group pull-right">
                <label class="control-label col-lg-1">Sexo</label>

                <div class="col-lg-12">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-default control-label">
                            <input type="radio" name="ie_sexo"
                                   value="m" <?php echo (($perfil->getIeSexo()) == 'm' || Input::get('ie_sexo') == 'm') ? 'checked' : ''; ?>/> Masculino
                        </label>
                        <label class="btn btn-default control-label">
                            <input type="radio" name="ie_sexo"
                                   value="f" <?php echo (($perfil->getIeSexo()) == 'f' || Input::get('ie_sexo') == 'f') ? 'checked' : ''; ?>/> Feminino
                        </label>
                    </div>
                </div>

            </div>

            <input type="hidden" name="cd_pessoa_fisica" value="<?php echo $data['id']; ?>">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

            <div class="form-group ">
                <div class="col-lg-12">
                    <a href="#" id="limpar" class="btn btn-default"><span class="fa fa-undo"></span> Cancelar</a>
                    <button type="reset" name="cancelar" class="btn btn-info"><span class="fa fa-recycle"></span> Limpar</button>
                    <a href="PessoaFisica/formperfil" id="novo" class="btn btn-success"><span class="fa fa-file"></span> Novo</a>
                    <button type="submit" name="cadastrar" class="btn btn-primary"><span class="fa fa-check"></span> Salvar</button>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <i class="glyphicon glyphicon-user"></i> $perfil
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php

                    var_dump($perfil);

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>