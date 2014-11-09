<?php
$ocorrencia = $data['perfil'];
$ocorrencia_form = new Ocorrencia();
$cadastrado = $ocorrencia_form->cadastra($ocorrencia); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];

$token = Token::generate();
?>
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
            <?php if ($id_check): ?>
                <span class="btn-panel pull-right">
                <a href="Ocorrencia/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top"
                   title="Ver Perfil!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="Ocorrencia/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
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
    <li class="active"><a href="#principal" data-toggle="tab">Cadastro</a></li>
    <?php if ($id_check): ?>
        <li><a href="#pessoas" data-toggle="tab">Pessoas Envolvidas</a></li>
    <?php endif; ?>
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

                        <p>Clique em avaçar para adicionar pessoas relacionadas à ocorrência?</p>

                        <a href="Ocorrencia/" class="btn btn-info" role="button">
                            <i class="fa fa-arrow-circle-o-left"></i> Voltar
                        </a>

                        <a href="Ocorrencia/formocorrencia/" class="btn btn-success" role="button">
                            <i class="fa fa-arrow-circle-o-up"></i> Novo
                        </a>
                        <a href="Ocorrencia/formocorrencia/<?php echo $cadastrado->getCdOcorrencia(); ?>"
                           class="btn btn-primary" role="button">
                            <i class="fa fa-arrow-circle-o-right"></i> Avançar
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
                                       value="<?php echo $ocorrencia->getDescAssunto() == '' ? Input::get('assunto') : $ocorrencia->getDescAssunto(); ?>"
                                       placeholder="Assunto">
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-sm-12">
                                <label for="descricao_ocorr" class="control-label">Descrição</label>

                                <textarea id="descricao_ocorr" class="form-control" name="descricao"
                                          placeholder="Ocorrência"
                                          rows="5"><?php echo $ocorrencia->getDescOcorrencia() == '' ? Input::get('descricao') : $ocorrencia->getDescOcorrencia(); ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="desc_conclusao_ocorr" class="control-label">Conclusão</label>

                                <textarea id="desc_conclusao_ocorr" class="form-control" name="desc_conclusao"
                                          placeholder="Como a ocorrência foi concluída"
                                          rows="5"><?php echo $ocorrencia->getDescConclusao() == '' ? Input::get('desc_conclusao') : $ocorrencia->getDescConclusao(); ?></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- Lado Direito -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="informante" class="control-label">Informante</label>

                                <select class="form-control" id="informante" name="informante">
                                    <option value="">--</option>
                                    <?php
                                    $ocorrencia->setCdPfInformante($ocorrencia->getCdPfInformante() == '' ? Input::get('informante') : $ocorrencia->getCdPfInformante());
                                    foreach ($data['informante'] as $informante) {
                                        if ($informante->getCdPessoaFisica() == $ocorrencia->getCdPfInformante()) {
                                            echo '<option value="' . $informante->getCdPessoaFisica() . '" selected>' . $informante->getNmPessoaFisica() . '</option>';
                                        } else {
                                            echo '<option value="' . $informante->getCdPessoaFisica() . ' ">' . $informante->getNmPessoaFisica() . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="setor" class="control-label">Setor</label>

                                <select class="form-control" id="setor" name="setor">
                                    <option value="">--</option>
                                    <?php
                                    $ocorrencia->setCdSetor($ocorrencia->getCdSetor() == '' ? Input::get('setor') : $ocorrencia->getCdSetor());
                                    foreach ($data['setor'] as $setor) {
                                        if ($setor->getCdSetor() == $ocorrencia->getCdSetor()) {
                                            echo '<option value="' . $setor->getCdSetor() . '" selected>' . $setor->getNmSetor() . '</option>';
                                        } else {
                                            echo '<option value="' . $setor->getCdSetor() . ' ">' . $setor->getNmSetor() . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="estagio" class="control-label">Estágio</label>

                                <select class="form-control" id="estagio" name="estagio">
                                    <option value="">--</option>
                                    <?php
                                    $ocorrencia->setCdVlCatgEstagio($ocorrencia->getCdVlCatgEstagio() == '' ? Input::get('estagio') : $ocorrencia->getCdVlCatgEstagio());
                                    foreach ($data['estagio'] as $estagio) {
                                        if ($estagio->getCdVlCategoria() == $ocorrencia->getCdVlCatgEstagio()) {
                                            echo '<option value="' . $estagio->getCdVlCategoria() . '" selected>' . $estagio->getDescVlCatg() . '</option>';
                                        } else {
                                            echo '<option value="' . $estagio->getCdVlCategoria() . ' ">' . $estagio->getDescVlCatg() . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="tipo" class="control-label">Tipo</label>

                                <select class="form-control" id="tipo" name="tipo">
                                    <option value="">--</option>
                                    <?php
                                    $ocorrencia->setCdVlCatgTipo($ocorrencia->getCdVlCatgTipo() == '' ? Input::get('tipo') : $ocorrencia->getCdVlCatgTipo());
                                    foreach ($data['tipo'] as $tipo) {
                                        if ($tipo->getCdVlCategoria() == $ocorrencia->getCdVlCatgTipo()) {
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
                                <label for="dt_ocorrencia" class="control-label">Início</label>


                                <input type="text" class="form-control data-input"
                                       value="<?php echo $ocorrencia->getDtOcorrencia() == '' ? Input::get('dt_ocorrencia') : $ocorrencia->getDtOcorrencia(); ?>"
                                       id="dt_ocorrencia"
                                       name="dt_ocorrencia" placeholder="___/___/____">
                            </div>


                            <div class="col-sm-6">
                                <label for="dt_fim" class="control-label">Fim</label>


                                <input type="text" class="form-control data-input"
                                       value="<?php echo $ocorrencia->getDtFim() == '' ? Input::get('dt_fim') : $ocorrencia->getDtFim(); ?>"
                                       id="dt_fim"
                                       name="dt_fim" placeholder="___/___/____">

                            </div>
                        </div>

                        <input type="hidden" name="cd_ocorrencia" value="<?php echo $data['id']; ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">

                        <div class="">
                            <a href="Ocorrencia<?php echo $data['id'] ? '/visualizar/' . $data['id'] : ''; ?>"
                               id="cancel"
                               class="btn btn-default">
                                <span class="fa fa-undo"></span> Cancelar</a>
                            <a href="Ocorrencia/formOcorrencia" id="novo" class="btn btn-success">
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
<?php if ($id_check): ?>
    <div class="tab-pane fade" id="pessoas">
        <div class="row">
            <div class="col-md-6">

                <form class="dropdown" id="form-ocorrencia-pessoa">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ocorr_pessoa"
                               name="ocorr_pessoa" placeholder="Buscar Pessoa" autocomplete="off"
                               data-toggle="busca-pessoa-ocorr">
                        <input type="hidden" name="cd_ocorrencia" value="<?php echo $data['id']; ?>">

                        <div id="busca-ocorr-pessoa-resultado" class="dropdown-busca list-group"
                             aria-labelledby="busca-pessoa-ocorr"></div>
                    </div>
                </form>

                <div id="msg-ja-existe"></div>

            </div>

            <div class="col-md-6">
                <div class="legend">Envolvidos</div>

                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table" id="ocorr-envolvidos">
                            <tbody>
                            <?php
                            foreach ($data['pessoas'] as $pessoa) {
                                echo "
                                    <tr data-tr-registro-op=\"{$pessoa['id']}\">
                                        <td>
                                            <img class=\"img-circle\" src=\"{$pessoa['foto']}\">
                                        </td>
                                        <td>
                                            <h6><a href=\"PessoaFisica/visualizar/{$pessoa['id']}\">{$pessoa['nome']}</a></h6>
                                        </td>
                                        <td>
                                            <a href=\"#\" class=\"btn btn-danger btn-xs btn-circle remove-ocorr-pessoa\" data-id-ocorrencia=\"{$data['id']}\" data-id-pessoa=\"{$pessoa['id']}\" data-toggle=\"modal\" data-target=\"#apagaOPModal\"><i class=\"fa fa-minus\"></i></i></a>
                                        </td>
                                        </tr>
                                    ";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
<?php endif; ?>
</div>
</div>
</div>
</div>
<!-- Modal Apagar Ocorrência Pessoa Física -->
<div class="modal fade" id="apagaOPModal" tabindex="-1" role="dialog" aria-labelledby="apagaOPLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_apaga_op">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>

                    <span class="modal-title" id="deletaOPModalLabel"></span>

                </div>
                <div class="modal-body">

                    <div class="col-sm-12 center">

                        <h5 id="del_op_confirma"></h5>

                        <p></p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger col-xs-offset-2" name="deletar-op" value="Deletar"/>
                </div>

                <input type="hidden" name="cd_pessoa_fisica" value="">
                <input type="hidden" name="cd_ocorrencia" value="<?php echo $data['id']; ?>">
            </form>
        </div>
    </div>
</div>
<div id="responseAjaxError"></div>