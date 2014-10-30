<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small></h3>
    </div>
</div>

<!--Teste de Perfil-->
<div class="row">
    <div class="col-sm-6">

        <img class="img-circle profilefoto"
             src="<?php echo $data['perfil']->getImPerfil(); ?>">
        <?php
        $perfil = $data['perfil'];
        echo '<table class="table table-striped table-hover ">';

        echo '<tr>';
        echo "<td><strong>Nome Fantasia: </strong>: {$perfil->getNmFantasia()}</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td><strong>E-mail: </strong>: {$perfil->getEmail()}</td>";
        echo '</tr>';


        echo '</table>';
        ?>

    </div>

    <div class="col-sm-6">
        <div class="well">

            <a class="btn btn-primary btn-sm"
               href="PessoaJuridica/formperfil/<?php echo $data['perfil']->getCdPessoaJuridica(); ?>">
                <span class="fa fa-edit"></span> Editar</a>

            <a class="btn btn-warning btn-sm"
               href="PessoaJuridica/confirmDelete/<?php echo $data['perfil']->getCdPessoaJuridica(); ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>

        </div>
    </div>
</div>