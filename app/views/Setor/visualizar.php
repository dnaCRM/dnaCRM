<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">

        <img class="img-circle profilefoto"
             src="<?php echo $data['perfil']->getImPerfil(); ?>">
        <?php

        $condominio = (new CondominioDAO());

        $setor = $data['perfil'];

        $condominio = $condominio->getById($setor->getCdCondominio());

        echo '<table class="table table-striped table-hover ">';

        echo '<tr>';
        echo "<td><strong>Nome: </strong> {$setor->getNmSetor()}</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td><strong>Condomínio: </strong> {$condominio->getNmCondominio()}</td>";
        echo '</tr>';

        echo '</table>';

        ?>

    </div>

    <div class="col-sm-6">
        <div class="well">
            <a class="btn btn-primary btn-sm"
               href="Setor/formSetor/<?php echo $data['perfil']->getCdSetor(); ?>">
                <span class="fa fa-edit"></span> Editar</a>
            <a class="btn btn-warning btn-sm"
               href="Setor/confirmDelete/<?php echo $data['perfil']->getCdSetor(); ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>
        </div>
    </div>
</div>