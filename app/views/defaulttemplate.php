<?php

if (Session::exists('user')) {
    $userDados = (new UsuarioModel())->getUserDados(Session::get('user'));
}
?>
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
                        <li><a href="PessoaFisica">Pessoas</a></li>
                        <li><a href="PessoaJuridica">Empresas</a></li>
                        <li class="divider"></li>
                        <li><a href="Apartamento">Apartamentos</a></li>
                        <li><a href="Setor">Setores</a></li>
                        <li><a href="Condominio">Condomínios</a></li>
                        <li><a href="InstituicaoEnsino">Instituições de Ensino</a></li>
                        <li class="divider"></li>
                        <li><a href="Ocorrencia">Ocorrência</a></li>
                        <li><a href="OrdemServico">Ordens de Serviço</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="novoscadastros">Novo<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="novoscadastros">
                        <li><a href="PessoaFisica/formpessoafisica">Pessoa Fisica</a></li>
                        <li><a href="PessoaJuridica/formpessoajuridica">Pessoa Juridica</a></li>
                        <li class="divider"></li>
                        <li><a href="Setor/formSetor">Setor</a></li>
                        <li class="divider"></li>
                        <li><a href="Ocorrencia/formOcorrencia">Ocorrência</a></li>
                        <li><a href="OrdemServico/formOrdemServico">Ordem de Serviço</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="sobre">Help <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="sobre">
                        <li><a href="#">Guia</a></li>
                        <li><a href="#">Manual</a></li>
                        <li class="divider"></li>
                        <li><a href="#" data-toggle="modal" data-target="#modalSobre">Sobre</a></li>
                    </ul>
                </li>
            </ul>

            <!-- INÍCIO FORMULÁRIO DE PESQUISA -->
            <form action="PessoaFisica/Pesquisa" class="navbar-form navbar-left dropdown" id="nav-top-form-busca"
                  method="post">
                <input type="text" class="form-control col-lg-8" id="pessoa_1" name="pessoa_1"
                       placeholder="Buscar Pessoa" autocomplete="off" data-toggle="busca">

                <div id="area-do-resultado" class="dropdown-busca list-group" aria-labelledby="busca"></div>
            </form>
            <!-- FIM FORMULÁRIO DE PESQUISA -->

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="PessoaFisica/visualizar/<?php echo $userDados['cd_usuario']; ?>"><i
                            class="glyphicon glyphicon-user"></i>
                        <span><?php echo $userDados['login']; ?></span></a>

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
            <img src="<?php echo $userDados['foto']; ?>" class="img-circle">
        </div>
        <div class="pull-left info">
            <p>
                <a href="PessoaFisica/visualizar/<?php echo $userDados['cd_usuario']; ?>"><?php echo $userDados['login']; ?></a>
            </p>

            <a href="Usuario/logoff"><i class="fa fa-circle text-danger"></i> Sair</a>
        </div>
    </div>

    <ul class="sidebar-menu">
        <?php if ($userDados['nivel'] == 1): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-eye"></i> <span>Admin</span>
                    <i class="fa pull-right fa-angle-left"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="Usuario"><i class="fa fa-angle-double-right"></i> Usuários</a></li>
                </ul>
            </li>
        <?php endif; ?>
        <li>
            <a href="/dnacrm">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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
                <li><a href="PessoaFisica/formpessoafisica"><i class="fa fa-angle-double-right"></i> Pessoa Física</a>
                </li>
                <li><a href="PessoaJuridica/formpessoajuridica"><i class="fa fa-angle-double-right"></i> Pessoa Jurídica</a>
                </li>
                <li><a href="Setor/formSetor"><i class="fa fa-angle-double-right"></i> Setores</a></li>
                <li><a href="Apartamento/formapartamento"><i class="fa fa-angle-double-right"></i> Apartamento</a></li>
                <li><a href="CadastrosAuxiliares"><i class="fa fa-angle-double-right"></i> Cadastros Auxiliares</a></li>
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
            </ul>
        </li>
    </ul>

</nav>
<!-- side-bar end -->

<!-- container start -->


<?php require_once($this->viewfile); ?>


<!-- container end -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/bootstrapValidator.min.js"></script>
<script src="js/language/pt_BR.js" type="text/javascript"></script>
<script src="js/jquery.mask.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/datatables/js/dataTables.bootstrap.js"></script>
<script src="js/datatables/js/dataTables.responsive.min.js"></script>
<script src="js/custom.js"></script>
<?php
JavaScriptLoader::load();
?>

