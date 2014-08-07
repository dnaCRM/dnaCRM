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


<!--Teste de Insert-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Dump 1
                        </a>
                    </h4>
                </div>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php

                    //$cadastra = new Insert;
                    $dados = [
                        'nome' => 'Vinicius',
                        'email' => 'vinicius@sorrentino.com',
                        'tel_fixo' => '4534-3464',
                        'tel_cel' => '93455-3878',
                        'obs' => 'Tatsumakisenpuukyakuu!',
                        'data_atualizado' => (new DateTime())->format('Y-m-d H:i:s')
                    ];

                    //$cadastra->sqlInsert('pessoa', $dados);

                    //if ($cadastra->getResultado()) {
                    //    echo "Cadastro {$cadastra->getResultado()} efetuado com sucesso<hr>";
                    //}
                    //var_dump($dados, $cadastra);
                    $link = DB::getInstance();
                    //$dbc = DB::getInstance()->insert('pessoa', $dados);
                    //$dbc = DB::getInstance()->update('pessoa', '10', $dados);
                    //$dbc = DB::getInstance()->delete('pessoa', "id='1'");
                    $dbc = $link->select('pessoa', 'id < 11', null, null, 'data_atualizado DESC');
                    var_dump($dbc, DB::getInstance()->getNumRegistros());
                    //var_dump($link->get('pessoa', 'id > 3')->getNumRegistros());
                    ?>
            </div>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Dump 1
                        </a>
                    </h4>
                </div>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php
                        var_dump($link->get('pessoa', 'id > 3')->getNumRegistros());
                    ?>
            </div>
        </div>
    </div>

</div>

<!--Teste de DateTime-->
<div class="row">
    <?php
        $locale = setlocale(LC_ALL, "ptb");//, "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        date_default_timezone_set('America/Sao_Paulo');

        try
        {
            $DateTime = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
            echo (new DateTime())->format('Y-m-d H:i:s');
        }
        catch(Exception $e)
        {
            echo 'Erro ao instanciar objeto.';
            echo $e->getMessage();
            exit();
        }

        echo '<hr>' . $locale . '<hr>';

        echo $DateTime->format( "d/m/Y H:i:s" ) . '<br>';
        echo $DateTime->format( "Y-m-d H:i:s" ) . '<br>';
        echo $DateTime->format( "Y/m/d H:i:s" ) . '<br>';
        echo $DateTime->format('l jS \of F Y h:i:s A') . '<br>';

        var_dump($DateTime);


        $data = date('D');
        $mes = date('M');
        $dia = date('d');
        $ano = date('Y');

        $semana = array(
            'Sun' => 'Domingo',
            'Mon' => 'Segunda-Feira',
            'Tue' => 'Terca-Feira',
            'Wed' => 'Quarta-Feira',
            'Thu' => 'Quinta-Feira',
            'Fri' => 'Sexta-Feira',
            'Sat' => 'Sábado'
        );

        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );

        echo $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";

        ?>
</div>

<!--Teste de Form-->
<div class="row">
    <div class="col-lg-6">


        <form class="form-horizontal" method="post" action="">
            <fieldset>
                <legend>Cadastro</legend>
                <div class="form-group">
                    <label for="nome" class="col-lg-2 control-label">Nome</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
                    </div>
                </div><div class="form-group">
                    <label for="tel_fixo" class="col-lg-2 control-label">Telefone Fixo</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" id="email" name="tel_fixo" placeholder="00 0000-0000" required="required">
                    </div>
                </div><div class="form-group">
                    <label for="tel_cel" class="col-lg-2 control-label">Celular</label>
                    <div class="col-lg-10">
                        <input type="tel" class="form-control" id="tel_cel" name="tel_cel" placeholder="00 00000-0000" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="obs" class="col-lg-2 control-label">Textarea</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
                        <span class="help-block">Uma breve descrição qualquer.</span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button name="limpar" class="btn btn-default">Limpar</button>
                        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

</div>