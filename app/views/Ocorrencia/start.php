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
                <th>Descrição</th>
                <th>Data</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($data['list'] as $ocorrencia) {
                $dat = new DateTime($ocorrencia->getDtOcorrencia());
                $ocorrencia->setDtOcorrencia($dat->format('d/m/Y'));
                echo '<tr>';
                echo '<td><a href="Ocorrencia/visualizar/' . $ocorrencia->getCdOcorrencia() . '">' . $ocorrencia->getDescAssunto() . '</a></td>';
                echo '<td>' . $ocorrencia->getDescOcorrencia() . '</td>';
                echo '<td>' . $dat->format('d/m/Y') . '</td>';
                echo "<td><a href=\"Ocorrencia/formOcorrencia/{$ocorrencia->getCdOcorrencia()}\" class=\"btn btn-primary btn-sm\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                echo '</tr>';

            }
            //var_dump($data['list'][1]);
            ?>
            </tbody>
        </table>
    </div>
</div>