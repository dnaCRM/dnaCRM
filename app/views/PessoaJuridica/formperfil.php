<!--
 * Created by PhpStorm.
 * User: Raul
 * Date: 13/10/14
 * Time: 23:41
 -->

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
    $perfil_form = new PessoaJuridica();
    $perfil_form->cadastra($perfil);//Não cadastra na entra pois ainda não tem Token

    if (Session::exists('sucesso_salvar_pj')) {
        Session::flash('sucesso_salvar_pj');
    }

    ?>
    <img class="img-circle profilefoto"
         src="<?php echo $perfil->getImPerfil(); ?>">

    <form id="pessoajuridicaform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Cadastro</legend>
            <div class="form-group">
                <div class="col-lg-12">
                    <label for="im_perfil" class="control-label">Foto</label>


                    <input type="file" class="form-control" id="im_perfil" name="im_perfil">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="cnpj" class="control-label">Cnpj</label>

                    <input type="text" class="form-control" id="cnpj" name="cnpj"
                           value="<?php echo $perfil->getCnpj() == '' ? Input::get('cnpj') : $perfil->getCnpj(); ?>"
                           placeholder="00.000.000/0000-00"
                           maxlength="18">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="cnpj" class="control-label">Nome Fantasia</label>


                    <input type="text" class="form-control" id="nm_fantasia" name="nm_fantasia"
                           value="<?php echo $perfil->getNmFantasia() == '' ? Input::get('nm_fantasia') : $perfil->getNmFantasia(); ?>" placeholder="Nome Fantasia">
                </div>
            </div>

            <div class="form-group">

                <div class="col-lg-12">
                    <label for="desc_razao" class="control-label">Razão Social</label>


                    <input type="text" class="form-control" id="desc_razao" name="desc_razao"
                           value="<?php echo $perfil->getDescRazao() == '' ? Input::get('desc_razao') : $perfil->getDescRazao(); ?>" placeholder="Razão Social">
                </div>
            </div>

            <div class="form-group">

                <div class="col-lg-12">
                    <label for="desc_atividade" class="control-label">Ramo de Atividade</label>


                    <input type="text" class="form-control" id="desc_atividade" name="desc_atividade"
                            value="<?php echo $perfil->getDescAtividade() == '' ? Input::get('desc_atividade') : $perfil->getDescAtividade(); ?>" placeholder="Ramo de Atividade">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <label for="email" class="control-label">Email</label>


                    <input type="text" class="form-control" id="email" name="email"
                        value="<?php echo $perfil->getEmail() == '' ? Input::get('email') : $perfil->getEmail(); ?>" placeholder="Email">
                </div>
            </div>


            <input type="hidden" name="cd_pessoa_juridica" value="<?php echo $data['id']; ?>">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

            <div class="form-group ">
                <div class="col-lg-12">
                    <a href="PessoaJuridica/visualizar/<?php echo $data['id']; ?>="limpar" class="btn btn-default"><span class="fa fa-undo"></span> Cancelar</a>
                    <button type="reset" name="cancelar" class="btn btn-info"><span class="fa fa-recycle"></span> Limpar</button>
                    <a href="PessoaJuridica/formperfil" id="novo" class="btn btn-success"><span class="fa fa-file"></span> Novo</a>
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