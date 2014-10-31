<?php
$apartamento = $data['apartamento'];
$apartamento_form = new Apartamento();
$cadastrado = $apartamento_form->cadastra($apartamento); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];
$condominios = $data['condominios'];
$setor = $data['setor'];


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
                                    <div class="col-md-8">
                                        <h1 class="text-success"><span class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                                        <p>Deseja adicionar outro setor?
                                        </p>

                                        <a href="Apartamento/" class="btn btn-info" role="button">
                                            <i class="fa fa-arrow-circle-o-left"></i> Voltar
                                        </a>

                                        <a href="Apartamento/formapartamento/" class="btn btn-success" role="button">
                                            <i class="fa fa-arrow-circle-o-up"></i> Novo
                                        </a>

                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <form id="apartamentoform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="col-md-6">

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
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
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
                                    </div>

                                    <div class="col-sm-12">

                                        <input type="hidden" name="cd_apartamento" value="<?php echo $data['id']; ?>">
                                        <input type="hidden" name="token" value="<?php echo $token; ?>">

                                        <div class="form-group">
                                            <div class="col-sm-12 clearfix">
                                                <a href="apartamento/visualizar/<?php echo $data['id']; ?>" id="cancel" class="btn btn-default"><span
                                                        class="fa fa-undo"></span> Cancelar</a>
                                                <a href="Apartamento/formapartamento" id="novo" class="btn btn-success"><span class="fa fa-file"></span>
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