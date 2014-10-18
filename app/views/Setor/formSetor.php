<div class="row">
    <div class="col-sm-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

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
            <?php
            $setor = $data['perfil'];
            $setor_form = new Setor();
            $setor_form->cadastra($setor); //Não cadastra na entra pois ainda não tem Token

            if (Session::exists('sucesso_salvar_st')) {
                Session::flash('sucesso_salvar_st');
            }

            ?>
            <img class="img-circle profilefoto"
                 src="<?php echo $setor->getImPerfil(); ?>">

            <form id="setorform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>
                    <legend>Cadastro</legend>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="im_perfil" class="control-label">Foto</label>


                            <input type="file" class="form-control" id="im_perfil" name="im_perfil">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-12 selectContainer">
                            <label for="cd_condominio" class="control-label">Condominio</label>


                            <select class="form-control" id="cd_cgc" name="cd_condominio">
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
                        <div class="col-sm-12 inputGroupContainer">
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



                    <input type="hidden" name="cd_setor" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <div class="form-group ">
                        <div class="col-sm-12">
                            <a href="Setor/visualizoar/<?php echo $data['id']; ?>" id="limpar"
                               class="btn btn-default"><span
                                    class="fa fa-undo"></span> Cancelar</a>
                            <button type="reset" name="cancelar" class="btn btn-info"><span
                                    class="fa fa-recycle"></span> Limpar
                            </button>
                            <a href="Setor/formSetor" id="novo" class="btn btn-success"><span
                                    class="fa fa-file"></span>
                                Novo</a>
                            <button type="submit" name="cadastrar" class="btn btn-primary"><span
                                    class="fa fa-check"></span>
                                Salvar
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