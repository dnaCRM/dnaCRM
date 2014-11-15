<div class="container">
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header"><?php echo $data['pagetitle']; ?>
            <small>
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </small>

            <!-- Botões de administração -->
                <span class="btn-panel pull-right">
                <a href="PessoaFisica/formperfil/<?php echo $data['dados_pessoais']['cd_pessoa_fisica']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Editar Perfil!"
                   class="btn btn-primary btn-circle btn-lg">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="PessoaFisica/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-default btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
                <a href="PessoaFisica/confirmDelete/<?php echo $data['dados_pessoais']['cd_pessoa_fisica']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Deletar!"
                   class="btn btn-warning btn-circle btn-lg">
                    <i class="fa fa-trash-o"></i>
                </a>
                <a href="Usuario/formuser/<?php echo $data['dados_pessoais']['cd_pessoa_fisica']; ?>"
                   data-toggle="tooltip" data-placement="top" title="Cadastrar Usuário!"
                   class="btn btn-info btn-circle btn-lg">
                    <i class="fa fa-user"></i>
                </a>
            </span>
            <!-- Fim Botões de administração -->

        </h3>


    </div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-body">
                <img class="img-circle profilefoto center-block"
                     src="<?php echo $data['dados_pessoais']['im_perfil']; ?>">
            </div>
            <div>
                <dl class="dl-horizontal">

                    <dt>Nome</dt>
                    <dd><?php echo $data['dados_pessoais']['nm_pessoa_fisica']; ?></dd>
                    <dt>E-mail</dt>
                    <dd><?php echo $data['dados_pessoais']['email']; ?></dd>
                    <dt>CPF</dt>
                    <dd><?php echo $data['dados_pessoais']['cpf']; ?></dd>
                    <dt>RG</dt>
                    <dd><?php echo $data['dados_pessoais']['rg'] . "-" . $data['dados_pessoais']['uf']; ?></dd>
                    <dt>Data de Nascimento</dt>
                    <dd><?php echo $data['dados_pessoais']['dt_nascimento']; ?></dd>
                    <dt>Idade</dt>
                    <dd><?php echo $data['dados_pessoais']['idade']; ?></dd>
                    <dt>Gênero</dt>
                    <dd><?php echo $data['dados_pessoais']['ie_sexo']; ?></dd>
                    <?php if ($data['dados_pessoais']['cd_pessoa_juridica']): ?>
                        <dt>Onde Trabalha</dt>
                        <dd>
                            <a href="PessoaJuridica/visualizar/<?php echo $data['dados_pessoais']['cd_pessoa_juridica']; ?>"><?php echo $data['dados_pessoais']['empresa']; ?></a>
                        </dd>
                    <?php endif; ?>
                    <?php if ($data['dados_pessoais']['profissao']): ?>
                        <dt>Profissão</dt>
                        <dd><?php echo $data['dados_pessoais']['profissao']; ?></dd>
                    <?php endif; ?>
                    <?php if ($data['dados_pessoais']['ie_estuda'] == 'Sim'): ?>
                        <dt>Estuda</dt>
                        <dd><?php echo $data['dados_pessoais']['ie_estuda']; ?></dd>
                        <dt>Instituicao</dt>
                        <dd><?php echo $data['dados_pessoais']['instituicao']; ?></dd>
                        <dt>Curso</dt>
                        <dd><?php echo $data['dados_pessoais']['grau']; ?></dd>
                        <dt>Início</dt>
                        <dd><?php echo $data['dados_pessoais']['dt_inicio_curso']; ?></dd>
                        <dt>Término</dt>
                        <dd><?php echo $data['dados_pessoais']['dt_fim_curso']; ?></dd>
                    <?php endif; ?>

                </dl>
            </div>

        </div>
    </div>

    <?php if ($data['os_solicitadas']): ?>
        <div class="panel">
            <div class="panel-body">
                <div class="legend"><i class="fa fa-wrench"></i> Ordens de Serviço Solicitadas</div>
                <!--            <div class="panel-heading">
                                <h3 class="panel-title">Ordens de Serviço Solicitadas</h3>
                            </div>
                -->
                <!--<div class="panel-body">-->
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nº da OS</th>
                        <th>Assunto</th>
                        <th>Status</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($data['os_solicitadas'] as $os) {
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
    <?php endif; ?>

    <?php if ($data['os_executadas']): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-wrench"></i> Ordens de Serviço Executadas</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nº da OS</th>
                        <th>Assunto</th>
                        <th>Status</th>
                        <th>Inicio</th>
                        <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($data['os_executadas'] as $os_ex) {
                        echo "
                    <tr>
                        <td>{$os_ex['cd_ordem_servico']}</td>
                        <td><a href=\"OrdemServico/visualizar/{$os_ex['cd_ordem_servico']}\">{$os_ex['desc_assunto']}</a></td>
                        <td>{$os_ex['estagio']}</td>
                        <td>{$os_ex['dt_inicio']}</td>
                        <td>{$os_ex['dt_fim']}</td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($data['ocorrencias']): ?>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-asterisk"></i> Ocorrências envolvidas</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Assunto</th>
                        <th>Informante</th>
                        <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($data['ocorrencias'] as $oc) {
                        echo "
                    <tr>
                        <td>{$oc['dt_ocorrencia']}</td>
                        <td><a href=\"Ocorrencia/visualizar/{$oc['cd_ocorrencia']}\">{$oc['desc_assunto']}</a></td>
                        <td>{$oc['informante']}</td>
                        <td>{$oc['dt_fim']}</td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($data['oc_informadas']): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-asterisk"></i> Ocorrências Informadas</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Assunto</th>
                        <th>Informante</th>
                        <th>Fim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($data['oc_informadas'] as $oc_i) {
                        echo "
                    <tr>
                        <td>{$oc_i['dt_ocorrencia']}</td>
                        <td><a href=\"Ocorrencia/visualizar/{$oc_i['cd_ocorrencia']}\">{$oc_i['desc_assunto']}</a></td>
                        <td>{$oc_i['informante']}</td>
                        <td>{$oc_i['dt_fim']}</td>
                    </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="col-sm-6">

    <?php if ($data['relacionados']): ?>
        <div class="panel panel-info">

            <div class="panel-heading">
                <h6 class="panel-title"><i class="fa fa-group"></i> Perfis Relacionados</h6>
            </div>
            <div class="panel-body">
                <?php
                foreach ($data['relacionados'] as $relacionado) {

                    echo "
                    <div class=\"profile-card pcard-md\">
                        <div class=\"panel-body\">
                        <div class=\"profile-card-foto-container\">
                            <img class=\"img-circle profilefoto\" src=\"{$relacionado['pessoa2_foto']}\">
                        </div>
                            <div class=\"pcard-name\"><a href=\"PessoaFisica/visualizar/{$relacionado['cd_pessoa_fisica_2']}\">{$relacionado['pessoa2_nome']}</a>
                            <div class=\"pcard-info\">
                                {$relacionado['relac']}<br>
                                    <span class=\"fa fa-envelope\"></span> <span class=\"text-info\">{$relacionado['pessoa2_email']}</span>
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
                <h3 class="panel-title"><i class="fa fa-phone-square"></i> Telefones</h3>
                <!-- classe 'panel-collapsed' para inicializar fechado -->
                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
            </div>
            <!-- style="display: none;" para inicializar fechado -->
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Operadora</th>
                        <th>Categoria</th>
                        <th>Observação</th>
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil-square"></i> Endereços</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
            </div>
            <div class="list-group panel-body">
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
        </div>
    <?php endif; ?>

    <?php if ($data['morador_enderecos']): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-building-o"></i> Moradias</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
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
                    foreach ($data['morador_enderecos'] as $me) {
                        echo '<tr>';
                        echo "<td><a href=\"Apartamento/visualizar/{$me['cd_apartamento']}\">{$me['apartamento']}</a></td>
                              <td><a href=\"Setor/visualizar/{$me['cd_setor']}\">{$me['setor']}</a></td>
                              <td><a href=\"Condominio/visualizar/{$me['cd_condominio']}\">{$me['condominio']}</a></td>
                              <td>{$me['m_end_dt_entrada']}</td>
                              <td>{$me['m_end_dt_saida']}</td>";
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