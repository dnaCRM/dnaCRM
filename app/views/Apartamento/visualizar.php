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
                <a href="Apartamento/formapartamento/<?php echo $apartamento['cd_apartamento']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Apartamento!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="Apartamento/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                <a href="Apartamento/confirmDelete/<?php echo $apartamento['cd_apartamento']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Deletar!"
                   class="btn btn-warning btn-circle btn-lg">
                    <i class="fa fa-trash-o"></i>
                </a>
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

        </div>

        <div class="col-md-6">
            <?php if ($data['moradores']): ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-group"></i> Moradores</h3>
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
                            foreach ($data['moradores'] as $mo) {
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
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['ex_moradores'] as $exmo) {
                                echo '<tr>';
                                echo "<td><img src=\"{$exmo['pessoa_foto']}\" class=\"img-circle profilefoto\"</td>
                              <td><a href=\"PessoaFisica/visualizar/{$exmo['cd_pessoa_fisica']}\">{$exmo['pessoa']}</a></td>
                              <td>{$exmo['m_end_dt_entrada']}</td>
                              <td>{$exmo['m_end_dt_saida']}</td>";
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