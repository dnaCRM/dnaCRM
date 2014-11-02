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
                    <li class=\"list-group-item\"><span class=\"lead\">Assunto: </span>{$ocorrencia['desc_assunto']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Descricao: </span>{$ocorrencia['desc_ocorrencia']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Status: </span>{$ocorrencia['estagio']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Inicio: </span>{$ocorrencia['dt_ocorrencia']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Fim: </span>{$ocorrencia['dt_fim']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Conclusão: </span>{$ocorrencia['desc_conclusao']}</li>
                    <li class=\"list-group-item\"><span class=\"lead\">Setor: </span>
                    <a href=\"Setor/visualizar/{$ocorrencia['cd_setor']}\">{$ocorrencia['setor']}</a></li>
                    <li class=\"list-group-item\"><span class=\"lead\">Condomínio: </span>
                    <a href=\"Condominio/visualizar/{$ocorrencia['cd_condominio']}\">{$ocorrencia['condominio']}</a></li>
                    <li class=\"list-group-item\"><span class=\"lead\">Informante: </span>
                    <a href=\"Setor/visualizar/{$ocorrencia['cd_pf_informante']}\">{$ocorrencia['informante']}</a></li>
                ";
                    ?>
                </ul>
            </div>
            <div class="well">

                <a class="btn btn-primary btn-sm"
                   href="Ocorrencia/formOcorrencia/<?php echo $ocorrencia['cd_ocorrencia']; ?>">
                    <span class="fa fa-edit"></span> Editar</a>

                <a class="btn btn-warning btn-sm"
                   href="Ocorrencia/confirmDelete/<?php echo $ocorrencia['cd_ocorrencia']; ?>">
                    <span class="fa fa-trash-o"></span> Deletar</a>

            </div>

        </div>
    </div>

    <div class="col-sm-6">
        <?php
        var_dump($pessoas, $ocorrencia);
        ?>
    </div>
</div>
