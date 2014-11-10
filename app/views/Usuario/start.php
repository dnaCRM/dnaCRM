<?php
$usuarios = $data['list'];
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?>
                <small>
                    <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
                </small>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <?php
            if (Session::exists('fail')) {
                echo Session::flash('fail');
            }
            ?>

            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Pessoa</th>
                    <th>Login</th>
                    <th>Cadastrado</th>
                    <th>Atualizado</th>
                    <th>Grupo</th>
                    <th>Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($usuarios as $usuario) {

                    echo '<tr>';
                    echo '<td><img src="' . $usuario['foto'] . '" class="img-circle profilefoto"></td>';
                    echo '<td><a href="PessoaFisica/visualizar/' . $usuario['cd_usuario'] . '">' . $usuario['nome'] . '</a></td>';
                    echo '<td>' . $usuario['login'] . '</td>';
                    echo '<td>' . $usuario['dt_usuario_criacao'] . '</td>';
                    echo '<td>' . $usuario['dt_usuario_atualiza'] . '</td>';
                    echo '<td>' . $usuario['nivel'] . '</td>';
                    echo "<td><a href=\"Usuario/formuser/{$usuario['cd_usuario']}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"fa fa-edit\"></i></a></td>";
                    echo '</tr>';

                }
                //var_dump($data['list'][0]);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>