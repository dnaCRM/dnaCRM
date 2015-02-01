<div class="container">
<?php
$pessoa_id = 3;
$queryString = <<< SQL
SELECT *
FROM vs_pf_array_dados
WHERE cd_pessoa_fisica = {$pessoa_id};
SQL;

$con = Database::getConnection();
$stmt = $con->prepare($queryString);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo count($result);
var_dump(is_int($pessoa_id));
var_dump($result);

?>
</div>
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
