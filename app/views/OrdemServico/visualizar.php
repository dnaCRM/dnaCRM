<?php
$ordem_servico = $data['ordem_servico'];
?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small>
            <!-- Botões de administração -->
                <span class="btn-panel pull-right">
                <a href="OrdemServico/formOrdemServico/<?php echo $ordem_servico['cd_ordem_servico']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Ordem de Serviço!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="OrdemServico/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                <a href="OrdemServico/confirmDelete/<?php echo $ordem_servico['cd_ordem_servico']; ?>"
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

    <div class="col-sm-6">
        <div class="panel profile-card pcard-md">
            <div class="panel-body">
                <?php
                echo "
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$ordem_servico['solicitante_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\">
                    <a href=\"PessoaFisica/visualizar/{$ordem_servico['cd_pf_solicitante']}\">{$ordem_servico['solicitante']}</a>
                     <div class=\"pcard-info\">
                    Solicitante
                    </div>
                    </div>
                    ";

                ?>
            </div>
        </div>
        <div class="panel profile-card pcard-sm">
            <div class="panel-body">
                <?php
                echo "
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$ordem_servico['executor_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\">
                    <a href=\"PessoaFisica/visualizar/{$ordem_servico['cd_pf_executor']}\">{$ordem_servico['executor']}</a>
                     <div class=\"pcard-info\">
                    Executor
                    </div>
                    </div>
                    ";

                ?>
            </div>
        </div>


        <div class="panel">
            <div class="panel-body">

                <div class="list-group">
                    <?php
                    if ($ordem_servico['cd_ocorrencia']) {
                    echo "<div class=\"list-group-item col-md-12\">
                            <span class=\"lead\">Ocorrência Relacionada: </span>
                            <a href=\"Ocorrencia/visualizar/{$ordem_servico['cd_ocorrencia']}\">{$ordem_servico['desc_ocorrencia']}</a></div>";
                    }
                    echo "
                <div class=\"list-group-item col-md-6\"><span class=\"lead\">Status: </span>{$ordem_servico['estagio']}</div>
                <div class=\"list-group-item col-md-6\"><span class=\"lead\">Tipo: </span>{$ordem_servico['tipo']}</div>
                <div class=\"list-group-item col-md-6\"><span class=\"lead\">Inicio: </span>{$ordem_servico['dt_inicio']}</div>
                <div class=\"list-group-item col-md-6\"><span class=\"lead\">Fim: </span>{$ordem_servico['dt_fim']}</div>
            ";
                    ?>
                </div>


            </div>

        </div>

    </div>

    <div class="col-sm-6">
        <div class="legend">Assunto:</div>
        <p><?php echo $ordem_servico['desc_assunto']; ?></p>

        <div class="legend">Descrição:</div>
        <p><?php echo $ordem_servico['desc_ordem_servico']; ?></p>

        <div class="legend">Conclusão:</div>
        <p><?php echo $ordem_servico['desc_conclusao']; ?></p>

    </div>
</div>