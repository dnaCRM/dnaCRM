<!--
/**
 * Created by PhpStorm.
 * User: Raul
 * Date: 16/10/14
 * Time: 02:28
 */
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
        $condominio = $data['condominio'];
        $condominio_form = new Condominio();
        $condominio_form->cadastra($condominio);//Não cadastra na entra pois ainda não tem Token

        if (Session::exists('sucesso_salvar_condominio')) {
            Session::flash('sucesso_salvar_condominio');
        }

        ?>
        <img class="img-circle profilefoto"
             src="<?php echo $condominio->getImPerfil(); ?>">

        <form id="condominioform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
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
                        <label for="nm_condominio" class="control-label">Nome Condominio</label>

                        <input type="text" class="form-control" id="nm_condominio" name="nm_condominio"
                               value="<?php echo $condominio->getNmCondominio() == '' ? Input::get('nm_condominio') : $condominio->getNmCondominio(); ?>"
                               placeholder="Nome Condominio"
                               maxlength="50">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="cep" class="control-label">Cep</label>


                        <input type="text" class="form-control" id="cep" name="cep"
                               value="<?php echo $condominio->getCep() == '' ? Input::get('cep') : $condominio->getCep(); ?>"
                               placeholder="Cep"
                               maxlength="9">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">
                        <label for="rua" class="control-label">Rua</label>


                        <input type="text" class="form-control" id="rua" name="rua"
                               value="<?php echo $condominio->getRua() == '' ? Input::get('rua') : $condominio->getRua(); ?>"
                               placeholder="Rua"
                               maxlength="50">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">
                        <label for="bairro" class="control-label">Bairro</label>


                        <input type="text" class="form-control" id="bairro" name="bairro"
                               value="<?php echo $condominio->getBairro() == '' ? Input::get('bairro') : $condominio->getBairro(); ?>"
                               placeholder="Bairro"
                               maxlength="50">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="cidade" class="control-label">Cidade</label>


                        <input type="text" class="form-control" id="cidade" name="cidade"
                               value="<?php echo $condominio->getCidade() == '' ? Input::get('cidade') : $condominio->getCidade(); ?>"
                               placeholder="Cidade"
                               maxlength="25">
                    </div>
                </div>


                <input type="hidden" name="cd_condominio" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div class="form-group ">
                    <div class="col-lg-12">
                        <a href="Condomino/visualizar/<?php echo $data['id']; ?>="limpar" class="btn btn-default"><span class="fa fa-undo"></span> Cancelar</a>
                        <button type="reset" name="cancelar" class="btn btn-info"><span class="fa fa-recycle"></span> Limpar</button>
                        <a href="Condominio/formcondominio" id="novo" class="btn btn-success"><span class="fa fa-file"></span> Novo</a>
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
                            <i class="glyphicon glyphicon-user"></i> $condominio
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($condominio);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>