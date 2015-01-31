<?php
$con = Database::getConnection();
$stmt = $con->prepare('
    SELECT p.*, m.*
    FROM tb_morador_endereco m
    JOIN tb_pessoa_fisica p ON (p.cd_pessoa_fisica = m.cd_pessoa_fisica)
    WHERE m.dt_saida IS NULL;
');
$stmt->execute();

var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

?>
<!-- NAO DELETAR DESTA LINHA PRA BAIXO -->


<div class="container">
    <div class="perfil-header" id="content">
        <h1>Components</h1>

        <p>Over a dozen reusable components built to provide iconography, dropdowns, input groups, navigation, alerts,
            and much more.</p>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="legend">Testes</div>
            <?php
            $nome ='MARILZA DOS REIS SORRENTINO';
            echo ucwords(strtolower($nome));

            ?>
        </div>
    </div>
</div>
