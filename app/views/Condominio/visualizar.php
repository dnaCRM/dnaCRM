<?php
$condominio = $data['condominio'];
$setores = $data['setores'];
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
                <a href="PessoaJuridica/formpessoajuridica/<?php echo $condominio['cd_pessoa_juridica']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Condominio!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="Condominio/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                    <?php if ($userDados['nivel'] == 1): ?>
                        <a href="PessoaJuridica/confirmDelete/<?php echo $condominio['cd_pessoa_juridica']; ?>"
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-body">
                        <img class="img-circle profilefoto center-block"
                             src="<?php echo $condominio['im_perfil']; ?>">
                    </div>
                    <div>
                        <dl class="dl-horizontal">

                            <dt>Nome</dt>
                            <dd><?php echo $condominio['nm_fantasia']; ?></dd>
                        </dl>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
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

                            foreach ($setores as $setor) {
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
</div>