<?php
$perfil = $data['perfil'];
$perfil_form = new OrdemServico();
$cadastrado = $perfil_form->cadastra($perfil); // Não cadastra na entrada pois ainda nao tem token

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
                <a href="OrdemServico/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top"
                   title="Ver Perfil!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="OrdemServico/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
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
    <form id="ordemservicoform" class="form-horizontal" method="post" action=""
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
                <label for="descricao_os" class="control-label">Descrição</label>

                <textarea id="descricao" class="form-control" name="descricao"
                          placeholder="Ocorrência"
                          rows="5"><?php echo $perfil->getDescOrdemServico() == '' ? Input::get('descricao') : $perfil->getDescOrdemServico(); ?></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-12">
                <label for="desc_conclusao_os" class="control-label">Conclusão</label>

                <textarea id="desc_conclusao" class="form-control" name="desc_conclusao"
                          placeholder="Como a OS foi concluída"
                          rows="5"><?php echo $perfil->getDescConclusao() == '' ? Input::get('desc_conclusao') : $perfil->getDescConclusao(); ?></textarea>
            </div>
        </div>

    </div>

    <!-- Lado Direito -->

        <?php
        if ($id_check) {
            echo "
    <div id=\"pcard-executor\">
        <div class=\"col-md-3\">
            <div class=\"panel profile-card pcard-sm\">
                <div class=\"panel-body\">
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$data['dados']['executor_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\">";
                        if ($data['dados']['cd_pf_executor']){
                            echo "<a href=\"PessoaFisica/visualizar/{$data['dados']['cd_pf_executor']}\">{$data['dados']['executor']}</a>";
                        } else {
                            echo $data['dados']['executor'];
                        }

                echo "<div class=\"pcard-info\">Executor</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id=\"pcard-solicitante\">
        <div class=\"col-md-3\">
            <div class=\"panel profile-card pcard-sm\">
                <div class=\"panel-body\">
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$data['dados']['solicitante_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\">
                        <a href=\"PessoaFisica/visualizar/{$data['dados']['cd_pf_solicitante']}\">{$data['dados']['solicitante']}</a>
                        <div class=\"pcard-info\">Solicitante</div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
        } else {
            echo "<div id=\"pcard-executor\"></div>
                  <div id=\"pcard-solicitante\"></div>";
        }?>

    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-6">
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
                <label for="tipo" class="control-label">Tipo</label>

                <select class="form-control" id="tipo" name="tipo">
                    <option value="">--</option>
                    <?php
                    $perfil->setCdVlCatgTipo($perfil->getCdVlCatgTipo() == '' ? Input::get('tipo') : $perfil->getCdVlCatgTipo());
                    foreach ($data['tipo'] as $tipo) {
                        if ($tipo->getCdVlCategoria() == $perfil->getCdVlCatgTipo()) {
                            echo '<option value="' . $tipo->getCdVlCategoria() . '" selected>' . $tipo->getDescVlCatg() . '</option>';
                        } else {
                            echo '<option value="' . $tipo->getCdVlCategoria() . ' ">' . $tipo->getDescVlCatg() . '</option>';
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


            <div class="col-sm-6 field_hidden">
                <label for="dt_fim" class="control-label">Fim</label>


                <input type="text" class="form-control data-input"
                       value="<?php echo $perfil->getDtFim() == '' ? Input::get('dt_fim') : $perfil->getDtFim(); ?>"
                       id="dt_fim"
                       name="dt_fim" placeholder="___/___/____">
            </div>
        </div>
        <div class="row form-group field_hidden">
            <div class="col-md-12">
                <div class="legend">Avaliação</div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Atendimento</label><br>

                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default
                            <?php echo (($perfil->getCdVlCatgAvalAtendimento()) == 154 || Input::get('aval_atend') == 154) ? 'active' : ''; ?>"
                           id="aval_quali_bom" data-toggle="tooltip" data-placement="top" title="Bom">
                        <input type="radio" name="aval_atend" value="154"
                            <?php echo (($perfil->getCdVlCatgAvalAtendimento()) == 154 || Input::get('aval_atend') == 154) ? 'checked' : ''; ?>>
                        <i class="fa fa-smile-o fa-2x"></i>
                    </label>
                    <label class="btn btn-default
                            <?php echo (($perfil->getCdVlCatgAvalAtendimento()) == 155 || Input::get('aval_atend') == 155) ? 'active' : ''; ?>"
                           id="aval_quali_regular" data-toggle="tooltip" data-placement="top" title="Regular">
                        <input type="radio" name="aval_atend" value="155"
                            <?php echo (($perfil->getCdVlCatgAvalAtendimento()) == 155 || Input::get('aval_atend') == 155) ? 'checked' : ''; ?>>
                        <i class="fa fa-meh-o fa-2x"></i>
                    </label>
                    <label
                        class="btn btn-default <?php echo (($perfil->getCdVlCatgAvalAtendimento()) == 156 || Input::get('aval_atend') == 156) ? 'active' : ''; ?>"
                        id="aval_quali_ruim" data-toggle="tooltip" data-placement="top" title="Ruim">
                        <input type="radio" name="aval_atend" value="156"
                            <?php echo (($perfil->getCdVlCatgAvalAtendimento()) == 156 || Input::get('aval_atend') == 156) ? 'checked' : ''; ?>>
                        <i class="fa fa-frown-o fa-2x"></i>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Qualidade</label><br>

                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default
                            <?php echo (($perfil->getCdVlCatgAvalQualidade()) == 154 || Input::get('aval_quali') == 154) ? 'active' : ''; ?>"
                           id="aval_quali_bom" data-toggle="tooltip" data-placement="top" title="Bom">
                        <input type="radio" name="aval_quali" value="154"
                            <?php echo (($perfil->getCdVlCatgAvalQualidade()) == 154 || Input::get('aval_quali') == 154) ? 'checked' : ''; ?>>
                        <i class="fa fa-smile-o fa-2x"></i>
                    </label>
                    <label class="btn btn-default
                            <?php echo (($perfil->getCdVlCatgAvalQualidade()) == 155 || Input::get('aval_quali') == 155) ? 'active' : ''; ?>"
                           id="aval_quali_regular" data-toggle="tooltip" data-placement="top" title="Regular">
                        <input type="radio" name="aval_quali" value="155"
                            <?php echo (($perfil->getCdVlCatgAvalQualidade()) == 155 || Input::get('aval_quali') == 155) ? 'checked' : ''; ?>>
                        <i class="fa fa-meh-o fa-2x"></i>
                    </label>
                    <label class="btn btn-default
                            <?php echo (($perfil->getCdVlCatgAvalQualidade()) == 156 || Input::get('aval_quali') == 156) ? 'active' : ''; ?>"
                           id="aval_quali_ruim" data-toggle="tooltip" data-placement="top" title="Ruim">
                        <input type="radio" name="aval_quali" value="156"
                            <?php echo (($perfil->getCdVlCatgAvalQualidade()) == 156 || Input::get('aval_quali') == 156) ? 'checked' : ''; ?>>
                        <i class="fa fa-frown-o fa-2x"></i>
                    </label>
                </div>
            </div>
        </div>

        <input type="hidden" name="ordemservico" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <br>

        <p>
            <a href="OrdemServico<?php echo $data['id'] ? '/visualizar/' . $data['id'] : ''; ?>" id="cancel"
               class="btn btn-default">
                <span class="fa fa-undo"></span> Cancelar</a>
            <a href="OrdemServico/formOrdemServico" id="novo" class="btn btn-success">
                <span class="fa fa-file"></span> Novo</a>
            <button type="submit" name="cadastrar" class="btn btn-primary">
                <span class="fa fa-check"></span> Salvar
            </button>
        </p>

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