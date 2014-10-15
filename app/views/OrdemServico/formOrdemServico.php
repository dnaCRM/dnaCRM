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
        $perfil_form = new OrdemServico();
        $perfil_form->cadastra($perfil);//Não cadastra na entra pois ainda não tem Token

        if (Session::exists('sucesso_salvar_os')) {
            Session::flash('sucesso_salvar_os');
        }

        ?>
        <form id="ordemservicoform" class="form-horizontal" method="post" action="">
            <fieldset>
                <legend>Cadastro</legend>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="ocorrencia" class="control-label">Ocorrência Relacionada</label>

                        <select class="form-control" id="ocorrencia" name="ocorrencia">
                            <option value="">Nenhuma</option>
                            <?php
                            $perfil->setCdOcorrencia($perfil->getCdOcorrencia() == '' ? Input::get('ocorrencia') : $perfil->getCdOcorrencia());
                            foreach ($data['ocorrencia'] as $ocorrencia) {
                                if ($ocorrencia->getCdOcorrencia() == $perfil->getCdOcorrencia()) {
                                    echo '<option value="' . $ocorrencia->getCdOcorrencia() . '" selected>' . $ocorrencia->getDescAssunto() . '</option>';
                                } else {
                                    echo '<option value="' . $ocorrencia->getCdOcorrencia() . ' ">' . $ocorrencia->getDescAssunto() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="executor" class="control-label">Executor</label>

                        <select class="form-control" id="executor" name="executor">
                            <option value="">--</option>
                            <?php
                            $perfil->setCdPfExecutor($perfil->getCdPfExecutor() == '' ? Input::get('executor') : $perfil->getCdPfExecutor());
                            foreach ($data['executor'] as $executor) {
                                if ($executor->getCdPessoaFisica() == $perfil->getCdPfExecutor()) {
                                    echo '<option value="' . $executor->getCdPessoaFisica() . '" selected>' . $executor->getNmPessoaFisica() . '</option>';
                                } else {
                                    echo '<option value="' . $executor->getCdPessoaFisica() . ' ">' . $executor->getNmPessoaFisica() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="solicitante" class="control-label">Solicitante</label>

                        <select class="form-control" id="solicitante" name="solicitante">
                            <option value="">--</option>
                            <?php
                            $perfil->setCdPfSolicitante($perfil->getCdPfSolicitante() == '' ? Input::get('solicitante') : $perfil->getCdPfSolicitante());
                            foreach ($data['solicitante'] as $solicitante) {
                                if ($solicitante->getCdPessoaFisica() == $perfil->getCdPfSolicitante()) {
                                    echo '<option value="' . $solicitante->getCdPessoaFisica() . '" selected>' . $solicitante->getNmPessoaFisica() . '</option>';
                                } else {
                                    echo '<option value="' . $solicitante->getCdPessoaFisica() . ' ">' . $solicitante->getNmPessoaFisica() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <label for="estagio" class="control-label">Estágio</label>

                        <select class="form-control" id="estagio" name="estagio">
                            <option value="">--</option>
                            <?php
                            $perfil->setCdVlCatgEstagio($perfil->getCdVlCatgEstagio() == '' ? Input::get('estagio') : $perfil->getCdVlCatgEstagio());
                            foreach ($data['estagio'] as $estagio) {
                                if ($estagio->getCdVlCategoria() == $perfil->getCdVlCatgEstagio()) {
                                    echo '<option value="' . $estagio->getCdVlCategoria() . '" selected>' . $estagio->getDescVlCatg() . '</option>';
                                } else {
                                    echo '<option value="' . $estagio->getCdVlCategoria() . ' ">' . $estagio->getDescVlCatg() . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-4 inputGroupContainer" id="dt_inicio_picker">
                        <label for="dt_inicio" class="control-label">Início</label>


                        <input type="text" class="form-control"
                               value="<?php echo $perfil->getDtInicio() == '' ? Input::get('dt_inicio') : $perfil->getDtInicio(); ?>"
                               id="dt_inicio"
                               name="dt_inicio" placeholder="___/___/____">
                    </div>
                    <div class="col-lg-4 inputGroupContainer" id="dt_fim_picker">
                        <label for="dt_fim" class="control-label">Fim</label>


                        <input type="text" class="form-control"
                               value="<?php echo $perfil->getDtFim() == '' ? Input::get('dt_fim') : $perfil->getDtFim(); ?>"
                               id="dt_fim"
                               name="dt_fim" placeholder="___/___/____">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">
                        <label for="assunto" class="control-label">Assunto</label>

                        <input type="text" class="form-control" id="assunto" name="assunto"
                               value="<?php echo $perfil->getDescAssunto() == '' ? Input::get('assunto') : $perfil->getDescAssunto(); ?>" placeholder="Assunto">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">
                        <label for="descricao" class="control-label">Descrição</label>

                        <textarea id="descricao" class="form-control" name="descricao"
                                  placeholder="Ocorrência" rows="5"><?php echo $perfil->getDescOrdemServico() == '' ? Input::get('descricao') : $perfil->getDescOrdemServico(); ?></textarea>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-12">
                        <label for="desc_conclusao" class="control-label">Conclusão</label>

                        <textarea id="desc_conclusao" class="form-control" name="desc_conclusao"
                                  placeholder="Como a OS foi concluída" rows="5"><?php echo $perfil->getDescConclusao() == '' ? Input::get('desc_conclusao') : $perfil->getDescConclusao(); ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="ordemservico" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                <div class="form-group ">
                    <div class="col-lg-12">
                        <a href="OrdemServico/visualizar/<?php echo $data['id']; ?>="limpar" class="btn btn-default"><span class="fa fa-undo"></span> Cancelar</a>
                        <button type="reset" name="cancelar" class="btn btn-info"><span class="fa fa-recycle"></span> Limpar</button>
                        <a href="OrdemServico/formOrdemServico" id="novo" class="btn btn-success"><span class="fa fa-file"></span> Novo</a>
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

                        var_dump($perfil,$data);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>