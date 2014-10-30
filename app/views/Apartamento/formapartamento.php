<div class="row">
    <div class="col-sm-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-sm-6">
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
            $condominios = $data['condominios'];
            $apartamento = $data['apartamento'];
            $apartamento_form = new Apartamento();
            $apartamento_form->cadastra($apartamento); //Não cadastra na entra pois ainda não tem Token

            if (Session::exists('sucesso_salvar_apartamento')) {
                Session::flash('sucesso_salvar_apartamento');
            }

            ?>

            <form id="apartamentoform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>
                    <legend>Cadastro</legend>

                    <div class="form-group">
                        <div class="col-sm-12 selectContainer">
                            <label for="m_end_codominio" class="control-label">Condomínio</label>

                            <select class="form-control" name="m_end_condominio" id="m_end_condominio">
                                <option value="">--</option>
                                <?php
                                foreach ($condominios as $condominio) {
                                    echo "<option value=\"{$condominio->getCdCondominio()}\">{$condominio->getNmCondominio()}</option>";
                                };?>
                            </select>

                        </div>
                        <div class="col-sm-12 selectContainer">
                            <label for="m_end_setor" class="control-label">Setor</label>

                            <select class="form-control" name="setor" id="m_end_setor">
                                <option value="">--</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <label for="desc_apartamento" class="control-label">Descrição</label>


                            <input type="text" class="form-control" id="desc_apartamento" name="desc_apartamento"
                                   value="<?php echo $apartamento->getDescApartamento() == '' ? Input::get('desc_apartamento') : $apartamento->getDescApartamento(); ?>"
                                   placeholder="Descrição Apartamento"
                                   maxlength="10">
                        </div>
                    </div>

                    <input type="hidden" name="cd_apartamento" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <div class="form-group ">
                        <div class="col-sm-12">
                            <a href="#" id="limpar" class="btn btn-default"><span class="fa fa-undo"></span>
                                Cancelar</a>
                            <button type="reset" name="cancelar" class="btn btn-info"><span
                                    class="fa fa-recycle"></span> Limpar
                            </button>
                            <a href="Apartamento/formapartamento" id="novo" class="btn btn-success"><span
                                    class="fa fa-file"></span> Novo</a>
                            <button type="submit" name="cadastrar" class="btn btn-primary"><span
                                    class="fa fa-check"></span> Salvar
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
                            <i class="glyphicon glyphicon-user"></i> $apartamento
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($apartamento);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>