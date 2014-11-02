<?php
$condominio = $data['condominio'];
$setores = $data['setores'];
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
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-body">
                    <img class="img-circle profilefoto center-block"
                         src="<?php echo $condominio['im_perfil']; ?>">
                </div>
                <div>
                    <dl class="dl-horizontal">

                        <dt>Nome</dt>
                        <dd><?php echo $condominio['nm_condominio']; ?></dd>
                        <dt>Rua</dt>
                        <dd><?php echo $condominio['rua']; ?></dd>
                        <dt>Número</dt>
                        <dd><?php echo $condominio['numero']; ?></dd>
                        <dt>Bairro</dt>
                        <dd><?php echo $condominio['bairro']; ?></dd>
                        <dt>Cidade</dt>
                        <dd><?php echo $condominio['cidade']; ?></dd>
                        <dt>Estado</dt>
                        <dd><?php echo $condominio['estado']; ?></dd>
                    </dl>
                </div>

            </div>
        </div>
        <div class="well">
            <a class="btn btn-primary btn-sm"
               href="Condominio/formcondominio/<?php echo $condominio['cd_condominio']; ?>">
                <span class="fa fa-edit"></span> Editar</a>

            <a class="btn btn-warning btn-sm"
               href="Condominio/confirmDelete/<?php echo $condominio['cd_condominio']; ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>
        </div>
    </div>

    <div class="col-sm-6">
        <?php if ($setores): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Setores</h3></div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Observação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach($setores as $setor) {
                            echo "
                    <tr>
                        <td><img src=\"{$setor['im_perfil']}\" class=\"img-circle profilefoto\"></td>
                        <td><a href=\"Setor/visualizar/{$setor['cd_setor']}\">{$setor['nm_setor']}</a></td>
                        <td>{$setor['observacao']}</a></td>
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