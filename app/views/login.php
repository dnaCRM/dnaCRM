<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!--        Guarda endereço padrão dos arquivos para ser usado com URLs relativas-->
        <base href="<?php echo SITE_URL; ?>" target="_self"/>
        <meta charset="utf-8">
        <title>dnaCRM - <?php echo (isset($data['pagetitle']) ? $data['pagetitle'] : ''); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css" media="screen">

        <link rel="stylesheet" href="css/bootstrapValidator.min.css"/>
        
<!--        Pendente remover necessidade deste arquivo-->
        <link rel="stylesheet" href="css/bootswatch.css">
        
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/custom.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <div class="container">


        <?php require($this->viewfile); ?>



    </div> <!-- /container -->

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>
    <script src="js/language/pt_BR.js"></script>
    <script src="js/jquery.inputmask.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
    <script src="js/custom.js"></script>

    </body>
</html>
