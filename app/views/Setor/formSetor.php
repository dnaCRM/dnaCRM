<?php
$setor = $data['setor'];
$setor_form = new Setor();
$cadastrado = $setor_form->cadastra($setor); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];

$token = Token::generate();
?>
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
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

                         if (file_exists("img/uploads/tb_setor/{$cadastrado->getCdSetor()}.jpg")) {
                             $cadastrado->setImPerfil("img/uploads/tb_setor/{$cadastrado->getCdSetor()}.jpg");
                         } else {
                             $cadastrado->setImPerfil(ICON_USER);
                         }

                         ?>

                         <img class="img-circle profilefoto left" src="<?php
                         echo $cadastrado->getImPerfil();?>">
                     </div>
                     <div class="col-md-8">
                         <h1 class="text-success"><span class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                         <p>Deseja adicionar outro setor?
                         </p>

                         <a href="Setor/" class="btn btn-info" role="button">
                             <i class="fa fa-arrow-circle-o-left"></i> Voltar
                         </a>

                         <a href="Setor/formsetor/" class="btn btn-success" role="button">
                             <i class="fa fa-arrow-circle-o-up"></i> Novo
                         </a>

                     </div>
                 </div>
             </div>
        <?php else: ?>
            <form id="setorform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>

                    <div class="col-md-2">

                        <img class="img-circle img-responsive" src="<?php echo $setor->getImPerfil(); ?>"><br>

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


                                <select class="form-control" id="cd_condominio" name="cd_condominio">
                                       <option value="">-- Selecione um condominio</option>
                                       <?php //echo escape(Input::get('cd_cgc'));
                                       $setor->setCdCondominio($setor->getCdCondominio() == '' ? Input::get('condominio') : $setor->getCdCondominio());
                                       foreach ($data['condominio'] as $condominio) {

                                             if ($condominio->getCdCondominio() == $setor->getCdCondominio()) {
                                                 echo '<option value="' . $condominio->getCdCondominio() . '" selected>' . $condominio->getNmCondominio() . '</option>';
                                             } else {
                                                 echo '<option value="' . $condominio->getCdCondominio() . ' ">' . $condominio->getNmCondominio() . '</option>';
                                             }
                                             }
                                       ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="nm_setor" class="control-label">Nome</label>


                                <input type="text" class="form-control" id="nm_setor" name="nm_setor"
                                value="<?php echo $setor->getNmSetor() == '' ? Input::get('nm_setor') : $setor->getNmSetor(); ?>"
                                placeholder="Nome">
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
                    </div>

                    <div class="col-sm-offset-4">

                        <input type="hidden" name="cd_setor" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">

                        <div class="form-group">
                            <div class="col-sm-12 clearfix">
                                <a href="setor/visualizar/<?php echo $data['id']; ?>" id="cancel" class="btn btn-default"><span
                                     class="fa fa-undo"></span> Cancelar</a>
                                <a href="Setor/formSetor" id="novo" class="btn btn-success"><span class="fa fa-file"></span>
                                     Novo</a>
                                <button type="submit" name="cadastrar" class="btn btn-primary"><span class="fa fa-check"></span>
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