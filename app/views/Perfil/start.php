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

        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>e-mail</th>
                <th>Celular</th>
                <th>Nascimento</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($data['list'] as $perfil) {

                $foto = $perfil['im_foto'] != null ?
                    $data['img_folder'] . $perfil['cd_pessoa_fisica'] . '.jpg"'
                    :
                    $data['foto_default'];

                $nasc = new DateTime($perfil['dt_nascimento']);
                echo '<tr>';
                echo '<td><img src="' . $foto . '" class="img-circle" title="' . $perfil['cd_pessoa_fisica'] . '"></td>';
                echo '<td><a href="Perfil/visualizar/' . $perfil['cd_pessoa_fisica'] . '">' . $perfil['nm_pessoa_fisica'] . '</a></td>';
                echo '<td>' . $perfil['email'] . '</td>';
                echo '<td>' . $perfil['celular'] . '</td>';
                echo '<td>' . $nasc->format('d/m/Y') . '</td>';
                echo '</tr>';

            }
            //var_dump($data['list'][0]);
            ?>
            </tbody>
        </table>
    </div>
</div>