<div class="row">
    <div class="col-lg-6">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6">
        <div class="well text-right">

            <a href="OrdemServico/formOrdemServico/" class="btn btn-success" role="button">
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
                <th>Descriçao</th>
                <th>Data</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($data['list'] as $perfil) {
                $dt_inicio = new DateTime($perfil->getDtInicio());
                $perfil->setDtInicio($dt_inicio->format('d/m/Y'));
                echo '<tr>';
                echo '<td><a href="OrdemServico/visualizar/' . $perfil->getCdOrdemServico() . '">' . $perfil->getDescAssunto() . '</a></td>';
                echo '<td>' . $perfil->getDescOrdemServico() . '</td>';
                echo '<td>' . $perfil->getDtInicio() . '</td>';
                echo "<td><a href=\"OrdemServico/formOrdemServico/{$perfil->getCdOrdemServico()}\" class=\"btn btn-primary btn-sm\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                echo '</tr>';

            }
            //var_dump($data['list'][1]);
            ?>
            </tbody>
        </table>
    </div>
</div>