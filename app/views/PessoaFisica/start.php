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

            <?php
            if (Session::exists('fail')) {
                Session::flash('fail');
            }
            ?>

            <div class="col-md-3">
                <a href="PessoaFisica/formpessoafisica/" class="btn btn-default btn-block">
                    <i class="text-info fa fa-plus-square fa-2x pull-left"></i>
                        <span class="lead">Novo</span>
                </a>
            </div>

            <div class="col-md-3">
                <a href="PessoaFisica/Pesquisa/" class="btn btn-default btn-block">
                    <i class="text-info fa fa-search fa-2x pull-left"></i>
                        <span class="lead">Pesquisa</span>
                </a>
            </div>

            <div class="col-md-3">
                <a href="PessoaFisica/formpessoafisica/" class="btn btn-default btn-block">
                    <i class="text-info fa fa-plus-square fa-2x pull-left"></i>
                        <span class="lead">Novo</span>
                </a>
                </div>

                <div class="col-md-3">
                    <a href="PessoaFisica/formpessoafisica/" class="btn btn-default btn-block">
                        <i class="text-info fa fa-plus-square fa-2x pull-left"></i>
                            <span class="lead">Novo</span>
                    </a>
                </div>

        </div>
    </div>
</div>