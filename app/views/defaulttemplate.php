<!DOCTYPE html>
<html lang="pt-br">
<head>
    <noscript>
        <meta http-equiv="Refresh" content="1; url=noscript.php">
    </noscript>
    <!--        Guarda endereço padrão dos arquivos para ser usado com URLs relativas-->
    <base href="<?php echo SITE_URL; ?>" target="_self"/>
    <meta charset="utf-8">
    <title><?php echo APP_NAME . ' - ' . (isset($data['pagetitle']) ? $data['pagetitle'] : ''); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" href="css/paper.css" media="screen">
    <link rel="stylesheet" href="js/datatables/css/jquery.dataTables.min.css" media="screen">
    <link rel="stylesheet" href="js/datatables/css/dataTables.bootstrap.css" media="screen">
    <link rel="stylesheet" href="js/datatables/css/dataTables.responsive.css" media="screen">

    <link rel="stylesheet" href="css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css"/>

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/custom_paper.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="menu">
<!-- top-bar start -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <button class="slide-bar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="Home" class="navbar-brand"><?php echo APP_NAME; ?></a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <i class="fa  fa-angle-double-down"></i>

            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Perfis <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="PessoaFisica">Pessoa Física</a></li>
                        <li><a href="PessoaJuridica">Pessoa Juridica</a></li>
                        <li class="divider"></li>
                        <li><a href="Apartamento">Apartamento</a></li>
                        <li><a href="Setor">Setor</a></li>
                        <li><a href="Condominio">Condomínio</a></li>
                        <li class="divider"></li>
                        <li><a href="OrdemServico">Ordens de Serviço</a></li>
                        <li><a href="Ocorrencia">Ocorrência</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="novoscadastros">Novo<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="novoscadastros">
                        <li><a href="PessoaFisica/formperfil">Pessoa Fisica</a></li>
                        <li><a href="PessoaJuridica/formperfil">Pessoa Juridica</a></li>
                        <li class="divider"></li>
                        <li><a href="Apartamento/formapartamento">Apartamento</a></li>
                        <li><a href="Setor/formSetor">Setor</a></li>
                        <li><a href="Condominio/formcondominio">Condominio</a></li>
                        <li class="divider"></li>
                        <li><a href="Ocorrencia/formOcorrencia">Ocorrência</a></li>
                        <li><a href="OrdemServico/formOrdemServico">Ordem de Serviço</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="sobre">Sobre <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="sobre">
                        <li><a href="#">Guia</a></li>
                        <li><a href="#">Manual</a></li>
                        <li class="divider"></li>
                        <li><a href="Home/help">Help</a></li>
                    </ul>
                </li>
            </ul>

            <!-- INÍCIO FORMULÁRIO DE PESQUISA -->
            <form class="navbar-form navbar-left dropdown" id="nav-top-form-busca">
                <input type="text" class="form-control col-lg-8" id="pessoa_1" name="pessoa_1" placeholder="Buscar Pessoa" autocomplete="off" data-toggle="busca">
                <div id="area-do-resultado" class="dropdown-busca list-group" aria-labelledby="busca"></div>
            </form>
            <!-- FIM FORMULÁRIO DE PESQUISA -->

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a><i class="glyphicon glyphicon-user"></i>
                        <span><?php echo(Session::exists('usuario') ? Session::get('usuario') : 'Usuário'); ?></span></a>

                </li>
            </ul>

        </div>
    </div>
</div>
<!-- top-bar end -->

<!--         <button class="slide-bar-toggle" type="button" style="position: absolute;top:50px;">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>-->

