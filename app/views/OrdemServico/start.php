<!--
 * Created by PhpStorm.
 * User: Raul
 * Date: 14/10/14
 * Time: 00:47
 */
 -->
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
                <th>Assunto</th>
                <th>Descriçao</th>
                <th>Data</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($data['list'] as $perfil) {
                $dt_inicio = new DateTime($perfil->getDtInicio());
                $perfil->setDtInicio($dt_inicio->format('d/m/Y'));
                echo '<tr>';
                echo '<td><a href="OrdemServico/visualizar/' . $perfil->getCdOrdemServico() . '">' . $perfil->getDescAssunto() . '</a></td>';
                echo '<td>' . $perfil->getDescOrdemServico() . '</td>';
                echo '<td>' . $perfil->getDtInicio() . '</td>';
                echo '</tr>';

            }
            //var_dump($data['list'][1]);
            ?>
            </tbody>
        </table>
    </div>
</div>