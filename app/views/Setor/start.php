<div class="row">
    <div class="col-lg-6">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well text-right">

            <a href="Setor/formsetor/" class="btn btn-success" role="button">
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
                <th>Foto</th>
                <th>Nome</th>
                <th>Observação</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($data['list'] as $setor) {

                echo '<tr>';
                echo '<td><img src="' . $setor->getImPerfil() . '" class="img-circle" title="' . $setor->getCdSetor() . '"></td>';
                echo '<td><a href="Setor/visualizar/' . $setor->getCdSetor() . '">' . $setor->getNmSetor() . '</a></td>';
                echo '<td>' . $setor->getObservacao()  . '</td>';
                echo "<td><a href=\"Setor/formsetor/{$setor->getCdSetor()}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                echo '</tr>';

            }

            ?>
            </tbody>
        </table>
    </div>
</div>