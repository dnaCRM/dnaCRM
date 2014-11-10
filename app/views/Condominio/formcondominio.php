<?php
$condominio = $data['condominio'];
$condominio_form = new Condominio();
$cadastrado = $condominio_form->cadastra($condominio); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];

$token = Token::generate();
?>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
            <?php if ($id_check): ?>
                <span class="btn-panel pull-right">
                <a href="Condominio/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top"
                   title="Ver Perfil!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="Condominio/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
            </span>
            <?php endif; ?>
        </h3>
    </div>
</div>

<div class="row">

    <div class="col-md-12">

        <div>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#principal" data-toggle="tab">Dados Cadastrais</a></li>
            </ul>
            <div id="TabAdicionais" class="tab-content">
                <div class="tab-pane fade active in" id="principal">

                    <div class="row">
                        <?php if ($cadastrado): ?>

                            <div class="jumbotron">
                                <div class="container">
                                    <div class="col-md-4">

                                        <?php

                                        if (file_exists("img/uploads/tb_condominio/{$cadastrado->getCdCondominio()}.jpg")) {
                                            $cadastrado->setImPerfil("img/uploads/tb_condominio/{$cadastrado->getCdCondominio()}.jpg");
                                        } else {
                                            $cadastrado->setImPerfil(ICON_USER);
                                        }

                                        ?>

                                        <img class="img-circle profilefoto left" src="<?php
                                        echo $cadastrado->getImPerfil();?>">
                                    </div>
                                    <div class="col-md-8">
                                        <h1 class="text-success"><span
                                                class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                                        <p>Deseja adicionar outro condominio?
                                        </p>

                                        <a href="Condominio/" class="btn btn-info" role="button">
                                            <i class="fa fa-arrow-circle-o-left"></i> Voltar
                                        </a>

                                        <a href="PessoaJuridica/formperfil/" class="btn btn-success" role="button">
                                            <i class="fa fa-arrow-circle-o-up"></i> Novo
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <form id="condominioform" class="form-horizontal" method="post" action=""
                                  enctype="multipart/form-data">
                                <fieldset>

                                    <div class="col-md-2">


                                        <img class="img-circle img-responsive"
                                             src="<?php echo $condominio->getImPerfil(); ?>"><br>

                                        <div class="form-group col-sm-10">
                                            <div>
                                                <label for="im_perfil" class="btn btn-default">Foto</label>

                                                <input type="file" class="hidden" id="im_perfil" name="im_perfil">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <div class="col-sm-12 inputGroupContainer">
                                                <label for="nm_condominio" class="control-label">Nome
                                                    Condominio</label>

                                                <input type="text" class="form-control" id="nm_condominio"
                                                       name="nm_condominio"
                                                       value="<?php echo $condominio->getNmCondominio() == '' ? Input::get('nm_condominio') : $condominio->getNmCondominio(); ?>"
                                                       placeholder="Nome Condominio"
                                                       maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 inputGroupContainer">
                                                <label for="rua" class="control-label">Rua</label>


                                                <input type="text" class="form-control" id="rua" name="rua"
                                                       value="<?php echo $condominio->getRua() == '' ? Input::get('rua') : $condominio->getRua(); ?>"
                                                       placeholder="Rua"
                                                       maxlength="50">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4 inputGroupContainer">
                                                <label for="bairro" class="control-label">Bairro</label>


                                                <input type="text" class="form-control" id="bairro" name="bairro"
                                                       value="<?php echo $condominio->getBairro() == '' ? Input::get('bairro') : $condominio->getBairro(); ?>"
                                                       placeholder="Bairro"
                                                       maxlength="50">
                                            </div>
                                            <div class="col-sm-4 inputGroupContainer">
                                                <label for="cidade" class="control-label">Cidade</label>


                                                <input type="text" class="form-control" id="cidade" name="cidade"
                                                       value="<?php echo $condominio->getCidade() == '' ? Input::get('cidade') : $condominio->getCidade(); ?>"
                                                       placeholder="Cidade"
                                                       maxlength="25">
                                            </div>
                                            <div class="col-sm-4 inputGroupContainer">
                                                <label for="cep" class="control-label">Cep</label>


                                                <input type="text" class="form-control" id="cep" name="cep"
                                                       value="<?php echo $condominio->getCep() == '' ? Input::get('cep') : $condominio->getCep(); ?>"
                                                       placeholder="99999-999"
                                                       maxlength="9">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 inputGroupContainer">
                                            <label for="numero" class="control-label">Nº</label>

                                            <input type="text" class="form-control" id="numero" name="numero"
                                                   value="<?php echo $condominio->getNumero() == '' ? Input::get('numero') : $condominio->getNumero(); ?>"
                                                   placeholder="99999"
                                                   maxlength="5">
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4 inputGroupContainer">
                                                <label for="estado" class="control-label">Estado</label>

                                                <select class="form-control" id="estado" name="estado">
                                                    <option value="">--</option>
                                                    <?php
                                                    $condominio->setCdVlCatgEstado($condominio->getCdVlCatgEstado() == '' ? Input::get('estado') : $condominio->getCdVlCatgEstado());
                                                    foreach ($data['estado'] as $org) {
                                                        if ($org->getCdVlCategoria() == $condominio->getCdVlCatgEstado()) {
                                                            echo '<option value="' . $org->getCdVlCategoria() . '" selected>' . $org->getDescVlCatg() . '</option>';
                                                        } else {
                                                            echo '<option value="' . $org->getCdVlCategoria() . ' ">' . $org->getDescVlCatg() . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-offset-4">

                                            <input type="hidden" name="cd_condominio"
                                                   value="<?php echo $data['id']; ?>">
                                            <input type="hidden" name="token" value="<?php echo $token; ?>">

                                            <div class="form-group">
                                                <div class="col-sm-12 clearfix">
                                                    <a href="Condominio<?php echo $data['id'] ? '/visualizar/' . $data['id'] : ''; ?>"
                                                       id="cancel" class="btn btn-default"><span
                                                            class="fa fa-undo"></span> Cancelar</a>
                                                    <a href="Condominio/formcondominio" id="novo"
                                                       class="btn btn-success"><span class="fa fa-file"></span>
                                                        Novo</a>
                                                    <button type="submit" name="cadastrar" class="btn btn-primary">
                                                        <span class="fa fa-check"></span>
                                                        Salvar
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                </fieldset>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>