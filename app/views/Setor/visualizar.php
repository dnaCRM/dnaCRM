<?php
$setor = $data['setor'];
$apartamentos = $data['apartamentos'];
?>
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
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-body">
                    <img class="img-circle profilefoto center-block"
                         src="<?php echo $setor['im_perfil']; ?>">
                </div>
                <div>
                    <dl class="dl-horizontal">

                        <dt>Nome</dt>
                        <dd><?php echo $setor['nm_setor']; ?></dd>
                        <dt>Observação</dt>
                        <dd><?php echo $setor['observacao']; ?></dd>
                        <dt>Localização</dt>
                        <dd><?php echo $setor['condominio']; ?></dd>
                    </dl>
                </div>

            </div>
        </div>
        <div class="well">
            <a class="btn btn-primary btn-sm"
               href="Setor/formsetor/<?php echo $setor['cd_setor']; ?>">
                <span class="fa fa-edit"></span> Editar</a>
            <a class="btn btn-warning btn-sm"
               href="Setor/confirmDelete/<?php echo $setor['cd_setor']; ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>
        </div>
    </div>

    <div class="col-sm-6">
        <?php if ($apartamentos): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Apartamentos</h3></div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach($apartamentos as $ap) {
                        echo "
                    <tr>
                        <td><a href=\"Apartamento/visualizar/{$ap['cd_apartamento']}\">{$ap['desc_apartamento']}</a></td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>