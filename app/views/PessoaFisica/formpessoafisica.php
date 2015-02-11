<?php
$perfil = $data['perfil'];
$perfil_form = new PessoaFisica();
$cadastrado = $perfil_form->cadastra($perfil); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];

$token = Token::generate();
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small><?php echo $data['pagesubtitle']; ?></small>
            <?php if ($id_check): ?>
                <span class="btn-panel pull-right">
                <a href="PessoaFisica/visualizar/<?php echo $id_check; ?>" data-toggle="tooltip" data-placement="top"
                   title="Ver Perfil!"
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
        <li><a href="#estudante" data-toggle="tab">Estudante</a></li>
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
                <img class="img-circle profilefoto left" src="<?php
                echo Image::get($cadastrado);?>">
            </div>

            <div class="col-md-8">
                <h1 class="text-success"><span class="glyphicon glyphicon-arrow-right"></span> Sucesso!</h1>

                <p>Deseja adicionar mais informações ao perfil
                    <strong><?php echo $cadastrado->getNmPessoaFisica(); ?></strong>?
                </p>

                <a href="PessoaFisica/" class="btn btn-info" role="button">
                    <i class="fa fa-arrow-circle-o-left"></i> Voltar
                </a>

                <a href="PessoaFisica/formpessoafisica/" class="btn btn-success" role="button">
                    <i class="fa fa-arrow-circle-o-up"></i> Novo
                </a>

                <a href="PessoaFisica/formpessoafisica/<?php echo $cadastrado->getCdPessoaFisica(); ?>"
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

        <img class="img-circle img-responsive" id="pf_foto" src="<?php echo Image::get($perfil); ?>"><br>

        <div class="form-group col-sm-10">
            <div>
                <label for="im_perfil" class="btn btn-default">Foto</label>
                <input type="file" class="hidden" id="im_perfil" name="im_perfil">
                <input id="webcam_photo" type="hidden" name="webcam_photo" value=""/>
            </div>
        </div>
        <a href="#" id="btn_camera" class="btn btn-default" data-toggle="modal" data-target="#webcam-modal"><i
                class="fa fa-camera"></i></a>
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
                <label for="uf_rg" class="control-label">UF</label>

                <select class="form-control" id="uf_rg" name="uf_rg">
                    <option value="">--</option>
                    <?php
                    $perfil->setUfRg($perfil->getUfRg() == '' ? Input::get('uf_rg') : $perfil->getUfRg());
                    foreach ($data['estados'] as $org) {
                        if ($org->getId() == $perfil->getUfRg()) {
                            echo '<option value="' . $org->getId() . '" selected>' . $org->getSigla() . '</option>';
                        } else {
                            echo '<option value="' . $org->getId() . ' ">' . $org->getSigla() . '</option>';
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
                            class="btn btn-default<?php echo (($perfil->getIeSexo()) == 'M' || Input::get('ie_sexo') == 'M') ? ' active' : ''; ?>">
                            <input type="radio" name="ie_sexo"
                                   value="M" <?php echo (($perfil->getIeSexo()) == 'M' || Input::get('ie_sexo') == 'M') ? 'checked' : ''; ?>/>
                            Masculino
                        </label>
                        <label
                            class="btn btn-default<?php echo (($perfil->getIeSexo()) == 'F' || Input::get('ie_sexo') == 'F') ? ' active' : ''; ?>">
                            <input type="radio" name="ie_sexo"
                                   value="F" <?php echo (($perfil->getIeSexo()) == 'F' || Input::get('ie_sexo') == 'F') ? 'checked' : ''; ?>/>
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
                    <option value="new_pj">--> Adicionar Empresa</option>
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
                    <option value="new_pro">--> Adicionar Novo</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <label for="cidade_origem" class="control-label">Cidade de Origem</label>

                <input type="text" class="hidden-input" name="cidade_origem" id="cidade_origem"
                       value="<?php echo($perfil->getCdCidadeOrigem() == '' ? Input::get('cidade_origem') : $perfil->getCdCidadeOrigem()); ?>">
                <button id="btn-cidade_origem" class="btn btn-info btn-block"><i class="fa fa-map-marker"></i>
                    Atualizar
                    Cidade de Origem
                </button>
            </div>
        </div>

        <?php if ($id_check && $perfil->getCdCidadeOrigem()): ?>
            <div id="pcard-cidade">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div>
                            <i class="fa fa-map-marker pull"></i> <?php echo $data['cidade_origem']['nome']; ?>
                            , <?php echo $data['cidade_origem']['estado_nome']; ?>
                            <a href="#"
                               data-toggle="tooltip"
                               data-placement="left"
                               title="Remover Cidade"
                               class="btn btn-danger btn-xs btn-circle btn-pcard-bottom-right"
                               id="remove-cidade">
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div id="pcard-cidade"></div>
        <?php endif; ?>

        <input type="hidden" name="cd_pessoa_fisica" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <div class="form-group">
            <div class="col-sm-12 clearfix">
                <a href="PessoaFisica" id="cancel"
                   class="btn btn-default"><span
                        class="fa fa-undo"></span> Cancelar</a>
                <a href="PessoaFisica/formpessoafisica" id="novo" class="btn btn-success"><span
                        class="fa fa-file"></span>
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
    $cidades = $data['cidades'];
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

    <div class="tab-pane fade" id="estudante">
        <div class="row">
            <div class="col-md-12">
                <div class="legend">Dados da formação</div>
                <table id="tb_estudante" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Instituição</th>
                        <th>Curso</th>
                        <th>Área</th>
                        <th>Período</th>
                        <th>Início</th>
                        <th>Fim</th>
                        <th>Editar</th>
                    </tr>
                    <tbody>
                    <?php
                    foreach($data['info_estudos'] as $ie) {
                    echo "<tr data-cd-info-estudos=\"{$ie['cd_info_estudos']}\">
                        <td>{$ie['instituicao']}</td>
                        <td>{$ie['curso']}</td>
                        <td>{$ie['area']}</td>
                        <td>{$ie['periodo']}</td>
                        <td>{$ie['dt_inicio']}</td>
                        <td>{$ie['dt_fim']}</td>
                        <td><a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_info_est\" data-update-info-est-id=\"{$ie['cd_info_estudos']}\"><i class=\"fa fa-edit\"></i></a>
                            &nbsp;<a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_info_est\" data-del-info-est-id=\"{$ie['cd_info_estudos']}\"><i class=\"fa fa-trash-o\"></i></a>
                            </td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                    </thead>
                </table>
            </div>
            <div class="col-md-12">

                <form class="form-horizontal" id="form_estudante">
                    <legend id="legend_form_estudante"><i class="fa fa-save"></i> Cadastro</legend>
                    <fieldset class="well">

                        <div class="form-group col-sm-12">
                            <div class="row">
                            <div class="col-sm-4 selectContainer">
                                <label for="select_inst_ensino" class="control-label">Instituiçao</label>
                                <select class="form-control" name="select_inst_ensino" id="select_inst_ensino">
                                    <option value="">-- Selecione uma Instituição de Ensino</option>
                                    <?php
                                    foreach ($data['inst_ensino'] as $inst_ensino) {
                                        echo "<option value=\"{$inst_ensino->getCdPessoaJuridica()}\">{$inst_ensino->getNmFantasia()}</option>";
                                    }

                                    ?>
                                    <option value="new_ie">-- Adicionar uma Instituição de Ensino</option>
                                </select>
                            </div>
                            <div class="col-sm-4 selectContainer">
                                <label for="select_curso" class="control-label">Curso</label>
                                <select class="form-control" name="select_curso" id="select_curso">
                                    <option value="">-- Selecione um curso</option>
                                    <?php
                                    foreach ($data['cursos'] as $curso) {
                                        echo "<option value=\"{$curso->getCdVlCategoria()}\">{$curso->getDescVlCatg()}</option>";
                                    }

                                    ?>
                                    <option value="new_curso">--> Adicionar novo Curso</option>
                                </select>
                            </div>
                            <div class="col-sm-4 selectContainer">
                                <label for="select_periodo_curso" class="control-label">Período</label>
                                <select class="form-control" name="select_periodo_curso" id="select_periodo_curso">
                                    <option value="">-- Seleciona um período</option>
                                    <?php
                                    foreach ($data['periodos_curso'] as $periodos_curso) {
                                        echo "<option value=\"{$periodos_curso->getCdVlCategoria()}\">{$periodos_curso->getDescVlCatg()}</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-3">
                                <label for="dt_inicio_curso" class="control-label">Início</label>
                                <input type="text" class="form-control data-input"
                                       value=""
                                       id="dt_inicio_curso"
                                       name="dt_inicio_curso" placeholder="___/___/____">
                            </div>
                            <div class="col-sm-3">
                                <label for="dt_fim_curso" class="control-label">Final</label>
                                <input type="text" class="form-control data-input"
                                       value=""
                                       id="dt_fim_curso"
                                       name="dt_fim_curso" placeholder="___/___/____">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-12">
                            <input type="reset" name="reset" class="btn btn-success" id="form_estudante_reset"
                                   value="Novo">
                            <input type="submit" name="cadastrar_estudante" class="btn btn-primary" id="cadastrar_estudante"
                                   value="Cadastrar">
                            <input type="hidden" name="cd_pessoa_fisica"
                                   value="<?php echo $perfil->getCdPessoaFisica(); ?>">
                            <input type="hidden" name="cd_info_estudos" id="cd_info_estudos" value="">
                            <input type="hidden" name="del_info_estudos" id="del_info_estudos" value="n">
                        </div>
                    </fieldset>
                </form>

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
                                        echo "<option value=\"{$condominio->getCdPessoaJuridica()}\">{$condominio->getNmFantasia()}</option>";
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
                            <div class="col-sm-4">
                                <label for="m_end_dt_entrada" class="control-label">Data de Entrada</label>

                                <input type="text" class="form-control data-input" name="m_end_dt_entrada"
                                       id="m_end_dt_entrada"
                                       placeholder="___/___/______">
                            </div>
                            <div class="col-sm-4">
                                <label for="m_end_dt_saida" class="control-label">Data de Saída</label>

                                <input type="text" class="form-control data-input" name="m_end_dt_saida"
                                       id="m_end_dt_saida"
                                       placeholder="___/___/______">
                            </div>
                            <div class="col-sm-4">
                                <label class="control-label">Residente</label>


                                    <div class="btn-group" data-toggle="buttons">
                                        <label
                                            class="btn btn-default btn-lg" id="label-residente">
                                            <input type="radio" name="residente" id="radio-residente"
                                                   value="S"/>
                                            <i class="fa fa-check text-primary"></i>
                                        </label>
                                        <label
                                            class="btn btn-default btn-lg" id="label-nao-residente">
                                            <input type="radio" name="residente" id="radio-nao-residente"
                                                   value="N"/>
                                            <i class="fa fa-ban text-danger"></i>
                                        </label>
                                    </div>

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
                        <th>Apt.</th>
                        <th>Resid.</th>
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
                             <td>{$mEnderecos['residente']}</td>
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
                                <div class="col-sm-3 inputContainer">
                                    <input name="cidade" class="hidden-input" type="text" id="cidade">
                                    <label for="cidade" class="control-label">Cidade</label>

                                    <div class="input-group">
                                        <input name="nome_cidade" class="form-control" type="text" id="nome_cidade" disabled>
                                        <span class="input-group-btn">
                                        <button class="btn btn-default" id="btn-pesquisa-cidade"><i class="fa fa-search"></i></button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-sm-12">
                                <div class="col-sm-3">
                                    <input name="estado" class="hidden-input" type="text" id="estado">
                                    <label for="estado" class="control-label">Estado</label>

                                    <input name="nome_estado" class="form-control" type="text" id="nome_estado" disabled>
                                </div>

                                <div class="col-sm-3">
                                    <label for="cep" class="control-label">CEP</label>

                                    <input name="cep" class="form-control" type="text" id="cep">
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
                        <th>Estado</th>
                        <th>CEP</th>
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
                        <td>";
                        foreach ($cidades as $end_cidade) {
                            if ($end_cidade->getId() == $endereco->getCidade()) {
                                echo $end_cidade->getNome();
                            }
                        }
                        echo "</td>
                        <td>";
                        foreach ($estados as $end_estado) {
                            if ($end_estado->getId() == $endereco->getEstado()) {
                                echo $end_estado->getNome();
                            }
                        }
                        echo "</td>
                        <td>{$endereco->getCep()}</td>
                        <td>";
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
            <div class="col-md-6">
                <div id="legend_form_relacionamento" class="legend">Relacionamentos</div>
                <form id="form_pf_relacionamento" class="form-horizontal">
                    <fieldset class="well">
                        <div class="form-group col-md-12">
                            <div id="pessoa_relac" class="clearfix"></div>
                            <div class="selectContainer">
                                <label for="catg_relac" class="control-label">Relacionamento</label>

                                <select class="form-control" id="catg_relac" name="catg_relac">
                                    <option value="">--</option>
                                    <?php
                                    foreach ($data['catg_relacionados'] as $catg_rel) {
                                        echo '<option value="' . $catg_rel->getCdVlCategoria() . ' ">' . $catg_rel->getDescVlCatg() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group btn-group col-md-12" data-toggle="buttons">
                            <label class="btn btn-danger" id="deletar_relac">
                                <input id="checkbox_del_relac" type="checkbox" name="delete" value="D"
                                       autocomplete="off">
                                <span id="del_button_txt">Deletar?</span>
                            </label>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="reset" name="reset" class="btn btn-success" id="form_pf_r_reset"
                                   value="Cancelar">
                            <input type="submit" name="cadastrar" class="btn btn-primary"
                                   id="cadastrar_pf_relacionamento" value="Ok">

                            <input type="hidden" name="cd_pessoa_fisica_1" id="cd_pessoa_fisica_1"
                                   value="<?php echo $perfil->getCdPessoaFisica(); ?>">
                            <input type="hidden" name="cd_pessoa_fisica_2" id="cd_pessoa_fisica_2" value="">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                        </div>

                    </fieldset>
                </form>
            </div>

            <div class="col-md-6">
                <div class="legend">Relacionados</div>
                <div class="dropdown" id="form-relac-pessoa">
                    <div class="form-group">
                        <input type="text" class="form-control" id="relac_busca"
                               name="relac_busca" placeholder="Buscar Pessoa" autocomplete="off"
                               data-toggle="busca-pessoa-relac">

                        <div id="busca-relac-pessoa-resultado" class="dropdown-busca list-group"
                             aria-labelledby="busca-pessoa-relac"></div>
                    </div>
                </div>
                <div id="relac-error-msg" class="center-block"></div>
                <table id="tb_lista-relacionados" class="table">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Relação</th>
                        <th>Acão</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['relacionados'] as $relacionado): ?>
                        <tr data-pessoa-relac="<?php echo $relacionado['cd_pessoa_fisica_2']; ?>">
                            <td><img src="<?php echo $relacionado['pessoa2_foto']; ?>" class="img-circle profilefoto">
                            </td>
                            <td>
                                <a href="PessoaFisica/visualizar/<?php echo $relacionado['cd_pessoa_fisica_2']; ?>"><?php echo $relacionado['pessoa2_nome']; ?></a>
                            </td>
                            <td><?php echo $relacionado['relac']; ?></td>
                            <td>
                                <button
                                    data-img-pessoa="<?php echo $relacionado['pessoa2_foto']; ?>"
                                    data-nome-pessoa="<?php echo $relacionado['pessoa2_nome']; ?>"
                                    data-id-pessoa="<?php echo $relacionado['cd_pessoa_fisica_2']; ?>"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Editar relacionamento"
                                    class="btn btn-primary btn-xs btn-circle add-relac-pessoa">
                                    <i class="fa fa-arrow-left"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
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

<!-- Modal WebCam -->
<div class="modal fade" id="webcam-modal" tabindex="-1" role="dialog" aria-labelledby="webcam-modal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
                <span class="modal-title legend" id="webcamModalTitle">A Webcam vem aqui</span>
            </div>

            <div class="modal-body row">
                <div>
                    <div id="buttom_webcam_preview">
                        <a class="btn btn-default btn-circle btn-lg" href="javascript:void(take_snapshot())">
                            <i class="fa fa-camera"></i>
                        </a>
                    </div>
                    <div id="camera_container" class="col-md-5"></div>
                </div>
                <div class="col-md-5">
                    <div id="webcam_preview"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>

        </div>
        wec
    </div>
</div>
<div id="responseAjaxError"></div>
</div>

<script src="js/webcamjs/webcam.js"></script>

<!-- Modal para cadastro rápido de profissão -->
<div class="modal fade" tabindex="-1" role="dialog" id="new_pro_modal" aria-labelledby="new_pro_modal"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title legend">Nova Profissão</h4>
            </div>

            <form id="form_pf_new_pro">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome_profissao" class="control-label">Nome da profissão:</label>
                        <input type="text" class="form-control" name="nome_profissao" id="nome_profissao">
                        <input type="hidden" name="id_profissao">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="save_new_pro" value="Salvar">
                </div>
            </form>

        </div>

    </div>
</div>

<!-- Modal para cadastro rápido de curso -->
<div class="modal fade" tabindex="-1" role="dialog" id="new_curso_modal" aria-labelledby="new_curso_modal"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title legend">Novo Curso</h4>
            </div>

            <form id="form_pf_new_curso">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome_curso" class="control-label">Nome do Curso:</label>
                        <input type="text" class="form-control" name="nome_sub_categoria" id="nome_curso">
                        <!-- Categoria Curso -->
                        <input type="hidden" id="id_cat_curso" name="select_cat" value="14">
                        <input type="hidden" id="id_cat_curso" name="cd_cat_grupo" value="19">
                    </div>
                    <div class="form-group selectContainer">
                        <label for="area_curso" class="control-label">Área do Curso</label>
                        <select class="form-control" name="cd_grupo" id="area_curso">
                            <option value="">-- Seleciona um período</option>
                            <?php
                            foreach ($data['areas_curso'] as $area_curso) {
                                echo "<option value=\"{$area_curso->getCdVlCategoria()}\">{$area_curso->getDescVlCatg()}</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="save_new_curso" value="Salvar">
                </div>
            </form>

        </div>

    </div>
</div>


<!-- Modal para cadastro rápido de Empresa -->
<div class="modal fade" tabindex="-1" role="dialog" id="new_pj_modal" aria-labelledby="new_pj_modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title legend">Nova Pessoa Jurídica</h4>
            </div>

            <form id="form_pf_new_pj">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nm_empresa" class="control-label">Nome Fantasia:</label>
                        <input type="text" class="form-control" name="nm_fantasia" id="nm_empresa">
                    </div>
                    <div class="form-group">
                        <label for="razao_social_empresa" class="control-label">Razão Social:</label>
                        <input type="text" class="form-control" name="desc_razao" id="razao_social_empresa">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cd_pessoa_juridica" value="">
                    <input type="submit" class="btn btn-primary" name="save_new_pj" value="Salvar">
                </div>
            </form>

        </div>

    </div>
</div>

<!-- Modal para cadastro rápido de Instituicao de Ensino -->
<div class="modal fade" tabindex="-1" role="dialog" id="new_ie_modal" aria-labelledby="new_ie_modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title legend">Nova Pessoa Jurídica</h4>
            </div>

            <form id="form_pf_new_ie">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nm_ie" class="control-label">Nome Fantasia:</label>
                        <input type="text" class="form-control" name="nm_fantasia" id="nm_ie">
                    </div>
                    <div class="form-group">
                        <label for="razao_social_ie" class="control-label">Razão Social ou nome completo:</label>
                        <input type="text" class="form-control" name="desc_razao" id="razao_social_ie">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="cd_tipo_empresa" value="159">
                    <input type="hidden" name="cd_pessoa_juridica" value="">
                    <input type="submit" class="btn btn-primary" name="save_new_ie" value="Salvar">
                </div>
            </form>

        </div>

    </div>
</div>

<!-- Modal para adicionar Cidade de Origem -->
<div class="modal fade" tabindex="-1" role="dialog" id="cidade_origem_modal" aria-labelledby="cidade_origem_modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="modal-title legend">Cidade de Origem</div>
            </div>

            <form class="dropdown" id="form-cidade-origem">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nome_cidade_origem"
                               placeholder="Buscar Cidade" autocomplete="off"
                               data-toggle="busca-cidade">

                        <div id="busca-cidade-resultado" class="dropdown-busca panel col-md-12"
                             aria-labelledby="busca-cidade"></div>
                    </div>
                </div>
        </div>
        </form>

    </div>

</div>

<!-- Modal para adicionar Cidade/Estado para Endereço -->
<div class="modal fade" tabindex="-1" role="dialog" id="cidade_endereco_modal" aria-labelledby="cidade_endereco_modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="modal-title legend">Cidade</div>
            </div>

            <form class="dropdown" id="form-cidade-endereco">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nome_cidade_endereco"
                               placeholder="Buscar Cidade" autocomplete="off"
                               data-toggle="busca-cidade">

                        <div id="busca-cidade-endereco-resultado" class="dropdown-busca panel col-md-12"
                             aria-labelledby="busca-cidade-endereco"></div>
                    </div>
                </div>
        </div>
        </form>

    </div>

</div>
