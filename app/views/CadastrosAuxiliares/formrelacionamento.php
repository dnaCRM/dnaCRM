<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

            <p class="lead">
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </p>
        </div>
    </div>

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
                <th>Relacionamento</th>
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
            <legend id="legend_form_relacoes">Relações</legend>
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
                <th>Relacionamento 1</th>
                <th>Gênero 1</th>
                <th>#2</th>
                <th>Relacionamento 2</th>
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