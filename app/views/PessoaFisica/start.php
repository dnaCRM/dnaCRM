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
                echo '</tr>';

            }
            //var_dump($data['list'][1]);
            ?>
            </tbody>
        </table>
    </div>
</div>