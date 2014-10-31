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
        </h3>
    </div>
</div>

<div class="row">

<div class="col-md-12">

<div>
<ul class="nav nav-tabs">
    <li class="active"><a href="#principal" data-toggle="tab">Dados Pessoais</a></li>
</ul>
<div id="TabAdicionais" class="tab-content">
<div class="tab-pane fade active in" id="principal">

<div class="row">
<?php if ($cadastrado): ?>

    <div class="jumbotron">
        <div class="container">
            <div class="col-md-8">
                <h1 class="text-success"><span class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                <p>Deseja adicionar mais ocorrencias ?</p>

                <a href="Ocorrencia/" class="btn btn-info" role="button">
                    <i class="fa fa-arrow-circle-o-left"></i> Voltar
                </a>

                <a href="Ocorrencia/formocorrencia/" class="btn btn-success" role="button">
                    <i class="fa fa-arrow-circle-o-up"></i> Novo
                </a>
            </div>
        </div>
    </div>
<?php else: ?>
    <form id="ocorrenciaform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <fieldset>
    <div class="col-md-6">

        <div class="form-group">
            <div class="col-sm-12 inputGroupContainer">
                <label for="assunto" class="control-label">Assunto</label>

                <input type="text" class="form-control" id="assunto" name="assunto"
                       value="<?php echo $ocorrencia->getDescAssunto() == '' ? Input::get('assunto') : $ocorrencia->getDescAssunto(); ?>"
                       placeholder="Assunto">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6 inputGroupContainer">
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


            <div class="col-sm-6 inputGroupContainer">
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
            <div class="col-sm-4 inputGroupContainer">
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
            <div class="col-sm-4 inputGroupContainer">
                <label for="dt_ocorrencia" class="control-label">Início</label>


                <input type="text" class="form-control data-input"
                       value="<?php echo $ocorrencia->getDtOcorrencia() == '' ? Input::get('dt_ocorrencia') : $ocorrencia->getDtOcorrencia(); ?>"
                       id="dt_ocorrencia"
                       name="dt_ocorrencia" placeholder="___/___/____">
            </div>



            <div class="col-sm-4 inputGroupContainer">
                <label for="dt_fim" class="control-label">Fim</label>


                <input type="text" class="form-control data-input"
                       value="<?php echo $ocorrencia->getDtFim() == '' ? Input::get('dt_fim') : $ocorrencia->getDtFim(); ?>"
                       id="dt_fim"
                       name="dt_fim" placeholder="___/___/____">

            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">

                <div class="col-sm-12 inputGroupContainer">
                    <label for="descricao" class="control-label">Descrição</label>

                    <textarea id="descricao" class="form-control" name="descricao"
                              placeholder="Ocorrência"
                              rows="5"><?php echo $ocorrencia->getDescOcorrencia() == '' ? Input::get('descricao') : $ocorrencia->getDescOcorrencia(); ?></textarea>
                </div>
            </div>

        </div>

            <div class="form-group">
                <div class="col-sm-12 selectContainer">
                    <label for="desc_conclusao" class="control-label">Conclusão</label>

                    <textarea id="desc_conclusao" class="form-control" name="desc_conclusao"
                          placeholder="Como a ocorrência foi concluída"
                          rows="5"><?php echo $ocorrencia->getDescConclusao() == '' ? Input::get('desc_conclusao') : $ocorrencia->getDescConclusao(); ?></textarea>
                </div>
            </div>

        <input type="hidden" name="cd_ocorrencia" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <div class="form-group">
            <div class="col-sm-12 clearfix">
                <a href="Ocorrencia/visualizar/<?php echo $data['id']; ?>" id="cancel" class="btn btn-default"><span
                        class="fa fa-undo"></span> Cancelar</a>
                <a href="Ocorrencia/formperfil" id="novo" class="btn btn-success"><span class="fa fa-file"></span>
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
