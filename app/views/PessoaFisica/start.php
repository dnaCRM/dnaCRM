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

                <a href="PessoaFisica/formpessoafisica/" class="btn btn-success" role="button">
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
                    <th>Nascimento</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($data['list'] as $perfil) {

                    $nasc = new DateTime($perfil->getDtNascimento());
                    echo '<tr>';
                    echo '<td><img src="' . $perfil->getImPerfil() . '" class="img-circle" title="' . $perfil->getCdPessoaFisica() . '"></td>';
                    echo '<td><a href="PessoaFisica/visualizar/' . $perfil->getCdPessoaFisica() . '">' . $perfil->getNmPessoaFisica() . '</a></td>';
                    echo '<td>' . $perfil->getEmail() . '</td>';
                    echo '<td>' . $nasc->format('d/m/Y') . '</td>';
                    echo "<td><a href=\"PessoaFisica/formpessoafisica/{$perfil->getCdPessoaFisica()}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"glyphicon glyphicon-pencil\"></i></a></td>";
                    echo '</tr>';

                }
                //var_dump($data['list'][1]);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>