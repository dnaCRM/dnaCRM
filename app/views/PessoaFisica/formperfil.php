<?php
$perfil = $data['perfil'];
$perfil_form = new PessoaFisica();
$cadastrado = $perfil_form->cadastra($perfil); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];

$token = Token::generate();
?>

<div class="row">
    <div class="col-sm-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
            <?php if ($id_check): ?>
                <span class="btn-panel pull-right">
                <a href="PessoaFisica/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top" title="Ver Perfil!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="PessoaFisica/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
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
    <li class="active"><a href="#principal" data-toggle="tab">Dados Pessoais</a></li>
    <?php if ($id_check): ?>
        <li><a href="#telefones" data-toggle="tab">Telefones</a></li>
        <li><a href="#enderecos" data-toggle="tab">Endereços</a></li>
        <li><a href="#morador" data-toggle="tab">Morador</a></li>
        <li><a href="#relacionamentos" data-toggle="tab">Relacionamentos</a></li>
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

                if (file_exists("img/uploads/tb_pessoa_fisica/{$cadastrado->getCdPessoaFisica()}.jpg")) {
                    $cadastrado->setImPerfil("img/uploads/tb_pessoa_fisica/{$cadastrado->getCdPessoaFisica()}.jpg");
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
                    <strong><?php echo $cadastrado->getNmPessoaFisica(); ?></strong>?
                </p>

                <a href="PessoaFisica/" class="btn btn-info" role="button">
                    <i class="fa fa-arrow-circle-o-left"></i> Voltar
                </a>

                <a href="PessoaFisica/formperfil/" class="btn btn-success" role="button">
                    <i class="fa fa-arrow-circle-o-up"></i> Novo
                </a>

                <a href="PessoaFisica/formperfil/<?php echo $cadastrado->getCdPessoaFisica(); ?>"
                   class="btn btn-primary">
                    Avançar <i class="fa fa-arrow-circle-o-right"></i>
                </a>
            </div>
        </div>
    </div>
<?php else: ?>
    <form id="pessoafisicaform" class="form-horizontal" method="post" action="" enctype="multipart/form-data">
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
                <label for="nm_pessoa_fisica" class="control-label">Nome</label>


                <input type="text" class="form-control" id="nm_pessoa_fisica" name="nm_pessoa_fisica"
                       value="<?php echo $perfil->getNmPessoaFisica() == '' ? Input::get('nm_pessoa_fisica') : $perfil->getNmPessoaFisica(); ?>"
                       placeholder="Nome">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12 inputGroupContainer">
                <label for="email" class="control-label">Email</label>


                <input type="text" class="form-control" id="email" name="email"
                       value="<?php echo $perfil->getEmail() == '' ? Input::get('email') : $perfil->getEmail(); ?>"
                       placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4 inputGroupContainer">
                <label for="cpf" class="control-label">CPF</label>

                <input type="text" class="form-control" id="cpf" name="cpf"
                       value="<?php echo $perfil->getCpf() == '' ? Input::get('cpf') : $perfil->getCpf(); ?>"
                       placeholder="000.000.000-00"
                       maxlength="14">
            </div>
            <div class="col-sm-4 inputGroupContainer">
                <label for="rg" class="control-label">RG</label>

                <input type="text" class="form-control" id="rg" name="rg"
                       value="<?php echo $perfil->getRg() == '' ? Input::get('rg') : $perfil->getRg(); ?>"
                       placeholder="00000000"
                       maxlength="12">
            </div>
            <div class="col-sm-4 selectContainer">
                <label for="org_rg" class="control-label">UF</label>

                <select class="form-control" id="org_rg" name="org_rg">
                    <option value="">--</option>
                    <?php
                    $perfil->setCdVlCatgOrgRg($perfil->getCdVlCatgOrgRg() == '' ? Input::get('org_rg') : $perfil->getCdVlCatgOrgRg());
                    foreach ($data['org_rg'] as $org) {
                        if ($org->getCdVlCategoria() == $perfil->getCdVlCatgOrgRg()) {
                            echo '<option value="' . $org->getCdVlCategoria() . '" selected>' . $org->getDescVlCatg() . '</option>';
                        } else {
                            echo '<option value="' . $org->getCdVlCategoria() . ' ">' . $org->getDescVlCatg() . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">

            <div class="form-group col-sm-6">
                <label class="control-label col-sm-1">Sexo</label>

                <div class="col-sm-12">
                    <div class="btn-group" data-toggle="buttons">
                        <label
                            class="btn btn-default<?php echo (($perfil->getIeSexo()) == 'm' || Input::get('ie_sexo') == 'm') ? ' active' : ''; ?>">
                            <input type="radio" name="ie_sexo"
                                   value="m" <?php echo (($perfil->getIeSexo()) == 'm' || Input::get('ie_sexo') == 'm') ? 'checked' : ''; ?>/>
                            Masculino
                        </label>
                        <label
                            class="btn btn-default<?php echo (($perfil->getIeSexo()) == 'f' || Input::get('ie_sexo') == 'f') ? ' active' : ''; ?>">
                            <input type="radio" name="ie_sexo"
                                   value="f" <?php echo (($perfil->getIeSexo()) == 'f' || Input::get('ie_sexo') == 'f') ? 'checked' : ''; ?>/>
                            Feminino
                        </label>
                    </div>
                </div>

            </div>

            <div class="form-group col-sm-6">

                <div class="col-sm-12 inputGroupContainer" id="datetimepicker">
                    <label for="dt_nascimento" class="control-label">Nascimento</label>


                    <input type="text" class="form-control data-input"
                           value="<?php echo $perfil->getDtNascimento() == '' ? Input::get('dt_nascimento') : $perfil->getDtNascimento(); ?>"
                           id="dt_nascimento"
                           name="dt_nascimento" placeholder="___/___/____">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-sm-12 selectContainer">
                <label for="cd_pessoa_juridica" class="control-label">Empresa</label>

                <select class="form-control" id="cd_cgc" name="cd_pessoa_juridica">
                    <option value="">-- Selecione uma empresa</option>
                    <?php //echo escape(Input::get('cd_cgc'));
                    $perfil->setCdPessoaJuridica($perfil->getCdPessoaJuridica() == '' ? Input::get('cd_cgc') : $perfil->getCdPessoaJuridica());
                    foreach ($data['pessoa_juridica'] as $empresa) {

                        if ($empresa->getCdPessoaJuridica() == $perfil->getCdPessoaJuridica()) {
                            echo '<option value="' . $empresa->getCdPessoaJuridica() . '" selected>' . $empresa->getNmFantasia() . '</option>';
                        } else {
                            echo '<option value="' . $empresa->getCdPessoaJuridica() . ' ">' . $empresa->getNmFantasia() . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12 selectContainer">
                <label for="cd_profissao" class="control-label">Profissão</label>

                <select class="form-control" id="cd_profissao" name="cd_profissao">
                    <option value="">-- Selecione uma profissão</option>
                    <?php //echo escape(Input::get('cd_profissao'));
                    $perfil->setCdProfissao($perfil->getCdProfissao() == '' ? Input::get('cd_profissao') : $perfil->getCdProfissao());
                    foreach ($data['profissoes'] as $profissao) {
                        if ($profissao->getCdProfissao() == $perfil->getCdProfissao()) {
                            echo '<option value="' . $profissao->getCdProfissao() . '" selected>' . $profissao->getNmProfissao() . '</option>';
                        } else {
                            echo '<option value="' . $profissao->getCdProfissao() . ' ">' . $profissao->getNmProfissao() . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4">
                <label class="control-label">Estuda</label>

                <div>
                    <div class="btn-group" data-toggle="buttons">
                        <label
                            class="btn btn-default <?php echo (($perfil->getIeEstuda()) == 's' || Input::get('ie_estuda') == 's') ? ' active' : ''; ?>">
                            <input type="radio" name="ie_estuda"
                                   value="s" <?php echo (($perfil->getIeEstuda()) == 's' || Input::get('ie_estuda') == 's') ? 'checked' : ''; ?>/>
                            S
                        </label>
                        <label
                            class="btn btn-default <?php echo (($perfil->getIeEstuda()) == 'n' || Input::get('ie_estuda') == 'n') ? ' active' : ''; ?>">
                            <input type="radio" name="ie_estuda"
                                   value="n" <?php echo (($perfil->getIeEstuda()) == 'n' || Input::get('ie_estuda') == 'n') ? 'checked' : ''; ?>/>
                            N
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-4" id="dt_inicio_curso_picker">
                <label for="dt_inicio_curso" class="control-label">Início do Curso</label>


                <input type="text" class="form-control data-input"
                       value="<?php echo $perfil->getDtInicioCurso() == '' ? Input::get('dt_inicio_curso') : $perfil->getDtInicioCurso(); ?>"
                       id="dt_inicio_curso"
                       name="dt_inicio_curso" placeholder="___/___/____">
            </div>
            <div class="col-sm-4" id="dt_fim_curso_picker">
                <label for="dt_fim_curso" class="control-label">Fim do Curso</label>


                <input type="text" class="form-control data-input"
                       value="<?php echo $perfil->getDtFimCurso() == '' ? Input::get('dt_fim_curso') : $perfil->getDtFimCurso(); ?>"
                       id="dt_fim_curso"
                       name="dt_fim_curso" placeholder="___/___/____">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12 selectContainer">
                <label for="cd_pessoa_juridica" class="control-label">Instituição de Ensino</label>

                <select class="form-control" id="cd_instituicao" name="cd_instituicao">
                    <option value="">-- Selecione uma Instituição de Ensino</option>
                    <?php //echo escape(Input::get('cd_cgc'));
                    $perfil->setCdInstituicao($perfil->getCdInstituicao() == '' ? Input::get('cd_instituicao') : $perfil->getCdInstituicao());
                    foreach ($data['inst_ensino'] as $inst_ensino) {

                        if ($inst_ensino->getCdInstituicao() == $perfil->getCdInstituicao()) {
                            echo '<option value="' . $inst_ensino->getCdInstituicao() . '" selected>' . $inst_ensino->getDsInstituicao() . '</option>';
                        } else {
                            echo '<option value="' . $inst_ensino->getCdInstituicao() . ' ">' . $inst_ensino->getDsInstituicao() . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12 selectContainer">
                <label for="org_rg" class="control-label">Grau de Ensino</label>

                <select class="form-control" id="cd_grau_ensino" name="cd_grau_ensino">
                    <option value="">--</option>
                    <?php
                    $perfil->setCdVlCatgGrauEnsino($perfil->getCdVlCatgGrauEnsino() == '' ? Input::get('cd_grau_ensino') : $perfil->getCdVlCatgGrauEnsino());
                    foreach ($data['grau_ensino'] as $grau_ensino) {
                        if ($grau_ensino->getCdVlCategoria() == $perfil->getCdVlCatgGrauEnsino()) {
                            echo '<option value="' . $grau_ensino->getCdVlCategoria() . '" selected>' . $grau_ensino->getDescVlCatg() . '</option>';
                        } else {
                            echo '<option value="' . $grau_ensino->getCdVlCategoria() . ' ">' . $grau_ensino->getDescVlCatg() . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <input type="hidden" name="cd_pessoa_fisica" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <div class="form-group">
            <div class="col-sm-12 clearfix">
                <a href="PessoaFisica" id="cancel"
                   class="btn btn-default"><span
                        class="fa fa-undo"></span> Cancelar</a>
                <a href="PessoaFisica/formperfil" id="novo" class="btn btn-success"><span class="fa fa-file"></span>
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
<?php if ($id_check): ?>

    <?php
    $condominios = $data['condominios'];
    $morador_endereco = $data['morador_endereco'];
    $operadoras = $data['operadora'];
    $pf_telefones = $data['pf_telefone'];
    $telefones = $data['telefones'];
    $enderecos = $data['enderecos'];
    $estados = $data['estados'];
    $catg_enderecos = $data['catg_enderecos'];

    ?>

    <div class="tab-pane fade" id="telefones">

        <div class="row">
            <!-- Formulário de Telefones -->
            <div class="col-md-6">
                <form class="form-horizontal" id="form_pf_telefones">
                    <legend id="legend_form_telefones">Cadastrar Telefone</legend>
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
                                        foreach ($pf_telefones as $tel) {
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
                            <input type="hidden" name="cd_pessoa_fisica"
                                   value="<?php echo $perfil->getCdPessoaFisica(); ?>">
                            <input type="hidden" name="token"
                                   value="<?php echo $token; ?>">
                        </p>
                    </fieldset>
                </form>
            </div>

            <!-- Tabela de telefones -->
            <div class="col-md-6">
                <table id="tb_pf_telefones" class="table table-striped table-hover">
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
                     <tr data-pf-tel=\"{$telefone['id_fone']}\">
                        <td>{$telefone['fone']}</td>
                        <td>{$telefone['operadora']}</td>
                        <td>{$telefone['categoria']}</td>
                        <td>{$telefone['observacao']}</td>";
                        echo "<td><a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_pf_tel\" data-update-pftel-id=\"{$telefone['id_fone']}\" data-toggle=\"modal\" data-target=\"#atualizaPfTelModal\"><i class=\"fa fa-edit\"></i></a>";
                        echo "&nbsp;<a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_pf_tel\" data-del-pftel-id=\"{$telefone['id_fone']}\" data-toggle=\"modal\" data-target=\"#apagaPfTelModal\"><i class=\"fa fa-trash-o\"></i></a>";
                        echo "</td>
                    </tr>";
                    };?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="morador">
        <div class="row">
            <div class="col-md-6">

                <form class="form-horizontal" id="form_end_morador">
                    <legend id="legend_form_end_morador">Dados do Morador</legend>
                    <fieldset class="well">
                        <div class="form-group">
                            <div class="col-sm-4 selectContainer">
                                <label for="m_end_codominio" class="control-label">Condomínio</label>

                                <select class="form-control" name="m_end_condominio" id="m_end_condominio">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($condominios as $condominio) {
                                        echo "<option value=\"{$condominio->getCdCondominio()}\">{$condominio->getNmCondominio()}</option>";
                                    };?>
                                </select>
                            </div>
                            <div class="col-sm-4 selectContainer">
                                <label for="m_end_setor" class="control-label">Setor</label>

                                <select class="form-control" name="m_end_setor" id="m_end_setor">
                                    <option value="">--</option>
                                </select>
                            </div>
                            <div class="col-sm-4 selectContainer">
                                <label for="m_end_apartamento" class="control-label">Apartamento</label>

                                <select class="form-control" name="m_end_apartamento" id="m_end_apartamento">
                                    <option value="">--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="m_end_dt_entrada" class="control-label">Data de Entrada</label>

                                <input type="text" class="form-control data-input" name="m_end_dt_entrada"
                                       id="m_end_dt_entrada"
                                       placeholder="___/___/______">
                            </div>
                            <div class="col-sm-6">
                                <label for="m_end_dt_saida" class="control-label">Data de Saída</label>

                                <input type="text" class="form-control data-input" name="m_end_dt_saida"
                                       id="m_end_dt_saida"
                                       placeholder="___/___/______">
                            </div>
                        </div>

                        <p class="col-md-12">
                            <input type="reset" name="reset" class="btn btn-success" id="form_m_end_reset"
                                   value="Limpar">
                            <input type="submit" name="cadastrar" class="btn btn-primary" id="cadastrar_m_end"
                                   value="Cadastrar">
                            <input type="hidden" name="cd_pessoa_fisica"
                                   value="<?php echo $perfil->getCdPessoaFisica(); ?>">
                            <input type="hidden" name="id_m_end" id="id_m_end" value="">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                        </p>
                    </fieldset>
                </form>

            </div>

            <div class="col-md-6">

                <table id="tb_m_enderecos" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Condomínio</th>
                        <th>Setor</th>
                        <th>Apartamento</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($morador_endereco as $mEnderecos) {
                        echo
                        "<tr data-m-end=\"{$mEnderecos['id_m_end']}\">
                             <td>{$mEnderecos['condominio']}</td>
                             <td>{$mEnderecos['setor']}</td>
                             <td>{$mEnderecos['apartamento']}</td>
                             <td>{$mEnderecos['m_end_dt_entrada']}</td>
                             <td>{$mEnderecos['m_end_dt_saida']}</td>
                             <td>";
                        echo "<a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_m_end\" data-update-mend-id=\"{$mEnderecos['id_m_end']}\"
                                    data-toggle=\"modal\" data-target=\"#atualizaMEndModal\"><i class=\"fa fa-edit\"></i></a>";
                        echo "&nbsp;<a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_m_end\" data-del-mend-id=\"{$mEnderecos['id_m_end']}\"
                                    data-toggle=\"modal\" data-target=\"#apagaMEndModal\"><i class=\"fa fa-trash-o\"></i></a>
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

    <div class="tab-pane fade" id="enderecos">
        <!-- Formulário de Endereços -->
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" id="form_pf_enderecos">
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
                            <input type="hidden" name="cd_pessoa_fisica"
                                   value="<?php echo $perfil->getCdPessoaFisica(); ?>">
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
                <table id="tb_pf_enderecos" class="table table-striped table-hover table-responsive">
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
                    <tr data-pf-endereco=\"{$endereco->getNrSequencia()}\">
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
                        echo "<a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_pf_end\" data-update-pfend-id=\"{$endereco->getNrSequencia()}\" data-toggle=\"modal\" data-target=\"#atualizaPfEndModal\"><i class=\"fa fa-edit\"></i></a>";
                        echo " <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_pf_end\" data-del-pfend-id=\"{$endereco->getNrSequencia()}\" data-toggle=\"modal\" data-target=\"#apagaPfEndModal\"><i class=\"fa fa-trash-o\"></i></a>";
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

    <div class="tab-pane fade" id="relacionamentos">
        <div class="row">
            <div class="col-md-8">
                <form id="form_pf_relacionamentos" class="form-horizontal">
                    <legend>Relacionamentos</legend>
                    <fieldset class="well">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="pessoa_1" class="control-label">Nome</label>


                                </div>
                                <div class="col-md-6">
                                    <label for="catg_relacionameto_1" class="control-label">Relacionamento</label>

                                    <select name="catg_relacionameto_1" class="form-control" id="catg_relacionameto_1">
                                        <option value="">Agregado</option>
                                        <option value="">Pai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="pessoa_2" class="control-label">Nome</label>

                                    <input type="text" id="pessoa_2" class="form-control" name="pessoa_2">
                                </div>
                                <div class="col-md-6">
                                    <label for="catg_relacionameto_2" class="control-label">Relacionamento</label>

                                    <select name="catg_relacionameto_2" class="form-control" id="catg_relacionameto_1">
                                        <option value="">--</option>
                                        <option value="">Pai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p>
                            <input type="reset" name="reset" class="btn btn-success" id="form_pf_r_reset" value="Novo">
                            <input type="submit" name="cadastrar" class="btn btn-primary"
                                   id="cadastrar_pf_relacionamento" value="Cadastrar">

                            <input type="hidden" name="cd_pessoa_fisica"
                                   value="<?php echo $perfil->getCdPessoaFisica(); ?>">
                            <input type="hidden" name="id_relacinamento" id="id_relacinamento" value="">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                        </p>
                    </fieldset>
                </form>
            </div>

            <div class="col-md-4">
                <div class="legend">Pesquisa</div>
                <div class="input-group">
                    <input type="text" id="pessoa_1" class="form-control" name="pessoa_1" placeholder="Nome"
                           autocomplete="off">
                    <span class="input-group-btn"><input type="submit" name="botao-pesquisar-pessoa"
                                                         class="btn btn-info"
                                                         id="botao-pesquisar-pessoa" value="ok"></span>
                </div>
                <div id="area-do-resultado-pf-form" class="center-block"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
</div>
</div>
</div>

<!-- Modal Atualizar PF Telefone -->
<div class="modal fade" id="atualizaPfTelModal" tabindex="-1" role="dialog" aria-labelledby="pfTelModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_atualiza_pf_tel">
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
                                            foreach ($pf_telefones as $tel) {
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

                                <input type="hidden" name="cd_pessoa_fisica"
                                       value="<?php echo $perfil->getCdPessoaFisica(); ?>">
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

                <input type="hidden" name="cd_pf_fone" value="">
            </form>
        </div>
    </div>
</div>

<!-- Modal Apagar PF Telefone-->
<div class="modal fade" id="apagaPfTelModal" tabindex="-1" role="dialog" aria-labelledby="apagaPfTelLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_apaga_pf_tel">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>

                    <span class="modal-title" id="deletaModalLabel"></span>

                </div>
                <div class="modal-body">

                    <div class="col-sm-12 center">

                        <h5 id="del_pf_tel_confirma"></h5>

                        <p></p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger col-xs-offset-2" name="deletar" value="Deletar"/>
                </div>

                <input type="hidden" name="cd_pf_fone" value="">
            </form>
        </div>
    </div>
</div>

<!-- Modal Apagar PF Endereco-->
<div class="modal fade" id="apagaPfEndModal" tabindex="-1" role="dialog" aria-labelledby="apagaPfEndLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_apaga_pf_end">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>

                    <span class="modal-title" id="deletaEndModalLabel"></span>

                </div>
                <div class="modal-body">

                    <div class="col-sm-12 center">

                        <h5 id="del_pf_end_confirma"></h5>

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

<!-- Modal Apagar Morador Endereco-->
<div class="modal fade" id="apagaMEndModal" tabindex="-1" role="dialog" aria-labelledby="apagaMEndLabel"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <form class="form-horizontal" id="form_apaga_m_end">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span
                            class="sr-only">Fechar</span></button>

                    <span class="modal-title" id="deletaMEndModalLabel"></span>

                </div>
                <div class="modal-body">

                    <div class="col-sm-12 center">

                        <h5 id="del_m_end_confirma"></h5>

                        <p></p>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger col-xs-offset-2" name="deletar" value="Deletar"/>
                </div>

                <input type="hidden" name="id_m_end" value="">
            </form>
        </div>
    </div>
</div>
<div id="responseAjaxError"></div>