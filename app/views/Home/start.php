<div class="row">
    <div class="col-lg-6">
        <h1><?php echo $data['pagetitle']; ?></h1>

        <p class="lead">
            Olá, <?php echo (isset($data['name'])) ? $data['name'] : ""; ?>!
        </p>
        <?php

        if (Session::exists('fail')) {
            Session::flash('fail');
        }
        if (Session::exists('msg')) {
            Session::flash('msg');
        }

        ?>
    </div>
    <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            Well, well...
            <p>
                <a href="#" data-toggle="modal" data-target="#novoPFModal">
                    Nova Pessoa Física.
                </a>
            </p>

        </div>
    </div>
</div>

<div class="row">
<div class="col-lg-6">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <i class="fa fa-spinner fa-spin"></i> Último Perfil Cadastrado
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php

                    $perfil = new PessoaFisicaDAO();
                    $ultimo_perfil = $perfil->fullList()[0];

                    echo '<img src="' . $ultimo_perfil->getImPerfil() . '" class="img-circle profilefoto">';
                    echo '<div class="well">';
                    echo '<strong>Nome:</strong> ' . $ultimo_perfil->getNmPessoaFisica() . '<br>';
                    echo '<strong>E-mail:</strong> ' . $ultimo_perfil->getEmail() . '<br>';
                    echo '</div>';
                    //var_dump($ultimo_perfil);
                    ?>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <i class="fa fa-android"></i> Collapsible Item
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                    coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                    anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                    of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <i class="glyphicon glyphicon-leaf"></i> Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                    coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                    anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                    occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard
                    of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">

    <div class="">
        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Profile</a></li>
            <li class="disabled"><a>Disabled</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li class=""><a href="#dropdown1" data-toggle="tab">Action</a></li>
                    <li class="divider"></li>
                    <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
                </ul>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                    retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                    Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure
                    terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan
                    american apparel, butcher voluptate nisi qui.</p>


                <p>$_POST</p>
                <?php var_dump($_POST); ?>
                <p>$_SESSION</p>
                <?php var_dump($_SESSION); ?>
                <p>$_GLOBALS['config']</p>
                <?php var_dump($GLOBALS['config']); ?>
            </div>
            <div class="tab-pane fade" id="profile">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four
                    loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                    aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                    aesthetic magna delectus mollit.</p>
                <?php var_dump($ultimo_perfil); ?>
            </div>
            <div class="tab-pane fade" id="dropdown1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo
                    retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft
                    beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR
                    banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>

            </div>
            <div class="tab-pane fade" id="dropdown2">
                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out
                    master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan
                    DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia
                    PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="novoPFModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Fechar</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadastrar Pessoa Física</h4>
            </div>
            <div class="modal-body">

                <div class="col-sm-12">
                    <span></span id="ajax_response">

                    <form class="form-horizontal" method="post" action="" id="pessoafisicaform">

                        <div class="form-group">
                            <label for="nome" class="col-lg-2 control-label">Nome:</label>

                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="nome" name="nm_pessoa_fisica" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-2 control-label">E-mail:</label>

                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="email" name="email" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpf" class="col-lg-2 control-label">CPF:</label>

                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="cpf" name="cpf" value=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rg" class="col-lg-2 control-label">RG:</label>

                            <div class="col-lg-10">
                                <input class="form-control" type="text" id="rg" name="rg" value=""/>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-lg-4 inputGroupContainer" id="datetimepicker">
                                <label for="dt_nascimento" class="col-lg-2 control-label">Nascimento</label>

                                <div>
                                    <input type="text" class="form-control"
                                           value=""
                                           id="dt_nascimento"
                                           name="dt_nascimento" placeholder="___/___/____">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="btn-group pull-right" data-toggle="buttons">
                                <label
                                    class="btn btn-default control-label">
                                    <input type="radio" name="ie_sexo"
                                           value="m"/>
                                    Masculino
                                </label>
                                <label
                                    class="btn btn-default control-label">
                                    <input type="radio" name="ie_sexo"
                                           value="f"/>
                                    Feminino
                                </label>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary col-xs-offset-2" name="enviar" value="Enviar"/>
                    </form>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>