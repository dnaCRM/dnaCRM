<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $data['pagetitle']; ?></h3>

            <p class="lead">
                <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-4">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label" for="pesquisa-pf">Pesquisar Pessoa Física</label>

                        <div class="input-group">
                            <input type="text" name="pessoa_1" class="form-control" id="pesquisa-pf">
                            <span class="input-group-btn">
                      <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </span>
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                        </div>
                    </div>
                </form>
            </div>


            <?php if (isset($data['list'])) : ?>

                <table id="perfillist" class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Profissão</th>
                        <th>Empresa</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    foreach ($data['list'] as $perfil) {

                        echo '<tr>';
                        echo '<td><img src="' . $perfil['im_perfil'] . '" class="img-circle" title="' . $perfil['cd_pessoa_fisica'] . '"></td>';
                        echo '<td><a href="PessoaFisica/visualizar/' . $perfil['cd_pessoa_fisica'] . '">' . $perfil['nm_pessoa_fisica'] . '</a></td>';
                        echo '<td>' . $perfil['profissao'] . '</td>';
                        echo '<td>' . $perfil['empresa'] . '</td>';
                        echo "<td><a href=\"PessoaFisica/formpessoafisica/{$perfil['cd_pessoa_fisica']}\" class=\"btn btn-primary btn-circle btn-md\" role=\"button\">
                    <i class=\"glyphicon glyphicon-pencil\"></i></a></td>";
                        echo '</tr>';

                    }
                    ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>