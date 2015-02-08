<?php
$setor = $data['setor'];
$setor_form = new Setor();
$cadastrado = $setor_form->cadastra($setor); //Não cadastra na entra pois ainda não tem Token

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
                <a href="Setor/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top"
                   title="Ver Perfil!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="Setor/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
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
                        <img class="img-circle profilefoto left" src="<?php
                        echo Image::get($cadastrado);?>">
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-success"><span
                                class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                        <p>Deseja adicionar outro setor?
                        </p>

                        <a href="Setor/" class="btn btn-info" role="button">
                            <i class="fa fa-arrow-circle-o-left"></i> Voltar
                        </a>

                        <a href="Setor/formSetor/" class="btn btn-success" role="button">
                            <i class="fa fa-arrow-circle-o-up"></i> Novo
                        </a>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <form id="setorform" class="form-horizontal" method="post" action=""
                  enctype="multipart/form-data">
                <fieldset>

                    <div class="col-md-2">

                        <img class="img-circle img-responsive"
                             src="<?php echo Image::get($setor); ?>"><br>

                        <div class="form-group col-sm-10">
                            <div>
                                <label for="im_perfil" class="btn btn-default">Foto</label>
                                <input type="file" class="hidden" id="im_perfil" name="im_perfil">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-12 selectContainer">
                                <label for="cd_condominio" class="control-label">Condominio</label>


                                <select class="form-control" id="cd_condominio"
                                        name="cd_condominio">
                                    <option value="">-- Selecione um condominio</option>
                                    <?php //echo escape(Input::get('cd_cgc'));
                                    $setor->setCdCondominio($setor->getCdCondominio() == '' ? Input::get('cd_condominio') : $setor->getCdCondominio());
                                    foreach ($data['condominio'] as $condominio) {

                                        if ($condominio->getCdPessoaJuridica() == $setor->getCdCondominio()) {
                                            echo '<option value="' . $condominio->getCdPessoaJuridica() . '" selected>' . $condominio->getNmFantasia() . '</option>';
                                        } else {
                                            echo '<option value="' . $condominio->getCdPessoaJuridica() . ' ">' . $condominio->getNmFantasia() . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 inputGroupContainer">
                                <label for="nm_setor" class="control-label">Nome</label>


                                <input type="text" class="form-control" id="nm_setor"
                                       name="nm_setor"
                                       value="<?php echo $setor->getNmSetor() == '' ? Input::get('nm_setor') : $setor->getNmSetor(); ?>"
                                       placeholder="Nome">
                            </div>
                            <div class="col-sm-6 inputGroupContainer">
                                <label class="control-label">Tipo de Setor</label><br>


                                <div class="btn-group" data-toggle="buttons">
                                    <label
                                        class="btn btn-default<?php echo (($setor->getCdCatgTipo()) == 18 || Input::get('cd_tipo') == 18) ? ' active' : ''; ?>">
                                        <input type="radio" name="cd_tipo" id="check_tipo_apartamento"
                                               value="18" <?php echo (($setor->getCdCatgTipo()) == 18 || Input::get('cd_tipo') == 18) ? ' checked' : ''; ?>/>
                                        <i class="fa fa-bed text-primary"></i> Apartamento
                                    </label>
                                    <label
                                        class="btn btn-default<?php echo (($setor->getCdCatgTipo()) == 17 || Input::get('cd_tipo') == 17) ? ' active' : ''; ?>">
                                        <input type="radio" name="cd_tipo" id="check_tipo_setor"
                                               value="17" <?php echo (($setor->getCdCatgTipo()) == 17 || Input::get('cd_tipo') == 17) ? ' checked' : ''; ?>/>
                                        <i class="fa fa-map-marker text-info"></i> Setor
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 selectContainer">
                                <label for="cd_sub_tipo" class="control-label">Categoria</label>

                                <div>
                                    <select class="form-control" name="cd_sub_tipo" id="cd_sub_tipo">
                                        <option value="">--</option>
                                        <?php
                                        if ($id_check) {
                                            if ($setor->getCdCatgTipo() == 18) {
                                                foreach ($data['tipos_apartamento'] as $cat_ap) {
                                                    if ($setor->getCdVlCatgTipo() == $cat_ap->getCdVlCategoria()) {
                                                        echo "<option value=\"{$cat_ap->getCdVlCategoria()}\" selected>{$cat_ap->getDescVlCatg()}</option>";
                                                    } else {
                                                        echo "<option value=\"{$cat_ap->getCdVlCategoria()}\">{$cat_ap->getDescVlCatg()}</option>";
                                                    }
                                                }
                                            } else if ($setor->getCdCatgTipo() == 17) {
                                                foreach ($data['tipos_setor'] as $cat_ap) {
                                                    if ($setor->getCdVlCatgTipo() == $cat_ap->getCdVlCategoria()) {
                                                        echo "<option value=\"{$cat_ap->getCdVlCategoria()}\" selected>{$cat_ap->getDescVlCatg()}</option>";
                                                    } else {
                                                        echo "<option value=\"{$cat_ap->getCdVlCategoria()}\">{$cat_ap->getDescVlCatg()}</option>";
                                                    }}
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 selectContainer">
                                <label for="cd_setor_grupo" class="control-label">Grupo</label>

                                <div>
                                    <select class="form-control" name="cd_setor_grupo" id="cd_setor_grupo">
                                        <option value="">--</option>
                                        <?php
                                        if ($id_check) {
                                            if ($setor->getCdCatgTipo() == 18) {
                                                foreach ($data['torres_apartamentos'] as $torre) {
                                                    if ($setor->getCdSetorGrupo() == $torre->getCdSetor()) {
                                                        echo "<option value=\"{$torre->getCdSetor()}\" selected>{$torre->getNmSetor()}</option>";
                                                    } else {
                                                        echo "<option value=\"{$torre->getCdSetor()}\">{$torre->getNmSetor()}</option>";
                                                    }
                                                }
                                            } else if ($setor->getCdCatgTipo() == 17) {
                                                foreach ($data['setores'] as $sub_setor) {
                                                    if ($setor->getCdSetorGrupo() == $sub_setor->getCdSetor()) {
                                                        echo "<option value=\"{$sub_setor->getCdSetor()}\" selected>{$sub_setor->getNmSetor()}</option>";
                                                    } else {
                                                        echo "<option value=\"{$sub_setor->getCdSetor()}\">{$sub_setor->getNmSetor()}</option>";
                                                    }}
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="ramal" class="control-label">Ramal</label>


                                <input type="text" class="form-control" id="ramal"
                                       name="ramal"
                                       value="<?php echo $setor->getRamal() == '' ? Input::get('ramal') : $setor->getRamal(); ?>"
                                       placeholder="Ramal">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="observacao" class="control-label">Observação</label>

                                <textarea id="observacao" class="form-control" name="observacao"
                                          placeholder="Observação"
                                          rows="5"><?php echo $setor->getObservacao() == '' ? Input::get('observacao') : $setor->getObservacao(); ?></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="cd_setor" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">

                        <div class="form-group">
                            <div class="col-sm-12 clearfix">
                                <a href="Setor<?php echo $data['id'] ? '/visualizar/' . $data['id'] : ''; ?>"
                                   id="cancel" class="btn btn-default"><span
                                        class="fa fa-undo"></span> Cancelar</a>
                                <a href="Setor/formSetor" id="novo" class="btn btn-success"><span
                                        class="fa fa-file"></span>
                                    Novo</a>
                                <button type="submit" name="cadastrar" class="btn btn-primary"><span
                                        class="fa fa-check"></span>
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="panel panel-warning">

                            <div class="panel-heading">
                                <h5 class="panel-title"><i class="fa fa-arrow-right"></i> Algumas
                                    instruções</h5>
                            </div>

                            <div class="panel-body">
                                Algumas instruções e recomendações para o correto preenchimento do
                                formulário
                            </div>

                            <div class="panel-footer">

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
    </div>