<nav class="menu-side"><!-- side-bar start -->

    <div class="usuario-panel clearfix">
        <div class="pull-left image">
            <img src="img/uploads/tb_pessoa_fisica/<?php echo Session::get('user'); ?>.jpg" class="img-circle">
        </div>
        <div class="pull-left info">
            <p><?php echo Session::get('usuario'); ?></p>

            <a href="Usuario/logoff"><i class="fa fa-circle text-danger"></i> Sair</a>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="/dnacrm">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="Relatorios">
                <i class="fa fa-file-text-o"></i> <span>Relatorios</span>
                <small class="badge pull-right bg-green">new</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Perfis</span>
                <i class="fa pull-right fa-angle-left"></i>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="PessoaFisica/"><i class="fa fa-angle-double-right"></i>Pessoa Física</a></li>
                <li><a href="PessoaJuridica/"><i class="fa fa-angle-double-right"></i> Pessoa Jurídica</a></li>
                <li><a href="Condominio/"><i class="fa fa-angle-double-right"></i> Condomínio</a></li>
                <li><a href="Apartamento/"><i class="fa fa-angle-double-right"></i> Apartamento</a></li>
                <li><a href="Setor/"><i class="fa fa-angle-double-right"></i> Setor</a></li>
                <li><a href="OrdemServico/"><i class="fa fa-angle-double-right"></i> Ordem de Servico</a></li>
                <li><a href="Ocorrencia/"><i class="fa fa-angle-double-right"></i> Ocorrência</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-database"></i>
                <span>Cadastrar</span>
                <i class="fa pull-right fa-angle-left"></i>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="PessoaFisica/formperfil"><i class="fa fa-angle-double-right"></i> Pessoa Física</a></li>
                <li><a href="PessoaJuridica/formperfil"><i class="fa fa-angle-double-right"></i> Pessoa Jurídica</a>
                </li>
                <li><a href="Setor/formSetor"><i class="fa fa-angle-double-right"></i> Setores</a></li>
                <li><a href="Condominio/formcondominio"><i class="fa fa-angle-double-right"></i> Condomínio</a></li>
                <li><a href="Apartamento/formapartamento"><i class="fa fa-angle-double-right"></i> Apartamento</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Registrar</span>
                <i class="fa pull-right fa-angle-left"></i>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="Ocorrencia/formOcorrencia"><i class="fa fa-angle-double-right"></i> Ocorrência</a></li>
                <li><a href="OrdemServico/formOrdemServico"><i class="fa fa-angle-double-right"></i> Ordem de
                        Serviço</a></li>
                <li><a href="Orcamento/formorcamento"><i class="fa fa-angle-double-right"></i> Orçamento</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa pull-right fa-angle-left"></i>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="../tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                <li><a href="../tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
            </ul>
        </li>
        <li>
            <a href="Agenda">
                <i class="fa fa-calendar"></i> <span>Agenda</span>
                <small class="badge pull-right bg-red">3</small>
            </a>
        </li>
        <li>
            <a href="Mensagens">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="badge pull-right bg-yellow">12</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-eye"></i> <span>Admin</span>
                <i class="fa pull-right fa-angle-left"></i>
            </a>
            <ul class="treeview-menu" style="display: none;">
                <li><a href="Usuario"><i class="fa fa-angle-double-right"></i> Usuários</a></li>
                <!--<li><a href="User/updateUser/<?php /*echo Session::get('user'); */ ?>"><i class="fa fa-angle-double-right"></i> Atualzar dados</a></li>-->

                <li><a href="Usuario/logoff"><i class="fa fa-angle-double-right"></i> Logoff</a></li>
            </ul>
        </li>
    </ul>

</nav>
<!-- side-bar end -->

<div class="container"><!-- container start -->

    <?php require_once($this->viewfile); ?>

</div>
<!-- container end -->

<div class="container">

    <footer>

        <hr>
        <p>Desenvolvedores:<br>
            <a href="https://github.com/inshideru" rel="nofollow">Vinicius Sorrentino</a>. Contato <a
                href="mailto:inshideru@gmail.com">inshideru@gmail.com</a>,
            <a href="https://github.com/gabrielborc" rel="nofollow">Gabriel Borges</a>. Contato <a
                href="mailto:gabrielborc@gmail.com">gabrielborc@gmail.com</a>,
            <a href="https://github.com/demartinezraul" rel="nofollow">Raul Martinez</a>. Contato <a
                href="mailto:demartinez.raul@gmail.com">demartinezraul@gmail.com</a>.</p>

        <p><span class="fa fa-github"></span> <a href="https://github.com/dnaCRM">GitHub </a>.<br>
            Código sob licença <a href="">MIT</a></p>

        <p>Front-end baseado no <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Ícones <a
                href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts
            do <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>

    </footer>

    <div class="well-lg">
        <?php
        echo "Tempo de execução = " . xdebug_time_index() ;
        echo " // ";
        echo "Máximo de Memória usada: ". xdebug_peak_memory_usage() . " bytes\n";
        echo " // ";
        echo xdebug_get_function_count() . " funções executadas.";
        ?>
    </div>

</div>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/bootstrapValidator.min.js"></script>
<script src="js/language/pt_BR.js" type="text/javascript"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/datatables/js/jquery.dataTables.js"></script>
<script src="js/datatables/js/dataTables.bootstrap.js"></script>
<script src="js/datatables/js/dataTables.responsive.min.js"></script>
<script src="js/custom.js"></script>

<a id="toTop" href="#"><span id="toTopHover"></span><img width="45" height="45" alt="" src="img/to-top.png"></a>

</body>
</html>
