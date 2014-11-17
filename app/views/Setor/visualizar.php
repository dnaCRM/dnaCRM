<?php
$setor = $data['setor'];
$apartamentos = $data['apartamentos'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?>
                <small>
                    <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
                </small>
                <!-- Botões de administração -->
                <span class="btn-panel pull-right">
                <a href="Setor/formsetor/<?php echo $setor['cd_setor']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Setor!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="Setor/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                <a href="Setor/confirmDelete/<?php echo $setor['cd_setor']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Deletar!"
                   class="btn btn-warning btn-circle btn-lg">
                    <i class="fa fa-trash-o"></i>
                </a>
            </span>
                <!-- Fim Botões de administração -->

            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
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
                            <dd>
                                <a href="Condominio/visualizar/<?php echo $setor['cd_condominio']; ?>"><?php echo $setor['condominio']; ?></a>
                            </dd>
                        </dl>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
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

                            foreach ($apartamentos as $ap) {
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

            <?php if ($data['ocorrencias']): ?>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-asterisk"></i> Ocorrências neste Setor</h3>
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Assunto</th>
                                <th>Informante</th>
                                <th>Fim</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($data['ocorrencias'] as $oc) {
                                echo "
                    <tr>
                        <td>{$oc['dt_ocorrencia']}</td>
                        <td><a href=\"Ocorrencia/visualizar/{$oc['cd_ocorrencia']}\">{$oc['desc_assunto']}</a></td>
                        <td>{$oc['informante']}</td>
                        <td>{$oc['dt_fim']}</td>
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
</div>