<?php
$apartamento = $data['apartamento'];
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
    <div class="col-md-6">
        <div class="well">

            <a class="btn btn-primary btn-sm"
               href="Apartamento/formapartamento/<?php echo $apartamento['cd_apartamento']; ?>">
                <span class="fa fa-edit"></span> Editar</a>

            <a class="btn btn-warning btn-sm"
               href="Apartamento/confirmDelete/<?php echo $apartamento['cd_apartamento']; ?>">
                <span class="fa fa-trash-o"></span> Deletar</a>


        </div>
        <div class="legend">Localização</div>
        <div class="panel profile-card pcard-lg">
            <div class="panel-body">
                <?php
                echo "
                    <div class=\"profile-card-foto-container\">
                        <img src=\"{$apartamento['condo_foto']}\" class=\"img-circle profilefoto foto-md\">
                    </div>
                    <div class=\"pcard-name\"><a href=\"Condominio/visualizar/{$apartamento['cd_condominio']}\">Condomínio
                    {$apartamento['condominio']}</a>
                     <div class=\"pcard-info\"><a href=\"Setor/visualizar/{$apartamento['cd_setor']}\">
                    {$apartamento['setor']}</a>
                    </div>
                    </div>
                    ";

                ?>
            </div>
        </div>

    </div>

    <div class="col-sm-6">
        <?php if ($data['moradores']): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Moradores</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Entrada</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data['moradores'] as $mo) {
                        echo '<tr>';
                        echo "<td><img src=\"{$mo['pessoa_foto']}\" class=\"img-circle profilefoto\"</td>
                              <td><a href=\"PessoaFisica/visualizar/{$mo['cd_pessoa_fisica']}\">{$mo['pessoa']}</a></td>
                              <td>{$mo['m_end_dt_entrada']}</td>";
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($data['ex_moradores']): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Ex-Moradores</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data['ex_moradores'] as $exmo) {
                        echo '<tr>';
                        echo "<td><img src=\"{$exmo['pessoa_foto']}\" class=\"img-circle profilefoto\"</td>
                              <td><a href=\"PessoaFisica/visualizar/{$exmo['cd_pessoa_fisica']}\">{$exmo['pessoa']}</a></td>
                              <td>{$exmo['m_end_dt_entrada']}</td>
                              <td>{$exmo['m_end_dt_saida']}</td>";
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