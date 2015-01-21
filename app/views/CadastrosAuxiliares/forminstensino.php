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