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