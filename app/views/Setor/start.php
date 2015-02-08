<?php
$setores = $data['list'];
?>
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

                <a href="Setor/formSetor/" class="btn btn-success" role="button">
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
                    <th>Condomínio</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($setores as $setor) {

                    echo '<tr>';
                    echo '<td><img src="' . $setor['im_perfil'] . '" class="img-circle" title="' . $setor['cd_setor'] . '"></td>';
                    echo '<td><a href="Setor/visualizar/' . $setor['cd_setor'] . '">' . $setor['nm_setor'] . '</a></td>';
                    echo '<td><a href="PessoaJuridica/visualizar/' . $setor['cd_condominio'] . '">' . $setor['condominio'] . '</a></td>';
                    echo "<td><a href=\"Setor/formSetor/{$setor['cd_setor']}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                    echo '</tr>';

                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>