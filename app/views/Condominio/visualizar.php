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

        <img class="img-circle profilefoto"
             src="<?php echo $data['condominio']->getImPerfil(); ?>">
        <?php
        $condominio = $data['condominio'];
        echo '<table class="table table-striped table-hover ">';

        echo '<tr>';
        echo "<td><strong>Nome Condominio: </strong>: {$condominio->getNmCondominio()}</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td><strong>Cep: </strong>: {$condominio->getCep()}</td>";
        echo '</tr>';


        echo '</table>';
        ?>

    </div>

    <div class="col-sm-6">
        <div class="well">

            <a class="btn btn-primary btn-sm"
               href="Condominio/formcondominio/<?php echo $data['condominio']->getCdCondominio(); ?>">
                <span class="fa fa-edit"></span> Editar</a>

            <a class="btn btn-warning btn-sm"
               href="Condominio/confirmDelete/<?php echo $data['condominio']->getCdCondominio(); ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>

        </div>
    </div>
</div>