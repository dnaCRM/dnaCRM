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
                                <th>Cod.</th>
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
                                <a href=\"#\" class=\"btn btn-warning btn-sm btn-circle delete_categ\" data-del-categ-id=\"{$categoria->getCdCategoria()}\" data-toggle=\"modal\" data-target=\"#apagaCategModal\"><i class=\"fa fa-trash-o\"></i></a>
                                </td>
                                    </tr>
                                    ";
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="tab-pane fade" id="profissoes">
                    <h3 class="legend">Profissões</h3>
                </div>
                <div class="tab-pane fade" id="instEnsino">
                    <h3 class="legend">Instituições de Ensino</h3>
                </div>
                <div class="tab-pane fade" id="relacionamentos">
                    <h3 class="legend">Relacionamentos</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="responseAjaxError"></div>