<?php
$perfil = $data['perfil'];
$perfil_form = new OrdemServico();
$cadastrado = $perfil_form->cadastra($perfil); // Não cadastra na entrada pois ainda nao tem token

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
    <li class="active"><a href="#principal" data-toggle="tab">Cadastro</a></li>
</ul>

<div id="TabAdicionais" class="tab-content">
<div class="tab-pane fade active in" id="principal">

    <div class="row">
        <?php if ($cadastrado): ?>

            <div class="jumbotron">
                <div class="container">
                    <div class="col-md-8">
                        <h1 class="text-success"><span class="glyphicon glyphicon-arrow-right"></span>
                            Sucesso!</h1>

                        <p>Deseja adicionar mais ordem de serviço ?</p>

                        <a href="OrdemServico/" class="btn btn-info" role="button">
                            <i class="fa fa-arrow-circle-o-left"></i> Voltar
                        </a>

                        <a href="OrdemServico/formOrdemServico/" class="btn btn-success" role="button">
                            <i class="fa fa-arrow-circle-o-up"></i> Novo
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <form id="ocorrenciaform" class="form-horizontal" method="post" action=""
                  enctype="multipart/form-data">
                <fieldset>
                    <!-- Lado Esquerdo -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="assunto" class="control-label">Assunto</label>

                                <input type="text" class="form-control" id="assunto" name="assunto"
                                       value="<?php echo $perfil->getDescAssunto() == '' ? Input::get('assunto') : $perfil->getDescAssunto(); ?>"
                                       placeholder="Assunto">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-sm-12">
                                <label for="descricao" class="control-label">Descrição</label>

                                <textarea id="descricao" class="form-control" name="descricao"
                                          placeholder="Ocorrência"
                                          rows="5"><?php echo $perfil->getDescOrdemServico() == '' ? Input::get('descricao') : $perfil->getDescOrdemServico(); ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="desc_conclusao" class="control-label">Conclusão</label>

                                <textarea id="desc_conclusao" class="form-control" name="desc_conclusao"
                                          placeholder="Como a OS foi concluída"
                                          rows="5"><?php echo $perfil->getDescConclusao() == '' ? Input::get('desc_conclusao') : $perfil->getDescConclusao(); ?></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- Lado Direito -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-6">
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


                            <div class="col-sm-6">
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
                            <div class="col-sm-6">
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

                            <div class="col-sm-6">
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
                            <div class="col-sm-6">
                                <label for="dt_inicio" class="control-label">Início</label>


                                <input type="text" class="form-control data-input"
                                       value="<?php echo $perfil->getDtInicio() == '' ? Input::get('dt_inicio') : $perfil->getDtInicio(); ?>"
                                       id="dt_inicio"
                                       name="dt_inicio" placeholder="___/___/____">
                            </div>


                            <div class="col-sm-6">
                                <label for="dt_fim" class="control-label">Fim</label>


                                <input type="text" class="form-control data-input"
                                       value="<?php echo $perfil->getDtFim() == '' ? Input::get('dt_fim') : $perfil->getDtFim(); ?>"
                                       id="dt_fim"
                                       name="dt_fim" placeholder="___/___/____">
                            </div>
                        </div>

                        <input type="hidden" name="ordemservico" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">

                        <div class="">
                            <a href="OrdemServico/visualizar/<?php echo $data['id']; ?>" id="cancel"
                               class="btn btn-default">
                                <span class="fa fa-undo"></span> Cancelar</a>
                            <a href="OrdemServico/formOrdemServico" id="novo" class="btn btn-success">
                                <span class="fa fa-file"></span> Novo</a>
                            <button type="submit" name="cadastrar" class="btn btn-primary">
                                <span class="fa fa-check"></span> Salvar
                            </button>
                        </div>


                    </div>
                </fieldset>
            </form>
        <?php endif; ?>
    </div>
</div>