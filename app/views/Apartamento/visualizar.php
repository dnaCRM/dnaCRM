<?php
$apartamento = $data['apartamento'];
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
                <a href="Setor/formSetor/<?php echo $apartamento['cd_apartamento']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Apartamento!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="Apartamento/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                    <?php if ($userDados['nivel'] == 1): ?>
                        <a href="Setor/confirmDelete/<?php echo $apartamento['cd_apartamento']; ?>"
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

    <!--Teste de Perfil-->
    <div class="row">
        <div class="col-md-6">

            <div class="legend">Localização</div>
            <div class="panel profile-card pcard-lg">
                <div class="panel-body">
                    <?php
                    echo "
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$apartamento['condo_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\"><a href=\"Condominio/visualizar/{$apartamento['cd_condominio']}\">Condomínio
                    {$apartamento['condominio']}</a>
                     <div class=\"pcard-info\"><a href=\"Setor/visualizar/{$apartamento['cd_setor']}\">
                    {$apartamento['setor']}</a>
                    </div>
                    </div>
                    ";

                    ?>
                </div>
            </div>

            <?php if ($data['ocorrencias']): ?>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-asterisk"></i> Ocorrências neste Apartamento</h3>
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

        <div class="col-md-6">
            <?php if ($data['residentes']): ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-group"></i> Moradores Residentes</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Entrada</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['residentes'] as $mo) {
                                echo '<tr>';
                                echo "<td><img src=\"{$mo['pessoa_foto']}\" class=\"img-circle profilefoto\"</td>
                              <td><a href=\"PessoaFisica/visualizar/{$mo['cd_pessoa_fisica']}\">{$mo['pessoa']}</a></td>
                              <td>{$mo['m_end_dt_entrada']}</td>";
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            <?php endif; ?>

            <?php if ($data['nao_residentes']): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-group"></i> Moradores Não Residentes</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Entrada</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['nao_residentes'] as $nr) {
                                echo '<tr>';
                                echo "<td><img src=\"{$nr['pessoa_foto']}\" class=\"img-circle profilefoto\"</td>
                              <td><a href=\"PessoaFisica/visualizar/{$nr['cd_pessoa_fisica']}\">{$nr['pessoa']}</a></td>
                              <td>{$nr['m_end_dt_entrada']}</td>";
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            <?php endif; ?>

            <?php if ($data['ex_moradores']): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ex-Moradores</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Entrada</th>
                                <th>Saída</th>
                                <th>Resid.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['ex_moradores'] as $exmo) {
                                echo '<tr>';
                                echo "<td><img src=\"{$exmo['pessoa_foto']}\" class=\"img-circle profilefoto\"</td>
                              <td><a href=\"PessoaFisica/visualizar/{$exmo['cd_pessoa_fisica']}\">{$exmo['pessoa']}</a></td>
                              <td>{$exmo['m_end_dt_entrada']}</td>
                              <td>{$exmo['m_end_dt_saida']}</td>
                              <td>{$exmo['residente']}</td>";
                                echo '</tr>';
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
