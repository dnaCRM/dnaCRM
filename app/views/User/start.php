<div class="row">
    <div class="col-lg-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Alguma coisa!
            </p>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <?php
        if (Session::exists('fail')) {
        ?>

        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>ALERTA! </strong>

            <?php
            echo Session::flash('fail');
            echo "</div>";
            }
            ?>

            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>usuario</th>
                    <th>Nome</th>
                    <th>Cadastrado</th>
                    <th>Atualizado</th>
                    <th>Grupo</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($data['list'] as $perfil) {

                    echo '<tr>';
                    echo '<td>'. $perfil['id_usuario'] . '</td>';
                    echo '<td>' . $perfil['nome_usuario'] . '</td>';
                    echo '<td>' . (new DateTime($perfil['data_cadastro']))->format('d/m/Y') . '</td>';
                    echo '<td>' . (new DateTime($perfil['data_atualizado']))->format('d/m/Y') . '</td>';
                    echo '<td>' . $perfil['grupo'] . '</td>';
                    echo '</tr>';

                }
                var_dump($data['list'][0]);
                ?>
                </tbody>
            </table>
        </div>
    </div>