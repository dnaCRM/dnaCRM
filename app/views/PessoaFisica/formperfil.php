<?php
$perfil = $data['perfil'];
$perfil_form = new PessoaFisica();
$perfil_form->cadastra($perfil); //Não cadastra na entra pois ainda não tem Token

$id_check = $data['id'];
$operadoras = $data['operadora'];
$pf_telefones = $data['pf_telefone'];
$telefones = $data['telefones'];
$token = Token::generate();

if (Session::exists('sucesso_salvar_pf')) {
    Session::flash('sucesso_salvar_pf');
}

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
    <?php if ($id_check): ?>
        <li><a href="#morador" data-toggle="tab">Morador</a></li>
        <li><a href="#telefones" data-toggle="tab">Telefones</a></li>
        <li><a href="#enderecos" data-toggle="tab">Outros Endereços</a></li>
    <?php endif; ?>
</ul>
<div id="TabAdicionais" class="tab-content">
<div class="tab-pane fade active in" id="principal">

<div class="row">
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
        <div class="col-sm-4 inputGroupContainer">
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


                <input type="text" class="form-control"
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


            <input type="text" class="form-control"
                   value="<?php echo $perfil->getDtInicioCurso() == '' ? Input::get('dt_inicio_curso') : $perfil->getDtInicioCurso(); ?>"
                   id="dt_inicio_curso"
                   name="dt_inicio_curso" placeholder="___/___/____">
        </div>
        <div class="col-sm-4" id="dt_fim_curso_picker">
            <label for="dt_fim_curso" class="control-label">Fim do Curso</label>


            <input type="text" class="form-control"
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
        <div class="col-sm-12">
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
            <a href="PessoaFisica/visualizar/<?php echo $data['id']; ?>" id="cancel" class="btn btn-default"><span
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
</div>

</div>
<?php if ($id_check): ?>
    <div class="tab-pane fade" id="telefones">


        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" id="form_pf_telefones">
                    <fieldset class="well">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="celular" class="control-label">Telefone</label>

                                <div>
                                    <input name="fone" class="form-control" type="text" id="celular">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
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

                            <div class="form-group col-md-6">
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
            <div class="col-md-6">
                <table id="tb_telefones" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Telefone</th>
                        <th>Operadora</th>
                        <th>Categoria</th>
                        <th>Observacao</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //var_dump($pf_telefones);
                    foreach($telefones as $telefone) {
                        echo "
                     <tr>
                        <td>{$telefone->getFone()}</td>
                        <td>
                        ";
                        foreach($operadoras as $catg_tel){
                            if ($catg_tel->getCdVlCategoria() == $telefone->getCdVlCatgOperadora()) {
                                echo $catg_tel->getDescVlCatg();
                            }
                        }
                        echo "
                        </td>
                        <td>
                        ";
                        foreach($pf_telefones as $pf_tel){
                            if ($pf_tel->getCdVlCategoria() == $telefone->getCdVlCatgFonePf()) {
                                echo $pf_tel->getDescVlCatg();
                            }
                        }
                        echo "
                        </td>
                        <td>{$telefone->getObservacao()}</td>
                    </tr>";
                    };?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div class="tab-pane fade" id="morador">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
            Exercitation
            +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko
            farm-to-table
            craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
            ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus
            mollit.</p>
    </div>
    <div class="tab-pane fade" id="enderecos">
        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
            retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
            Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure
            terry
            richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american
            apparel, butcher voluptate nisi qui.</p>
    </div>
<?php endif; ?>
</div>
</div>
</div>
</div>
