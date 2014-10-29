<div class="row">
    <div class="col-sm-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-sm-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Alguma coisa!
            </p>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">

        <?php
        if (Session::exists('fail')) {
            echo Session::flash('fail');
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
                echo '<td>' . $perfil->getCdUsuario() . '</td>';
                echo '<td><a href="PessoaFisica/visualizar/' . $perfil->getCdUsuario() .'">'. $perfil->getLogin() . '</a></td>';
                echo '<td>' . (new DateTime($perfil->getDtUsuarioCriacao()))->format('d/m/Y') . '</td>';
                echo '<td>' . (new DateTime($perfil->getDtUsuarioAtualiza()))->format('d/m/Y') . '</td>';
                echo '<td>' . $perfil->getNivel() . '</td>';
                echo '</tr>';

            }
            //var_dump($data['list'][0]);
            ?>
            </tbody>
        </table>
    </div>
</div>