<?php
$perfil = $data['perfil'];
$perfil_form = new PessoaJuridica();
$cadastrado = $perfil_form->cadastra($perfil); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];
$operadoras = $data['operadora'];
$pj_telefones = $data['pj_telefone'];

$token = Token::generate();
?>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
            <?php if ($id_check): ?>
                <span class="btn-panel pull-right">
                <a href="PessoaJuridica/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top"
                   title="Ver Perfil!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="PessoaJuridica/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
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
    <li class="active"><a href="#principal" data-toggle="tab">Dados Cadastrais</a></li>
    <?php if ($id_check): ?>
        <li><a href="#telefones" data-toggle="tab">Telefones</a></li>
        <li><a href="#enderecos" data-toggle="tab">Endereços</a></li>
    <?php endif; ?>
</ul>
<div id="TabAdicionais" class="tab-content">
<div class="tab-pane fade active in" id="principal">

    <div class="row">
        <?php if ($cadastrado): ?>

            <div class="jumbotron">
                <div class="container">
                    <div class="col-md-4">

                        <?php

                        if (file_exists("img/uploads/tb_pessoa_juridica/{$cadastrado->getCdPessoaJuridica()}.jpg")) {
                            $cadastrado->setImPerfil("img/uploads/tb_pessoa_juridica/{$cadastrado->getCdPessoaJuridica()}.jpg");
                        } else {
                            $cadastrado->setImPerfil(ICON_USER);
                        }

                        ?>

                        <img class="img-circle profilefoto left" src="<?php
                        echo $cadastrado->getImPerfil();?>">
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-success"><span class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                        <p>Deseja adicionar mais informações ao perfil
                            <strong><?php echo $cadastrado->getNmFantasia(); ?></strong>?
                        </p>

                        <a href="PessoaJuridica/" class="btn btn-info" role="button">
                            <i class="fa fa-arrow-circle-o-left"></i> Voltar
                        </a>

                        <a href="PessoaJuridica/formpessoajuridica/" class="btn btn-success" role="button">
                            <i class="fa fa-arrow-circle-o-up"></i> Novo
                        </a>

                        <a href="PessoaJuridica/formpessoajuridica/<?php echo $cadastrado->getCdPessoaJuridica(); ?>"
                           class="btn btn-primary">
                            Avançar <i class="fa fa-arrow-circle-o-right"></i>
                        </a>

                    </div>
                </div>
            </div>
        <?php else: ?>
            <form id="pessoajuridicaform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <fieldset>

                    <div class="col-md-2">


                        <img class="img-circle img-responsive" src="<?php echo $perfil->getImPerfil(); ?>"><br>

                        <div class="form-group col-sm-10">
                            <div>
                                <label for="im_perfil" class="btn btn-default">Foto</label>

                                <input type="file" class="hidden" id="im_perfil" name="im_perfil">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-12 inputGroupContainer">
                                <label for="nm_fantasia" class="control-label">Nome Fantasia</label>


                                <input type="text" class="form-control" id="nm_fantasia" name="nm_fantasia"
                                       value="<?php echo $perfil->getNmFantasia() == '' ? Input::get('nm_fantasia') : $perfil->getNmfantasia(); ?>"
                                       placeholder="Nome Fantasia">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 inputGroupContainer">
                                <label for="desc_razao" class="control-label">Razão Social</label>

                                <input type="text" class="form-control" id="desc_razao" name="desc_razao"
                                       value="<?php echo $perfil->getDescRazao() == '' ? Input::get('desc_razao') : $perfil->getDescRazao(); ?>"
                                       placeholder="Razão Social">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 inputGroupContainer">
                                <label for="cnpj" class="control-label">Cnpj</label>

                                <input type="text" class="form-control" id="cnpj" name="cnpj"
                                       value="<?php echo $perfil->getCnpj() == '' ? Input::get('cnpj') : $perfil->getCnpj(); ?>"
                                       placeholder="00.000.000/0000-00"
                                       maxlength="18">
                            </div>
                            <div class="col-md-4 selectContainer">
                                <label for="cd_tipo_empresa" class="control-label">Tipo de empresa</label>

                                <select class="form-control" id="cd_tipo_empresa "name="cd_tipo_empresa">
                                    <option value="">--</option>
                                    <?php
                                     $perfil->setCdTipoEmpresa($perfil->getCdTipoEmpresa() == '' ? Input::get('cd_tipo_empresa') : $perfil->getCdTipoEmpresa());
                                    foreach($data['tipos_empresa'] as $tipo_empresa) {
                                        if ($tipo_empresa->getCdVlCategoria() == $perfil->getCdTipoEmpresa()) {
                                            echo "<option value=\"{$tipo_empresa->getCdVlCategoria()}\" selected>{$tipo_empresa->getDescVlCatg()}</option>";
                                        } else {
                                            echo "<option value=\"{$tipo_empresa->getCdVlCategoria()}\">{$tipo_empresa->getDescVlCatg()}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 selectContainer">
                                <label for="cd_ramo_atividade" class="control-label">Ramo de Atividade</label>

                                <select class="form-control" id="cd_ramo_atividade" name="cd_ramo_atividade">
                                    <option value="">--</option>
                                    <?php
                                    $perfil->setCdRamoAtividade($perfil->getCdRamoAtividade() == '' ? Input::get('cd_ramo_atividade') : $perfil->getCdRamoAtividade());
                                    foreach($data['ramos_atividade'] as $ramos_atividade) {
                                        if ($ramos_atividade->getCdVlCategoria() == $perfil->getCdRamoAtividade()) {
                                            echo "<option value=\"{$ramos_atividade->getCdVlCategoria()}\" selected>{$ramos_atividade->getDescVlCatg()}</option>";
                                        } else {
                                            echo "<option value=\"{$ramos_atividade->getCdVlCategoria()}\">{$ramos_atividade->getDescVlCatg()}</option>";
                                        }
                                    }
                                    ?>
                                    <option value="new_ra">--> Adicionar um Ramo de Atividade</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="email" class="control-label">Email</label>


                                <input type="text" class="form-control" id="email" name="email"
                                       value="<?php echo $perfil->getEmail() == '' ? Input::get('email') : $perfil->getEmail(); ?>"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 clearfix">
                                <input type="hidden" name="cd_pessoa_juridica" value="<?php echo $data['id']; ?>">
                                <input type="hidden" name="token" value="<?php echo $token; ?>">

                                <a href="PessoaJuridica<?php echo $data['id'] ? '/visualizar/' . $data['id'] : ''; ?>"
                                   id="cancel" class="btn btn-default"><span
                                        class="fa fa-undo"></span> Cancelar</a>
                                <a href="PessoaJuridica/formpessoajuridica" id="novo" class="btn btn-success"><span
                                        class="fa fa-file"></span>
                                    Novo</a>
                                <button type="submit" name="cadastrar" class="btn btn-primary"><span
                                        class="fa fa-check"></span>
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="panel panel-warning">

                            <div class="panel-heading">
                                <h5 class="panel-title"><i class="fa fa-arrow-right"></i> Algumas instruções</h5>
                            </div>

                            <div class="panel-body">
                                Algumas instruções e recomendações para o correto preenchimento do formulário
                            </div>

                            <div class="panel-footer">

                            </div>
                        </div>

                    </div>
                </fieldset>
            </form>
        <?php endif; ?>
    </div>

</div>
<?php if ($id_check): ?>

    <?php

    $telefones = $data['telefones'];
    $enderecos = $data['enderecos'];
    $estados = $data['estados'];
    $catg_enderecos = $data['catg_enderecos'];;?>

    <div class="tab-pane fade" id="telefones">

        <div class="row">
            <!-- Formulário de Telefones -->
            <div class="col-md-6">
                <form class="form-horizontal" id="form_pj_telefones">
                    <fieldset class="well">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="celular" class="control-label">Telefone</label>

                                <div>
                                    <input name="fone" class="form-control fones" type="text" id="celular">
                                </div>
                            </div>

                            <div class="form-group col-md-6 selectContainer">
                                <label for="operadora" class="control-label">Operadora</label>

                                <div>
                                    <select class="form-control" name="operadora" id="operadora">
                                        <option value="">--</option>
                                        <?php
                                        foreach ($operadoras as $operadora) {
                                            echo '<option value="' . $operadora->getCdVlCategoria() . '">' . $operadora->getDescVlCatg() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="observacao" class="control-label">Observação</label>

                                <div>
                                    <input name="observacao" class="form-control" type="text" id="observacao">
                                </div>
                            </div>

                            <div class="form-group col-md-6 selectContainer">
                                <label for="categoria" class="control-label">Categoria</label>

                                <div>
                                    <select class="form-control" name="categoria" id="categoria">
                                        <option value="">--</option>
                                        <?php
                                        foreach ($pj_telefones as $tel) {
                                            echo '<option value="' . $tel->getCdVlCategoria() . '">' . $tel->getDescVlCatg() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p class="col-md-12">
                            <input type="reset" name="reset" class="btn btn-success" id="reset" value="Limpar">
                            <input type="submit" name="cadastrar" class="btn btn-primary" id="cadastrar"
                                   value="Cadastrar">
                            <input type="hidden" name="cd_pessoa_juridica"
                                   value="<?php echo $perfil->getCdPessoaJuridica(); ?>">
                            <input type="hidden" name="token"
                                   value="<?php echo $token; ?>">
                        </p>
                    </fieldset>
                </form>
            </div>

            <!-- Tabela de telefones -->
            <div class="col-md-6">
                <table id="tb_pj_telefones" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Telefone</th>
                        <th>Operadora</th>
                        <th>Categoria</th>
                        <th>Observação</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($telefones as $telefone) {
                        echo "
                     <tr data-pj-tel=\"{$telefone->getCdPjFone()}\">
                        <td>{$telefone->getFone()}</td>
                        <td>
                        ";
                        foreach ($operadoras as $catg_tel) {
                            if ($catg_tel->getCdVlCategoria() == $telefone->getCdVlCatgOperadora()) {
                                echo $catg_tel->getDescVlCatg();
                            }
                        }
                        echo "
                        </td>
                        <td>
                        ";
                        foreach ($pj_telefones as $pj_tel) {
                            if ($pj_tel->getCdVlCategoria() == $telefone->getCdVlCatgFonePj()) {
                                echo $pj_tel->getDescVlCatg();
                            }
                        }
                        echo "
                        </td>
                        <td>{$telefone->getObservacao()}</td>
                        <td>";
                        echo "<a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_pj_tel\" data-update-pjtel-id=\"{$telefone->getCdPjFone()}\" data-toggle=\"modal\" data-target=\"#atualizaPjTelModal\"><i class=\"fa fa-edit\"></i></a>";
                        echo "&nbsp;<a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_pj_tel\" data-del-pjtel-id=\"{$telefone->getCdPjFone()}\" data-toggle=\"modal\" data-target=\"#apagaPjTelModal\"><i class=\"fa fa-trash-o\"></i></a>";
                        echo "</td>
                    </tr>";
                    };?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="tab-pane fade" id="enderecos">
        <!-- Formulário de Endereços -->
        <div class="row">
            <div class="col-sm-12">

                <form class="form-horizontal" id="form_pj_enderecos">
                    <legend id="legend_form_enderecos">Cadastrar Endereço</legend>
                    <fieldset class="well">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="col-sm-5">
                                    <label for="rua" class="control-label">Rua / Av / Alameda / Etc</label>

                                    <input name="rua" class="form-control" type="text" id="rua">
                                </div>
                                <div class="col-sm-1">
                                    <label for="numero" class="control-label">Nº</label>

                                    <input name="numero" class="form-control" type="text" id="numero">
                                </div>
                                <div class="col-sm-3">
                                    <label for="bairro" class="control-label">Bairro</label>

                                    <input name="bairro" class="form-control" type="text" id="bairro">
                                </div>
                                <div class="col-sm-3">
                                    <label for="cidade" class="control-label">Cidade</label>

                                    <input name="cidade" class="form-control" type="text" id="cidade">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-sm-12">
                                <div class="col-sm-3">
                                    <label for="cep" class="control-label">CEP</label>

                                    <input name="cep" class="form-control" type="text" id="cep">
                                </div>

                                <div class="col-sm-3 selectContainer">
                                    <label for="estado" class="control-label">Estado</label>

                                    <select class="form-control" name="estado" id="end_estado">
                                        <option value="">--</option>
                                        <?php
                                        foreach ($estados as $estado) {
                                            echo '<option value="' . $estado->getCdVlCategoria() . '">' . $estado->getDescVlCatg() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-3 selectContainer">
                                    <label for="categoria" class="control-label">Tipo</label>

                                    <select class="form-control" name="categoria" id="end_categoria">
                                        <option value="">--</option>
                                        <?php
                                        foreach ($catg_enderecos as $catg) {
                                            echo '<option value="' . $catg->getCdVlCategoria() . '">' . $catg->getDescVlCatg() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="observacao" class="control-label">Observação</label>

                                    <input name="observacao" class="form-control" type="text" id="observacao">
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <input type="reset" name="reset" class="btn btn-success" id="form_end_reset" value="Novo">
                            <input type="submit" name="cadastrar" class="btn btn-primary" id="cadastrar"
                                   value="Cadastrar">
                            <input type="hidden" name="cd_pessoa_juridica"
                                   value="<?php echo $perfil->getCdPessoaJuridica(); ?>">
                            <input type="hidden" name="id_endereco" id="id_endereco" value="">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
        <!-- Fim do Formulário de Endereços -->

        <!-- Tabela de Endereços -->
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-header">Endereços</h4>
                <table id="tb_pj_enderecos" class="table table-striped table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>CEP</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Observação</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($enderecos as $endereco) {
                        echo "
                    <tr data-pj-endereco=\"{$endereco->getNrSequencia()}\">
                        <td>{$endereco->getRua()}</td>
                        <td>{$endereco->getNumero()}</td>
                        <td>{$endereco->getBairro()}</td>
                        <td>{$endereco->getCidade()}</td>
                        <td>{$endereco->getCep()}</td>
                        <td>";
                        foreach ($estados as $end_estado) {
                            if ($end_estado->getCdVlCategoria() == $endereco->getCdVlCatgEstado()) {
                                echo $end_estado->getDescVlCatg();
                            }
                        }
                        echo "</td>";
                        echo "<td>";
                        foreach ($catg_enderecos as $catg_end) {
                            if ($catg_end->getCdVlCategoria() == $endereco->getCdVlCatgEnd()) {
                                echo $catg_end->getDescVlCatg();
                            }
                        }
                        echo "</td>";
                        echo "<td>{$endereco->getObservacao()}</td>";
                        echo "<td>";
                        echo "<a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_pj_end\" data-update-pjend-id=\"{$endereco->getNrSequencia()}\" data-toggle=\"modal\" data-target=\"#atualizaPjEndModal\"><i class=\"fa fa-edit\"></i></a>";
                        echo " <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_pj_end\" data-del-pjend-id=\"{$endereco->getNrSequencia()}\" data-toggle=\"modal\" data-target=\"#apagaPjEndModal\"><i class=\"fa fa-trash-o\"></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fim da Tabela de Endereços -->
    </div>


<?php endif; ?>
</div>
</div>
</div>
</div>

<!-- Modal Atualizar PJ Telefone -->
<div class="modal fade" id="atualizaPjTelModal" tabindex="-1" role="dialog" aria-labelledby="pjTelModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_atualiza_pj_tel">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>
                    <h4 class="modal-title" id="atualizaModalLabel">Atualizar Telefone</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <fieldset class="well">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="a_celular" class="control-label">Telefone</label>

                                    <div>
                                        <input name="fone" class="form-control fones" type="text" id="a_celular">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 selectContainer">
                                    <label for="operadora" class="control-label">Operadora</label>

                                    <div>
                                        <select class="form-control" name="operadora" id="tel_operadora">
                                            <option value="">--</option>
                                            <?php
                                            foreach ($operadoras as $operadora) {
                                                echo '<option value="' . $operadora->getCdVlCategoria() . '">' . $operadora->getDescVlCatg() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="observacao" class="control-label">Observação</label>

                                    <div>
                                        <input name="observacao" class="form-control" type="text" id="observacao">
                                    </div>
                                </div>

                                <div class="form-group col-md-6 selectContainer">
                                    <label for="categoria" class="control-label">Categoria</label>

                                    <div>
                                        <select class="form-control" name="categoria" id="tel_categoria">
                                            <option value="">--</option>
                                            <?php
                                            foreach ($pj_telefones as $tel) {
                                                echo '<option value="' . $tel->getCdVlCategoria() . '"' .
                                                    ($tel->getCdVlCategoria() == 0 ? ' selected' : '')
                                                    . '>' . $tel->getDescVlCatg() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <p class="col-md-12">

                                <input type="hidden" name="cd_pessoa_juridica"
                                       value="<?php echo $perfil->getCdPessoaJuridica(); ?>">
                                <input type="hidden" name="token"
                                       value="<?php echo $token; ?>">
                            </p>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary col-xs-offset-2" name="enviar" value="Salvar"/>
                </div>

                <input type="hidden" name="cd_pj_fone" value="">
            </form>
        </div>
    </div>
</div>

<!-- Modal Apagar PJ Telefone-->
<div class="modal fade" id="apagaPjTelModal" tabindex="-1" role="dialog" aria-labelledby="apagaPjTelLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_apaga_pj_tel">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>

                    <span class="modal-title" id="deletaModalLabel"></span>

                </div>
                <div class="modal-body">

                    <div class="col-sm-12 center">

                        <h5 id="del_pj_tel_confirma"></h5>

                        <p></p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger col-xs-offset-2" name="deletar" value="Deletar"/>
                </div>

                <input type="hidden" name="cd_pj_fone" value="">
            </form>
        </div>
    </div>
</div>

<!-- Modal Apagar PF Endereco-->
<div class="modal fade" id="apagaPjEndModal" tabindex="-1" role="dialog" aria-labelledby="apagaPjEndLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_apaga_pj_end">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>

                    <span class="modal-title" id="deletaEndModalLabel"></span>

                </div>
                <div class="modal-body">

                    <div class="col-sm-12 center">

                        <h5 id="del_pj_end_confirma"></h5>

                        <p></p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger col-xs-offset-2" name="deletar" value="Deletar"/>
                </div>

                <input type="hidden" name="id_endereco" value="">
            </form>
        </div>
    </div>
</div>
<div id="responseAjaxError"></div>
</div>

<!-- Modal para cadastro rápido de Ramo de Atividade -->
<div class="modal fade" tabindex="-1" role="dialog" id="new_ramo_ativ" aria-labelledby="new_ramo_ativ"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title legend">Nova Ramo de Atividade</h4>
            </div>

            <form id="form_pj_new_ramo_ativ">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome_ramo_ativ" class="control-label">Nome do Ramo de Atividade:</label>
                        <input type="text" class="form-control" name="nome_sub_categoria" id="nome_ramo_ativ">
                        <!-- Categoria Curso -->
                        <input type="hidden" id="id_cat_ramo_ativ" name="select_cat" value="8">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="save_new_ramo_ativ" value="Salvar">
                </div>
            </form>

        </div>

    </div>
</div>