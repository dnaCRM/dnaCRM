<div class="row">
    <div class="col-lg-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Alguma coisa!
            </p>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <?php
        if (Session::exists('fail')) {
            Session::flash('fail');
        }
        ?>

        <table id="perfillist" class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($data['list'] as $apartamento) {

                echo '<tr>';
                echo '<td><a href=Apartamento/visualizar/' . $apartamento->getCdApartamento() . '>'
                    . $apartamento->getCdApartamento() . '</a></td>';
                // RESOLVER ESSE PROBLEMA DE ID PARA NOME DE SETOR;
                echo '<td>' . $apartamento->getDescApartamento() . '</td>';
                echo '</tr>';

            }
            //var_dump($data['list'][1]);
            ?>
            </tbody>
        </table>
    </div>
</div>