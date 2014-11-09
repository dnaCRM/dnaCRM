<?php
$ocorrencia = $data['ocorrencia'];
$pessoas = $data['pessoas'];
?>
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small>
            <!-- Botões de administração -->
                <span class="btn-panel pull-right">
                <a href="Ocorrencia/formOcorrencia/<?php echo $ocorrencia['cd_ocorrencia']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Ocorrência!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="Ocorrencia/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                <a href="Ocorrencia/confirmDelete/<?php echo $ocorrencia['cd_ocorrencia']; ?>"
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
        <div class="legend">Assunto:</div>
        <p><?php echo $ocorrencia['desc_assunto']; ?></p>

        <div class="legend">Descrição:</div>
        <p><?php echo $ocorrencia['desc_ocorrencia']; ?></p>

        <div class="legend">Conclusão:</div>
        <p><?php echo $ocorrencia['desc_conclusao']; ?></p>


        <div class="panel">
            <div class="panel-body">
                <div class="list-group">
                    <?php
                    echo "
                    <div class=\"list-group-item col-md-6\"><span class=\"lead\">Setor: </span>
                    <a href=\"Setor/visualizar/{$ocorrencia['cd_setor']}\">{$ocorrencia['setor']}</a></div>
                    <div class=\"list-group-item col-md-6\"><span class=\"lead\">Condomínio: </span>
                    <a href=\"Condominio/visualizar/{$ocorrencia['cd_condominio']}\">{$ocorrencia['condominio']}</a></div>
                    <div class=\"list-group-item col-md-6\"><span class=\"lead\">Status: </span>{$ocorrencia['estagio']}</div>
                    <div class=\"list-group-item col-md-6\"><span class=\"lead\">Tipo: </span>{$ocorrencia['tipo']}</div>
                    <div class=\"list-group-item col-md-6\"><span class=\"lead\">Inicio: </span>{$ocorrencia['dt_ocorrencia']}</div>
                    <div class=\"list-group-item col-md-6\"><span class=\"lead\">Fim: </span>{$ocorrencia['dt_fim']}</div>
                ";
                    ?>
                </div>
            </div>

        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel profile-card pcard-lg">
            <div class="panel-body">
                <?php
                echo "
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$ocorrencia['informante_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\">
                    <a href=\"PessoaFisica/visualizar/{$ocorrencia['cd_pf_informante']}\">{$ocorrencia['informante']}</a>
                     <div class=\"pcard-info\">
                    Informante
                    </div>
                    </div>
                    ";

                ?>
            </div>
        </div>

        <?php if ($data['pessoas']): ?>
            <div class="panel panel-warning">

                <div class="panel-heading">
                    <h6 class="panel-title"><i class="fa fa-group"></i> Pessoas Envolvidas</h6>
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($data['pessoas'] as $pessoa) {

                        echo "
                    <div class=\"profile-card pcard-md\">
                        <div class=\"panel-body\">
                        <div class=\"profile-card-foto-container\">
                            <img class=\"img-circle profilefoto\" src=\"{$pessoa['foto']}\">
                        </div>
                            <div class=\"pcard-name\"><a href=\"PessoaFisica/visualizar/{$pessoa['id']}\">{$pessoa['nome']}</a>
                            <div class=\"pcard-info\">
                                    <span class=\"fa fa-envelope\"></span> <span class=\"text-info\">{$pessoa['email']}</span>.
                            </div>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
