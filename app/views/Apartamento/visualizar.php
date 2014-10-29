<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small>
        </h3>


    </div>
</div>

<!--Teste de Perfil-->
<div class="row">
    <div class="col-sm-6">
        <?php

        $apartamento = $data['apartamento'];

        echo '<table class="table table-striped table-hover ">';

        echo '<tr>';
        echo "<td><strong>Nome: </strong>: {$apartamento->getCdApartamento()}</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td><strong>Descrição: </strong>: {$apartamento->getDescApartamento()}</td>";
        echo '</tr>';


        echo '</table>';
        ?>

    </div>

    <div class="col-sm-6">
        <div class="well">

            <a class="btn btn-primary btn-sm"
               href="Apartamento/formapartamento/<?php echo $data['apartamento']->getCdApartamento(); ?>">
                <span class="fa fa-edit"></span> Editar</a>

            <a class="btn btn-warning btn-sm"
               href="Apartamento/confirmDelete/<?php echo $data['apartamento']->getCdApartamento(); ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>


        </div>
    </div>
</div>