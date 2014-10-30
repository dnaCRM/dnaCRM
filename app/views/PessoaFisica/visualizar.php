<?php
$dadosPessoais = $data['dados_pessoais'];
$telefones = $data['telefones'];
$enderecos = $data['enderecos'];
$moradorEnderecos = $data['morador_enderecos'];
$ordensSolicitadas = $data['os_solicitadas'];
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
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-body">
                <img class="img-circle profilefoto center-block"
                     src="<?php echo $dadosPessoais['im_perfil']; ?>">
                </div>
                <div>
                    <dl class="dl-horizontal">

                        <dt>Nome</dt>
                        <dd><?php echo $dadosPessoais['nm_pessoa_fisica']; ?></dd>
                        <dt>E-mail</dt>
                        <dt>CPF</dt>
                        <dd><?php echo $dadosPessoais['cpf']; ?></dd>
                        <dt>RG</dt>
                        <dd><?php echo $dadosPessoais['rg'] ."-".$dadosPessoais['uf']; ?></dd>
                        <dd><?php echo $dadosPessoais['email']; ?></dd>
                        <dt>Data de Nascimento</dt>
                        <dd><?php echo $dadosPessoais['dt_nascimento']; ?></dd>
                        <dt>Data de Sexo</dt>
                        <dd><?php echo $dadosPessoais['ie_sexo']; ?></dd>
                        <dt>Onde Trabalha</dt>
                        <dd><?php echo $dadosPessoais['empresa']; ?></dd>
                        <dt>Profissão</dt>
                        <dd><?php echo $dadosPessoais['profissao']; ?></dd>
                        <dt>Estuda</dt>
                        <dd><?php echo $dadosPessoais['ie_estuda']; ?></dd>
                        <dt>Instituicao</dt>
                        <dd><?php echo $dadosPessoais['instituicao']; ?></dd>
                        <dt>Nível escolar</dt>
                        <dd><?php echo $dadosPessoais['grau']; ?></dd>

                    </dl>
                </div>

            </div>
        </div>

        <!-- Botões de administração -->
        <div class="panel panel-default">
            <div class="panel-body">
                <a class="btn btn-primary btn-sm"
                   href="PessoaFisica/formperfil/<?php echo $dadosPessoais['cd_pessoa_fisica']; ?>">
                    <span class="fa fa-edit"></span> Editar</a>

                <a class="btn btn-warning btn-sm"
                   href="PessoaFisica/confirmDelete/<?php echo $dadosPessoais['cd_pessoa_fisica']; ?>">
                    <span class="fa fa-trash-o"></span> Deletar</a>
                <a class="btn btn-info btn-sm"
                   href="Usuario/formuser/<?php echo $dadosPessoais['cd_pessoa_fisica']; ?>">
                    <span class="fa fa-user"></span> Cadastrar Usuário</a>
            </div>
        </div>
        <!-- Fim Botões de administração -->

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Ordens de Serviço Solicitadas</h3></div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nº da OS</th>
                        <th>Assunto</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php

                foreach($ordensSolicitadas as $os) {
                    echo "
                    <tr>
                        <td>{$os['cd_ordem_servico']}</td>
                        <td><a href=\"OrdemServico/visualizar/{$os['cd_ordem_servico']}\">{$os['desc_assunto']}</a></td>
                        <td>{$os['dt_inicio']}</td>
                        <td>{$os['dt_fim']}</td>
                    </tr>";
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
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
                    foreach ($telefones as $telefone) {
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

        <div class="list-group">
            <h6 class="list-group-item active">Endereços</h6>
            <?php
            foreach ($enderecos as $endereco) {
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

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Moradias</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Apt</th>
                        <th>Setor</th>
                        <th>Condomínio</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($moradorEnderecos as $me) {
                        echo '<tr>';
                        echo "<td>{$me['apartamento']}</td>
                              <td>{$me['setor']}</td>
                              <td>{$me['condominio']}</td>
                              <td>{$me['m_end_dt_entrada']}</td>
                              <td>{$me['m_end_dt_saida']}</td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>

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
                            <i class="glyphicon glyphicon-user"></i> $dadosPessoais
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php

                        var_dump($dadosPessoais);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>