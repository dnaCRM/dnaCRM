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

<!--Teste de Perfil-->
<div class="row">
    <div class="col-lg-6">

        <img class="img-circle profilefoto" src="img/uploads/<?php echo $data['perfil']['im_foto']; ?>">
        <?php

        $perfil = $data['perfil'] ;

        echo '<table class="table table-striped table-hover ">';
        foreach ($perfil as $campo => $dado) {

            echo '<tr>';
            echo '<td> [ ' . $campo . ' ] ' . $dado . '</td>';
            echo '</tr>';

        }
        echo '</table>';
            ?>



        </div>

        <div class="col-lg-6">
            <?php
            echo '$_POST';
            var_dump($_POST);
            echo '$_SESSION';
            var_dump($_SESSION);
            echo '$_data';
            var_dump($data);

            ?>
        </div>
    </div>