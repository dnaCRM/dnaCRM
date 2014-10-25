<div class="row">
    <div class="col-sm-6">
        <h3><?php echo $data['pagetitle']; ?></h3>

        <p class="lead">
            <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
        </p>
    </div>
    <div class="col-sm-6" style="padding: 15px 15px 0 15px;">
        <div class="well">

            <p>
                Alguma coisa!
            </p>

        </div>
    </div>
</div>

<div class="row col-sm-12">
    <?php
    $perfil = $data['perfil'];
    $perfil_form = new PessoaFisica();
    $perfil_form->cadastra($perfil); //Não cadastra na entra pois ainda não tem Token

    if (Session::exists('sucesso_salvar_pf')) {
        Session::flash('sucesso_salvar_pf');
    }

    ?>

    <form class="form-horizontal" id="pfformnovo">
        <fieldset>
            <legend>Cadastro</legend>

            <div class="col-sm-5 text-left">
                <div class="form-group">
                    <div class="col-sm-5">
                        <label for="im_perfil" class="btn btn-default control-label">Escolher Foto</label><br>
                        <input type="file" class="hidden" id="im_perfil" name="im_perfil">
                    </div>
                </div>

                <img class="img-circle profilefoto"
                     src="<?php echo($perfil->getImPerfil() ? $perfil->getImPerfil() : 'img/uploads/icon-user.jpg'); ?>">
            </div>

            <div class="col-sm-7">
                <div class="form-group">
                    <label for="nome" class="control-label">Nome</label>

                    <div>
                        <input class="form-control" type="text" id="nome" name="nm_pessoa_fisica" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">E-mail</label>

                    <div>
                        <input class="form-control" type="text" id="email" name="email" value=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="cpf" class="control-label">CPF</label>

                        <div>
                            <input class="form-control" type="text" id="cpf" name="cpf" value=""
                                   placeholder="000.000.000-00"/>
                        </div>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="rg" class="control-label">RG</label>

                        <div class="">
                            <input class="form-control" type="text" id="rg" name="rg" value=""
                                   placeholder="0.000.000-XX"/>
                        </div>
                    </div>

                    <div class="form-group col-sm-4">

                        <div id="datetimepicker">
                            <label for="nascimento" class="control-label">Nascimento</label>

                            <div>
                                <input type="text" class="form-control"
                                       value=""
                                       id="nascimento"
                                       name="dt_nascimento" placeholder="___/___/____">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-9">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default">
                                    <input type="radio" name="ie_sexo" value="m"/>Masculino
                                </label>
                                <label class="btn btn-default">
                                    <input type="radio" name="ie_sexo" value="f"/>Feminino
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 text-right">
                    <input type="submit" class="btn btn-primary" name="enviar" value="Salvar"/>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"
                </div>
            </div>
        </fieldset>
    </form>


</div>