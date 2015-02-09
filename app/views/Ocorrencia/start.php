<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

            <p class="lead">
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </p>
        </div>
        <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
            <div class="well text-right">

                <a href="Ocorrencia/formOcorrencia/" class="btn btn-success" role="button">
                    <i class="fa fa-arrow-circle-o-up"></i> Cadastrar novo
                </a>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <?php
            if (Session::exists('fail')) {
                Session::flash('fail');
            }
            ?>

            <table id="perfillist" class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Assunto</th>
                    <th>Resumo da Descrição</th>
                    <th>Data</th>
                    <th>Condomínio</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($data['list'] as $ocorrencia) {

                    echo '<tr>';
                    echo '<td><a href="Ocorrencia/visualizar/' . $ocorrencia['cd_ocorrencia'] . '">' . $ocorrencia['desc_assunto'] . '</a></td>';
                    echo '<td>' . substr($ocorrencia['desc_ocorrencia'],0,100) . '...</td>';
                    echo '<td>' . $ocorrencia['dt_ocorrencia'] . '</td>';
                    echo '<td>' . $ocorrencia['condominio'] . '</td>';
                    echo "<td><a href=\"Ocorrencia/formOcorrencia/{$ocorrencia['cd_ocorrencia']}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                    echo '</tr>';

                }
                //var_dump($data['list'][1]);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>