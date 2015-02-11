<?php
$setor = $data['setor'];
$apartamentos = $data['apartamentos'];
$sub_areas = $data['sub_areas'];
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
                    <?php if ($userDados['nivel'] == 1): ?>
                        <a href="Setor/confirmDelete/<?php echo $setor['cd_setor']; ?>"
                           data-toggle="tooltip" data-placement="top" title="Deletar!"
                           class="btn btn-warning btn-circle btn-lg">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    <?php endif; ?>
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
                            <?php
                            if ($setor['observacao']) {
                                echo "<dt>Observação</dt>
                                      <dd><?php echo {$setor['observacao']}; ?></dd>";
                            }
                            ?>
                            <?php if ($setor['cd_setor_grupo']) {
                                echo "<dt>Setor</dt>
                                      <dd><a href=\"Setor/visualizar/{$setor['cd_setor_grupo']}\">{$setor['setor_grupo']}</a></dd>";
                            }
                            ?>
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
                        <h3 class="panel-title"><?php echo $setor['cd_vl_catg_tipo'] == 160 ? 'Apartamentos' : 'Sub-áreas';?></h3></div>

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

            <?php if ($sub_areas): ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sub-áreas</h3></div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($sub_areas as $sa) {
                                echo "
                    <tr>
                        <td><a href=\"Setor/visualizar/{$sa['cd_setor']}\">{$sa['nm_setor']}</a></td>
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
                        <td><a href=\"PessoaFisica/visualizar/{$oc['cd_pf_informante']}\">{$oc['informante']}</a></td>
                        <td>{$oc['dt_fim']}</td>
                    </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($data['ordens_servico']): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-wrench"></i> Ordens de Serviço</h3>
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Assunto</th>
                                <th>Status</th>
                                <th>Inicio</th>
                                <th>Fim</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($data['ordens_servico'] as $os_ex) {
                                echo "
                    <tr>
                        <td>{$os_ex['cd_ordem_servico']}</td>
                        <td><a href=\"OrdemServico/visualizar/{$os_ex['cd_ordem_servico']}\">{$os_ex['desc_assunto']}</a></td>
                        <td>{$os_ex['estagio']}</td>
                        <td>{$os_ex['dt_inicio']}</td>
                        <td>{$os_ex['dt_fim']}</td>
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
<?php var_dump($data['ocorrencias']);