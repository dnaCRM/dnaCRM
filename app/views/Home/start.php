<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?>
                <small>
                    Olá, <?php echo $data['pagesubtitle']; ?>!
                </small>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="panel">
                <div class="panel-body">
                    <div class="legend"><i class="fa fa-group"></i> Últimas Pessoas Cadastradas</div>

                    <?php
                    foreach ($data['utimas_pessoas_cadastradas'] as $ultimos_cad) {

                        echo "
                            <div class=\"circle-perfil pull-left\">
                                <div class=\"\">
                                <img class=\"img-circle profilefoto foto-md\" src=\"{$ultimos_cad['foto']}\">
                                </div>
                                <div class=\"circle-perffil-nome\">
                                <a href=\"PessoaFisica/visualizar/{$ultimos_cad['id']}\">{$ultimos_cad['nome']}</a>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <div class="legend"><i class="fa fa-calendar"></i> Aniversariantes do Mês</div>

                    <?php
                    foreach ($data['aniversariantes_do_mes'] as $aniversariante) {
                        $dia = substr($aniversariante['nascimento'],0,2);
                        echo "
                            <div class=\"circle-perfil pull-left\">
                                <div class=\"\">
                                <img class=\"img-circle profilefoto foto-md\" src=\"{$aniversariante['foto']}\">
                                </div>
                                <div class=\"circle-perffil-nome\">
                                <a href=\"PessoaFisica/visualizar/{$aniversariante['id']}\">{$aniversariante['nome']}</a>
                                <br><i class=\"fa fa-birthday-cake\"></i> Dia {$dia}
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <div class="legend"><i class="fa fa-hand-o-right"></i> Últimas Ocorrências</div>
                    <!--            <div class="panel-heading">
                                    <h3 class="panel-title">Ordens de Serviço Solicitadas</h3>
                                </div>
                    -->
                    <!--<div class="panel-body">-->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Assunto</th>
                            <th>Data</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($data['utimas_ocorrencias'] as $oc) {
                            echo "
                    <tr>
                        <td>{$oc['cd_ocorrencia']}</td>
                        <td><a href=\"Ocorrencia/visualizar/{$oc['cd_ocorrencia']}\">{$oc['desc_assunto']}</a></td>
                        <td>{$oc['dt_ocorrencia']}</td>
                    </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- </div>-->
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="legend"><i class="fa fa-wrench"></i> Últimas Ordens de Serviço</div>
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

                        foreach ($data['utimas_ordens_servico'] as $os) {
                            echo "
                    <tr>
                        <td>{$os['cd_ordem_servico']}</td>
                        <td><a href=\"OrdemServico/visualizar/{$os['cd_ordem_servico']}\">{$os['desc_assunto']}</a></td>
                        <td>{$os['estagio']}</td>
                        <td>{$os['dt_inicio']}</td>
                        <td>{$os['dt_fim']}</td>
                    </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
