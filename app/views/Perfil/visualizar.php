<div class="row">
    <div class="col-md-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-md-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <a href="Perfil/update/<?php echo $data['perfil']['cd_pessoa_fisica']; ?>">
                <span class="fa fa-edit"></span> Editar</a>
            <br>
            <a href="Perfil/confirmDelete/<?php echo $data['perfil']['cd_pessoa_fisica']; ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>

        </div>
    </div>
</div>

<!--Teste de Perfil-->
<div class="row">
    <div class="col-md-6">

        <img class="img-circle profilefoto"
             src="<?php echo $data['img_folder'] . $data['perfil']['cd_pessoa_fisica'] . '.jpg'; ?>">
        <?php

        $perfil = $data['perfil'];
        $nasc = new DateTime($perfil['dt_nascimento']);
        $perfil['dt_nascimento'] = $nasc->format('d/m/Y');

        echo '<table class="table table-striped table-hover ">';

        foreach ($perfil as $campo => $dado) {

            echo '<tr>';
            echo strtr("<td><strong>{$campo}</strong>: {$dado}</td>", Config::get('dicionario'));
            echo '</tr>';

        }
        echo '</table>';
        ?>

    </div>

    <div class="col-md-6">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            $_POST
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <?php

                        var_dump($_POST);

                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            $_SESSION
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($_SESSION);

                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <i class="glyphicon glyphicon-leaf"></i> $data
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($data);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>