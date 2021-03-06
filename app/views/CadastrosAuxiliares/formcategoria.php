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
        <div class="col-md-4">
            <form class="form-horizontal" id="form_sub_categorias">
                <legend id="legend_form_sub_categorias">Sub-Categorias</legend>
                <fieldset class="well">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nome_sub_categoria" class="control-label">Sub-Categoria</label>

                            <div>
                                <input name="nome_sub_categoria" class="form-control" type="text"
                                       id="nome_sub_categoria">
                            </div>
                        </div>
                        <div class="form-group selectContainer">
                            <label for=" select_cat" class="control-label">Categoria</label>

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

                        <div class="form-group">
                            <label class="control-label">Gênero</label><br>

                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default btn-block" id="label-cat-genero">
                                    <input type="checkbox" name="genero" id="cat_genero" value="GR">
                                    <i class="fa fa-group"></i> Grupo Pai
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="group_name">
                            <input name="cd_grupo" class="hidden-input" type="text" id="cd_grupo">
                            <input name="cd_cat_grupo" class="hidden-input" type="text" id="cd_cat_grupo">
                            <label for="nome_grupo" class="control-label">Grupo</label>

                            <div class="input-group">
                                <div name="nome_grupo" class="form-control" id="nome_grupo"></div>
                                <span class="input-group-btn">
                                    <button id="btn-desagrupar" data-toggle="tooltip" data-placement="top" title="Desligar deste grupo" class="btn btn-default" type="button"><i class="fa fa-chain-broken"></i></button>
                                </span>
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
        <div class="col-md-8">

            <table id="tb_sub_categorias" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Sub Categoria</th>
                    <th>Categoria</th>
                    <th>Grupo</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data['categoria_valor'] as $cv) {
                    $class = ($cv['genero'] == 'GR' ? 'class="warning"': '' );
                    echo "
                        <tr {$class} data-id-sub-categoria=\"{$cv['cd_vl_categoria']}\">
                            <td>{$cv['cd_vl_categoria']}</td>
                            <td>{$cv['desc_vl_categoria']}</td>
                            <td>{$cv['desc_categoria']}</td>
                            <td>{$cv['grupo']}</td>
                            <td>
                    <a href=\"#\" class=\"btn btn-primary btn-sm btn-circle update_sub_categ\" data-update-sub-categ-id=\"{$cv['cd_vl_categoria']}\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"#\" class=\"btn btn-info btn-sm btn-circle group\" data-nome-grupo=\"{$cv['desc_vl_categoria']}\" data-id-grupo=\"{$cv['cd_vl_categoria']}\" data-id-cat-grupo=\"{$cv['cd_categoria']}\"><i class=\"fa fa-plus\"></i></a>
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
                <div class="col-md-12">
                    <div class="form-group">
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
