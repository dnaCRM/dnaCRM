<div class="container">
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Cadastros Auxiliares
            <small> Área Administrativa</small>
        </h3>
    </div>
</div>

<div class="row">
<div class="col-md-12">
<ul class="nav nav-tabs">
    <li class="active"><a href="#categorias" data-toggle="tab">Categorias</a></li>
    <li><a href="#profissoes" data-toggle="tab">Profissões</a></li>
    <li><a href="#instEnsino" data-toggle="tab">Instituições de Ensino</a></li>
    <li><a href="#relacionamentos" data-toggle="tab">Relacionamentos</a></li>
</ul>

<div class="tab-content" id="cadAuxiliares">
<div class="tab-pane fade active in" id="categorias">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="form_sub_categorias">
                <legend id="legend_form_sub_categorias">Sub-Categorias</legend>
                <fieldset class="well">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome_sub_categoria" class="control-label">Sub-Categoria</label>

                            <div>
                                <input name="nome_sub_categoria" class="form-control" type="text"
                                       id="nome_sub_categoria">
                            </div>
                        </div>
                        <div class="form-group selectContainer col-md-6">
                            <label for="select_cat" class="control-label">Categoria</label>

                            <div>
                                <select class="form-control" name="select_cat">
                                    <option value="">----</option>
                                    <?php
                                    foreach ($data['categorias'] as $cat) {
                                        echo "<option value=\"{$cat->getCdCategoria()}\">{$cat->getDescCategoria()}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <p class="col-md-12">
                        <input type="reset" name="sub_categ_reset" class="btn btn-success" id="sub_categ_reset"
                               value="Limpar">
                        <input type="submit" name="cadastrar_sub_categ" class="btn btn-primary"
                               id="cadastrar_sub_categ"
                               value="Cadastrar">
                        <input type="hidden" name="del_sub_categ" id="del_sub_categ" value="n">
                        <input name="id_sub_categoria" id="id_sub_categoria" type="hidden" value="">
                    </p>

                </fieldset>
            </form>

        </div>
        <div class="col-md-6">

            <table id="tb_sub_categorias" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Sub Categoria</th>
                    <th>Categoria</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['categoria_valor'] as $cv) {
                    echo "
                        <tr data-id-sub-categoria=\"{$cv['cd_vl_categoria']}\">
                            <td>{$cv['cd_vl_categoria']}</td>
                            <td>{$cv['desc_vl_categoria']}</td>
                            <td>{$cv['desc_categoria']}</td>
                            <td>
                    <a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_sub_categ\" data-update-sub-categ-id=\"{$cv['cd_vl_categoria']}\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_sub_categ\" data-del-sub-categ-id=\"{$cv['cd_vl_categoria']}\"><i class=\"fa fa-trash-o\"></i></a>
                    </td>
                        </tr>
                        ";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- CATEGORIAS -->
    <p>

    <div class="progress">
        <div class="progress-bar"></div>
    </div>
    </p>
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="form_categorias">
                <legend id="legend_form_categorias">Categorias</legend>
                <fieldset class="well">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nome_categoria" class="control-label">Categoria</label>

                            <div>
                                <input name="nome_categoria" class="form-control" type="text"
                                       id="nome_categoria">
                                <input name="id_categoria" id="id_categoria" type="hidden" value="">
                            </div>
                        </div>
                    </div>
                    <p class="col-md-12">
                        <input type="reset" name="categ_reset" class="btn btn-success" id="categ_reset"
                               value="Limpar">
                        <input type="submit" name="cadastrar_categ" class="btn btn-primary"
                               id="cadastrar_categ"
                               value="Cadastrar">
                        <input type="hidden" name="del_categ" id="del_categ" value="n">
                    </p>

                </fieldset>
            </form>

        </div>
        <div class="col-md-6">

            <table id="tb_categorias" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['categorias'] as $categoria) {
                    echo "
                        <tr data-id-categoria=\"{$categoria->getCdCategoria()}\">
                            <td>{$categoria->getCdCategoria()}</td>
                            <td>{$categoria->getDescCategoria()}</td>
                            <td>
                    <a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_categ\" data-update-categ-id=\"{$categoria->getCdCategoria()}\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_categ\" data-del-categ-id=\"{$categoria->getCdCategoria()}\"><i class=\"fa fa-trash-o\"></i></a>
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
<div class="tab-pane fade" id="profissoes">

    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="form_profissao">
                <legend id="legend_form_profissao">Profissões</legend>
                <fieldset class="well">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nome_profissao" class="control-label">Profissão</label>

                            <div>
                                <input name="nome_profissao" class="form-control" type="text"
                                       id="nome_profissao">
                                <input name="id_profissao" id="id_profissao" type="hidden" value="">
                            </div>
                        </div>
                    </div>
                    <p class="col-md-12">
                        <input type="reset" name="prof_reset" class="btn btn-success" id="prof_reset"
                               value="Limpar">
                        <input type="submit" name="cadastrar_prof" class="btn btn-primary"
                               id="cadastrar_prof"
                               value="Cadastrar">
                        <input type="hidden" name="del_prof" id="del_prof" value="n">
                    </p>

                </fieldset>
            </form>

        </div>
        <div class="col-md-6">
            <table id="tb_profissao" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['profissoes'] as $profissao) {
                    echo "
                        <tr data-id-profissao=\"{$profissao->getCdProfissao()}\">
                            <td>{$profissao->getCdProfissao()}</td>
                            <td>{$profissao->getNmProfissao()}</td>
                            <td>
                    <a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_prof\" data-update-prof-id=\"{$profissao->getCdProfissao()}\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_prof\" data-del-prof-id=\"{$profissao->getCdProfissao()}\"><i class=\"fa fa-trash-o\"></i></a>
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

<div class="tab-pane fade" id="instEnsino">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="form_inst_ensino">
                <legend id="legend_form_inst_ensino">Instituições de Ensino</legend>
                <fieldset class="well">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nome_inst_ensino" class="control-label">Instituição de Ensino</label>

                            <div>
                                <input name="nome_inst_ensino" class="form-control" type="text"
                                       id="nome_inst_ensino">
                                <input name="id_inst_ensino" id="id_inst_ensino" type="hidden" value="">
                            </div>
                        </div>
                        <div class="form-group selectContainer col-md-6">
                            <label for="select_cat_ens" class="control-label">Categoria</label>

                            <div>
                                <select class="form-control" name="select_cat_ens">
                                    <option value="">----</option>
                                    <?php
                                    foreach ($data['cat_inst_ensino'] as $cat_ens) {
                                        echo "<option value=\"{$cat_ens->getCdVlCategoria()}\">{$cat_ens->getDescVlCatg()}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <p class="col-md-12">
                        <input type="reset" name="inst_ens_reset" class="btn btn-success" id="inst_ens_reset"
                               value="Limpar">
                        <input type="submit" name="cadastrar_inst_ens" class="btn btn-primary"
                               id="cadastrar_inst_ens"
                               value="Cadastrar">
                        <input type="hidden" name="del_inst_ens" id="del_inst_ens" value="n">
                    </p>

                </fieldset>
            </form>

        </div>
        <div class="col-md-6">

            <table id="tb_inst_ensino" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Instituição</th>
                    <th>Tipo</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['inst_ensino'] as $inst) {
                    echo "
                        <tr data-id-inst-ensino=\"{$inst['cd_instituicao']}\">
                            <td>{$inst['cd_instituicao']}</td>
                            <td>{$inst['ds_instituicao']}</td>
                            <td>{$inst['desc_catg_instuicao']}</td>
                            <td><a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_inst_ens\" data-update-inst-ens-id=\"{$inst['cd_instituicao']}\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_inst_ens\" data-del-inst-ens-id=\"{$inst['cd_instituicao']}\"><i class=\"fa fa-trash-o\"></i></a></td>
                        </tr>
                        ";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="tab-pane fade" id="relacionamentos">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" id="form_relacionamentos">
                <legend id="legend_form_relacionamentos">Relacionamentos</legend>
                <fieldset class="well">
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="nome_sub_categoria" class="control-label">Nome do relacionamento</label>

                            <div>
                                <input type="text" name="nome_sub_categoria" class="form-control"
                                       id="nome_relacionamento" placeholder="Digite o nome do relacionamento">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Gênero</label>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" id="M">
                                    <input type="radio" name="genero" value="M">
                                    M
                                </label>
                                <label class="btn btn-default" id="F">
                                    <input type="radio" name="genero" value="F"><i
                                        class="form-control-feedback" data-bv-icon-for="genero"
                                        style="display: none;"></i>
                                    F
                                </label>
                            </div>
                        </div>
                    </div>
                    <p class="col-md-12">
                        <input type="reset" name="relac_reset" class="btn btn-success" id="relac_reset"
                               value="Limpar">
                        <input type="submit" name="cadastrar_relacionamento" class="btn btn-primary"
                               id="cadastrar_relacionamento"
                               value="Cadastrar">
                        <input type="hidden" name="del_sub_categ" id="del_relacionamento" value="n">
                        <input name="id_sub_categoria" id="id_relacionamento" type="hidden" value="">
                        <input name="select_cat" id="id_categoria" type="hidden" value="4">
                    </p>

                </fieldset>
            </form>
        </div>

        <div class="col-md-6">
            <table id="tb_relacionamentos" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ralacionamento</th>
                    <th>Gênero</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['relacionamentos'] as $r) {
                    echo "
                        <tr data-id-relacionamento=\"{$r->getCdVlCategoria()}\">
                            <td>{$r->getCdVlCategoria()}</td>
                            <td>{$r->getDescVlCatg()}</td>
                            <td>{$r->getGenero()}</td>
                            <td>
                    <a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_relacionamento\" data-update-relacionamento-id=\"{$r->getCdVlCategoria()}\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_relacionamento\" data-del-relacionamento-id=\"{$r->getCdVlCategoria()}\"><i class=\"fa fa-trash-o\"></i></a>
                    </td>
                        </tr>
                        ";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" id="form_relacoes">
                <legend class="legend">Relações</legend>
                <fieldset>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-group selectContainer col-md-5">

                                <div>
                                    <select class="form-control" name="relac_1" id="relac_1">
                                        <option value="">Selecione um relacionamento</option>
                                        <?php
                                        foreach ($data['relacionamentos'] as $r1) {
                                            echo "<option value=\"{$r1->getCdVlCategoria()}\">{$r1->getDescVlCatg()}</option>";
                                        };
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-1 text-center">
                                <button id="button_relac" class="btn btn-primary btn-circle btn-md"><i
                                        id="buttonRelacContent" class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                            <div class="form-group selectContainer col-md-5">

                                <div>
                                    <select class="form-control" name="relac_2" id="relac_2">
                                        <option value="">Selecione um relacionado</option>
                                        <?php
                                        foreach ($data['relacionamentos'] as $r2) {
                                            echo "<option value=\"{$r2->getCdVlCategoria()}\">{$r2->getDescVlCatg()}</option>";
                                        };
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="col-md-12">
                        <input type="hidden" name="del_relacao" id="del_relacao" value="n">
                    </p>
                </fieldset>
            </form>
        </div>
        <div class="col-md-12">
            <table id="tb_relacoes" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#1</th>
                    <th>Ralacionamento 1</th>
                    <th>Gênero 1</th>
                    <th>#2</th>
                    <th>Ralacionamento 2</th>
                    <th>Gênero 2</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['relacoes'] as $rs) {
                    echo
                    "<tr data-id-relacao=\"{$rs['cd_catg_vl_relac_1']}{$rs['cd_catg_vl_relac_2']}\">
                    <td>{$rs['cd_catg_vl_relac_1']}</td>
                    <td>{$rs['desc_vl_relac_1']}</td>
                    <td>{$rs['genero_relac_1']}</td>
                    <td>{$rs['cd_catg_vl_relac_2']}</td>
                    <td>{$rs['desc_vl_relac_2']}</td>
                    <td>{$rs['genero_relac_2']}</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_relacao\" data-del-relac-1=\"{$rs['cd_catg_vl_relac_1']}\"  data-del-relac-2=\"{$rs['cd_catg_vl_relac_2']}\"><i class=\"fa fa-trash-o\"></i></a>
                    </td>
                </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>
</div>

</div>
<div id="responseAjaxError"></div>