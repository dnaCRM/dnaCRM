<div class="row">
    <div class="col-lg-6">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well text-right">

            <a href="Apartamento/formapartamento/" class="btn btn-success" role="button">
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
                <th>Nome</th>
                <th>Setor</th>
                <th>Condomínio</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($data['list'] as $apartamento) {

                echo '<tr>';
                echo '<td><a href="Apartamento/visualizar/' . $apartamento['cd_apartamento'] . '">'
                    . $apartamento['desc_apartamento'] . '</a></td>';
                echo '<td><a href="Setor/visualizar/' . $apartamento['cd_setor'] . '">' . $apartamento['setor'] . '</a></td>';
                echo '<td><a href="Condominio/visualizar/' . $apartamento['cd_condominio'] . '">' . $apartamento['condominio'] . '</a></td>';
                echo "<td><a href=\"Apartamento/formapartamento/{$apartamento['cd_apartamento']}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                echo '</tr>';

            }
            ?>
            </tbody>
        </table>
    </div>
</div>