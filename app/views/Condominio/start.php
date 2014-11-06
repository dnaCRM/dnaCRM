<div class="row">
    <div class="col-lg-6">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well text-right">

            <a href="Condominio/formcondominio/" class="btn btn-success" role="button">
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
                <th>Bairro</th>
                <th>Cep</th>
                <th>Editar</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($data['list'] as $perfil) {

                echo '<tr>';
                echo '<td><img src="' . $perfil->getImPerfil() . '" class="img-circle" title="' . $perfil->getCdCondominio() . '"></td>';
                echo '<td><a href="Condominio/visualizar/' . $perfil->getCdCondominio() . '">' . $perfil->getNmCondominio() . '</a></td>';
                echo '<td>' . $perfil->getBairro() . '</td>';
                echo '<td>' . $perfil->getCep() . '</td>';
                echo "<td><a href=\"Condominio/formcondominio/{$perfil->getCdCondominio()}\" class=\"btn btn-primary btn-sm\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                echo '</tr>';

            }
            //var_dump($data['list'][1]);
            ?>
            </tbody>
        </table>
    </div>
</div>