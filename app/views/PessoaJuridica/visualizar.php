<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-body">
                    <img class="img-circle profilefoto center-block"
                         src="<?php echo $data['dados_cadastrais']['im_perfil']; ?>">
                </div>
                <div>
                    <dl class="dl-horizontal">
                        <dt>Nome</dt>
                        <dd><?php echo $data['dados_cadastrais']['nm_fantasia']; ?></dd>
                        <dt>Email</dt>
                        <dd><?php echo $data['dados_cadastrais']['email']; ?></dd>
                        <dt>Razão Social</dt>
                        <dd><?php echo $data['dados_cadastrais']['desc_razao']; ?></dd>
                        <dt>CNPJ</dt>
                        <dd><?php echo $data['dados_cadastrais']['cnpj']; ?></dd>
                        <dt>Ramo de Atividade</dt>
                        <dd><?php echo $data['dados_cadastrais']['desc_atividade']; ?></dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <a class="btn btn-primary btn-sm"
                   href="PessoaJuridica/formperfil/<?php echo $data['dados_cadastrais']['cd_pessoa_juridica']; ?>">
                    <span class="fa fa-edit"></span> Editar</a>

                <a class="btn btn-warning btn-sm"
                   href="PessoaJuridica/confirmDelete/<?php echo $data['dados_cadastrais']['cd_pessoa_juridica']; ?>">
                    <span class="fa fa-trash-o"></span> Deletar</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php if ($data['empregados']): ?>
        <div class="panel panel-info">

            <div class="panel-heading">
                <h6 class="panel-title">Funcionários</h6>
            </div>
            <div class="panel-body">
                <?php
                foreach ($data['empregados'] as $empregado) {

                    echo "
                    <div class=\"profile-card pcard-md\">
                        <div class=\"panel-body\">
                        <div class=\"profile-card-foto-container\">
                            <img class=\"img-circle profilefoto\" src=\"{$empregado['im_perfil']}\">
                        </div>
                            <div class=\"pcard-name\"><a href=\"PessoaFisica/visualizar/{$empregado['cd_pessoa_fisica']}\">{$empregado['nm_pessoa_fisica']}</a>
                            <div class=\"pcard-info\">
                                {$empregado['email']}<br>
                                    <span class=\"fa fa-user\"></span> <span class=\"text-info\">{$empregado['profissao']}</span>.
                            </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($data['telefones']): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Telefones</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Operadora</th>
                        <th>Categoria</th>
                        <th>Observacao</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach ($data['telefones'] as $telefone) {
                        echo '<tr>';
                        echo "<td>{$telefone['fone']}</td>
                              <td>{$telefone['operadora']}</td>
                              <td>{$telefone['categoria']}</td>
                              <td>{$telefone['observacao']}</td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($data['enderecos']): ?>
        <div class="list-group">
            <h6 class="list-group-item active">Endereços</h6>
            <?php
            foreach ($data['enderecos'] as $endereco) {
                echo "<div class=\"list-group-item\">
                        <h5 class=\"list-group-heading\">{$endereco['categoria']}</h5>
                        <p class=\"\">
                            {$endereco['rua']}, nº {$endereco['numero']}, {$endereco['bairro']}, {$endereco['cidade']}, {$endereco['estado']}, CEP: {$endereco['cep']}.
                                    <br><span class=\"badge\">Obs:</span> <span class=\"text-info\">{$endereco['observacao']}</span>.
                        </p>
                    </div>";
            }
            ?>
        </div>
        <?php endif; ?>

        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            $_POST
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($_POST);

                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            $_SESSION
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($_SESSION);

                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <i class="glyphicon glyphicon-leaf"></i> $data
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($data);

                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            <i class="glyphicon glyphicon-user"></i> $dadosCadastrais
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($data['dados_cadastrais']);

                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>