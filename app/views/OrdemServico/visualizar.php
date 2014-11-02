<?php
$ordem_servico = $data['ordem_servico'];
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

<!--Teste de Perfil-->
<div class="row">
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-body">
                <ul class="list-group">
                <?php
                echo "
                    <li class=\"list-group-item\"><span class=\"lead\">Assunto: </span>{$ordem_servico['desc_assunto']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Descricao: </span>{$ordem_servico['desc_ordem_servico']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Status: </span>{$ordem_servico['estagio']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Inicio: </span>{$ordem_servico['dt_inicio']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Fim: </span>{$ordem_servico['dt_fim']}</li>
                ";
                ?>
                </ul>
            </div>
                <div class="well">

                    <a class="btn btn-primary btn-sm"
                       href="OrdemServico/formOrdemServico/<?php echo $ordem_servico['cd_ordem_servico']; ?>">
                        <span class="fa fa-edit"></span> Editar</a>

                    <a class="btn btn-warning btn-sm"
                       href="OrdemServico/confirmDelete/<?php echo $ordem_servico['cd_ordem_servico']; ?>">
                        <span class="fa fa-trash-o"></span> Deletar</a>

                </div>

        </div>
    </div>

    <div class="col-sm-6">


        <div class="panel profile-card pcard-lg">
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
        <div class="panel profile-card">
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
    </div>
</div>