<a id="toTop" href="#"><span id="toTopHover"></span><img width="45" height="45" alt="" src="img/to-top.png"></a>

<div id="responseAjaxError"></div>

<footer class="footer">
    <div class="container">
        <div class="text-muted">
            <img src="img/dna_icon_magenta.png"> <a href="#" data-toggle="modal" data-target="#modalSobre">dnaCRM
                <small>v<?php echo Config::get('versao'); ?></small>
            </a>
        </div>
    </div>

</footer>


</body>


<!-- Modal Sobre -->
<div class="modal fade in" id="modalSobre" tabindex="-1" role="dialog" aria-labelledby="modalSobre"
     aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                        class="sr-only">Fechar</span></button>

                <span class="modal-title" id=""></span>

            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="profile-card pcard-md">
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <img src="img/dna_m_big.png" class="img-responsive"></div>
                                <div class="pcard-name">
                                    <h2>
                                        dnaCRM
                                    </h2>
                                    <small>Gestão de Relacionamento com Clientes para Condomínios</small>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right"><?php echo Config::get('versao'); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="legend">Desenvolvedores</span>

                            <div class="profile-card pcard-md">
                                <div class="panel-body">
                                    <div class="profile-card-foto-container"><img
                                            src="img/gabrielborc.jpg"
                                            class="img-circle profilefoto foto-md"></div>
                                    <div class="pcard-name">Gabriel Borges Chiarelo
                                        <div class="pcard-info"><a href="mailto:gabrielborc@gmail.com"><i
                                                    class="fa fa-envelope"></i> gabrielborc@gmail.com</a></div>
                                        <div class="pcard-info text-info">
                                            <a href="https://github.com/gabrielborc" target="_blank">
                                                <i class="fa fa-github"></i>
                                                github.com/gabrielborc</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-card pcard-md">
                                <div class="panel-body">
                                    <div class="profile-card-foto-container"><img
                                            src="img/paulosorrentino.jpg"
                                            class="img-circle profilefoto foto-md"></div>
                                    <div class="pcard-name">Paulo Vinicius Pacheco Sorrentino
                                        <div class="pcard-info"><a href="mailto:inshideru@gmail.com"><i
                                                    class="fa fa-envelope"></i> inshideru@gmail.com</a></div>
                                        <div class="pcard-info text-info">
                                            <a href="https://github.com/inshideru" target="_blank">
                                                <i class="fa fa-github"></i>
                                                github.com/inshideru</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-card pcard-md">
                                <div class="panel-body">
                                    <div class="profile-card-foto-container"><img
                                            src="img/raulmartinez.jpg"
                                            class="img-circle profilefoto foto-md"></div>
                                    <div class="pcard-name">Raul Ramos Martinez
                                        <div class="pcard-info text-primary">
                                            <a href="mailto:demartinezraul@gmail.com">
                                                <i class="fa fa-envelope"></i> demartinezraul@gmail.com</a></div>
                                        <div class="pcard-info text-info">
                                            <a href="https://github.com/demartinezraul" target="_blank">
                                                <i class="fa fa-github"></i>
                                                github.com/demartinezraul</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="legend">Info</div>
                            <strong>Repositório:</strong><br>
                            <a href="https://github.com/dnaCRM/dnaCRM" target="_blank">
                                <i class="fa fa-github"></i>
                                github.com/dnaCRM/dnaCRM</a>
                            <br>
                            Código sob licença <a href="http://pt.wikipedia.org/wiki/Licen%C3%A7a_MIT" target="_blank">MIT</a>
                            - 2014
                            <br><br>

                            <strong>Site de Demonstração:</strong>
                            <br><a href="http://dnacrm-tisi.rhcloud.com/" target="_blank">
                                <i class="fa fa-link"></i>
                                dnacrm-tisi.rhcloud.com/</a>
                            <br><i class="fa fa-user"></i> Usuário: convidado
                            <br><i class="fa fa-lock"></i> Senha: 123456

                            <br><br>Front-end baseado no <a href="http://getbootstrap.com" target="_blank">Bootstrap</a>.
                            Ícones <a
                                href="http://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a>. Web
                            fonts
                            do <a href="http://www.google.com/webfonts" target="_blank">Google</a>.
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
</html>
