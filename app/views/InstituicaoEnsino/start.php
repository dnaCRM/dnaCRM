<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

            <p class="lead">
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </p>
        </div>
        <div class="col-lg-6">
            <div class="well text-right">

                <a href="PessoaJuridica/formpessoajuridica/" class="btn btn-success" role="button">
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
                    <th>e-mail</th>
                    <th>Atividade</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($data['list'] as $perfil) {

                    echo '<tr>';
                    echo '<td><img src="' . $perfil['im_perfil'] . '" class="img-circle" title="' . $perfil['cd_pessoa_juridica'] . '"></td>';
                    echo '<td><a href="InstituicaoEnsino/visualizar/' . $perfil['cd_pessoa_juridica'] . '">' . $perfil['nm_fantasia'] . '</a></td>';
                    echo '<td>' . $perfil['email'] . '</td>';
                    echo '<td>' . $perfil['desc_ramo_atividade'] . '</td>';
                    echo "<td><a href=\"PessoaJuridica/formpessoajuridica/{$perfil['cd_pessoa_juridica']}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                    echo '</tr>';

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>