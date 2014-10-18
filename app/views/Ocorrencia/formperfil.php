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
$ocorrencia = $data['ocorrencia'];
$ocorrencia_form = new Ocorrencia();
$ocorrencia_form->cadastra($perfil); //Não cadastra na entra pois ainda não tem Token

if (Session::exists('sucesso_salvar_oc')) {
    Session::flash('sucesso_salvar_oc');
}

?>

<form id="ocorrenciaform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<fieldset>
<legend>Cadastro</legend>



<div class="form-group">
    <div class="col-sm-12">
        <label for="informante" class="control-label">Executor</label>

        <select class="form-control" id="informante" name="informante">
            <option value="">--</option>
            <?php
            $ocorrencia->setCdPfInformante($ocorrencia->getCdPfInformante() == '' ? Input::get('executor') : $ocorrencia->getCdPfInformante());
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
</div>

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
            <label for="descricao" class="control-label">Descrição</label>

            <textarea id="descricao" class="form-control" name="descricao"
                      placeholder="Ocorrência"
                      rows="5"><?php echo $ocorrencia->getDescOcorrencia() == '' ? Input::get('descricao') : $ocorrencia->getDescOcorrencia(); ?></textarea>
        </div>
    </div>



    <div class="form-group">

        <div class="col-sm-4 inputGroupContainer" id="dt_ocorrencia_picker">
            <label for="dt_ocorrencia" class="control-label">Início</label>


            <input type="text" class="form-control"
                   value="<?php echo $ocorrencia->getDtOcorrencia() == '' ? Input::get('dt_ocorrencia') : $ocorrencia->getDtOcorrencia(); ?>"
                   id="dt_ocorrencia"
                   name="dt_ocorrencia" placeholder="___/___/____">
        </div>
        <div class="col-sm-4 inputGroupContainer" id="dt_fim_picker">
            <label for="dt_fim" class="control-label">Fim</label>


            <input type="text" class="form-control"
                   value="<?php echo $ocorrencia->getDtFim() == '' ? Input::get('dt_fim') : $ocorrencia->getDtFim(); ?>"
                   id="dt_fim"
                   name="dt_fim" placeholder="___/___/____">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">
            <label for="estagio" class="control-label">Estágio</label>

            <select class="form-control" id="estagio" name="estagio">
                <option value="">--</option>
                <?php
                $ocorrencia->setCdVlCatgEstagio($ocorrencia->getCdVlCatgEstagio() == '' ? Input::get('estagio') : $ocorrencia->getCdVlCatgEstagio());
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

        <div class="col-sm-12">
            <label for="desc_conclusao" class="control-label">Conclusão</label>

            <textarea id="desc_conclusao" class="form-control" name="desc_conclusao"
                      placeholder="Como a OS foi concluída"
                      rows="5"><?php echo $ocorrencia->getDescConclusao() == '' ? Input::get('desc_conclusao') : $ocorrencia->getDescConclusao(); ?></textarea>
        </div>
    </div>







<input type="hidden" name="cd_pessoa_fisica" value="<?php echo $data['id']; ?>">
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

<div class="form-group ">
    <div class="col-sm-12">
        <a href="PessoaFisica/visualizar/<?php echo $data['id']; ?>" id="limpar" class="btn btn-default"><span
                class="fa fa-undo"></span> Cancelar</a>
        <button type="reset" name="cancelar" class="btn btn-info"><span class="fa fa-recycle"></span> Limpar
        </button>
        <a href="PessoaFisica/formperfil" id="novo" class="btn btn-success"><span class="fa fa-file"></span>
            Novo</a>
        <button type="submit" name="cadastrar" class="btn btn-primary"><span class="fa fa-check"></span>
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