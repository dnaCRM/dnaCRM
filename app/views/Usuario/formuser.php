<?php

$user = new Usuario();
$user->setAtualizar($data['atualizar']);
$user->salvarUsuario();
$perfil = $data['perfil'];
$usuario = $data['usuario'];

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header"><?php echo(isset($data['pagetitle']) ? $data['pagetitle'] : ""); ?>
                <small>
                    <?php echo (isset($data['pagesubtitle'])) ? $data['pagesubtitle'] : ""; ?>
                </small>
                <span class="btn-panel pull-right">
                <a href="Usuario/" data-toggle="tooltip" data-placement="top" title="Ver Lista!"
                   class="btn btn-circle btn-lg">
                    <i class="fa fa-list"></i>
                </a>
            </span>
            </h3>
        </div>
    </div>

    <div class="row">

        <?php if (($userDados['nivel'] == 1) || ($userDados['cd_usuario'] == $perfil->getCdPessoaFisica())): ?>
        <!--Formulário de Cadastro-->
        <form id="cadastro_usuario" class="form-horizontal" method="post" action="">
            <fieldset>
                <div class="col-md-3">
                    <img class="img-circle profilefoto center-block"
                         src="<?php echo $data['perfil']->getImPerfil(); ?>">
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                   value="<?php echo $usuario->getLogin() ?
                                       $usuario->getLogin() : escape(Input::get('usuario')); ?>"
                                   placeholder="Usuário" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="senha" name="senha" value=""
                                   placeholder="Senha" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha"
                                   value="" placeholder="Confirme a senha" autocomplete="off">
                        </div>
                    </div>

                    <input type="hidden" id="user_perfil_id" name="id_perfil" value="<?php echo $perfil->getCdPessoaFisica(); ?>">

                    <?php if ($userDados['nivel'] == 1): ?>
                        <!-- Somente administradores podem alterar status e nível de acesso -->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select class="form-control" name="nivel">
                                    <option value="">Escolha um nível</option>
                                    <?php
                                    $usuario->setNivel($usuario->getNivel() == '' ? Input::get('nivel') : $usuario->getNivel());
                                    foreach ($data['niveis'] as $chave => $descricao) {
                                        if ($chave == $usuario->getNivel()) {
                                            echo '<option value="' . $chave . '" selected>' . $descricao . '</option>';
                                        } else {
                                            echo '<option value="' . $chave . ' ">' . $descricao . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="btn-group" data-toggle="buttons">
                                    <label
                                        class="btn btn-default control-label<?php echo (($usuario->getIeStatus()) == 'A' || Input::get('ie_status') == 'A') ? ' active' : ''; ?>">
                                        <input type="radio" name="ie_status"
                                               value="A" <?php echo (($usuario->getIeStatus()) == 'A' || Input::get('ie_status') == 'A') ? 'checked' : ''; ?>/>
                                        Ativo
                                    </label>
                                    <label
                                        class="btn btn-default control-label<?php echo (($usuario->getIeStatus()) == 'I' || Input::get('ie_status') == 'I') ? ' active' : ''; ?>">
                                        <input type="radio" name="ie_status"
                                               value="I" <?php echo (($usuario->getIeStatus()) == 'I' || Input::get('ie_status') == 'I') ? 'checked' : ''; ?>/>
                                        Inativo
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="reset" name="cancelar" class="btn btn-info"><span
                                    class="fa fa-recycle"></span> Limpar
                            </button>
                            <button type="submit" name="cadastrar" class="btn btn-primary"><span
                                    class="fa fa-save"></span> Cadastrar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-warning">

                        <div class="panel-heading">
                            <h5 class="panel-title"><i class="fa fa-arrow-right"></i> Algumas instruções</h5>
                        </div>

                        <div class="panel-body">
                            Algumas instruções e recomendações para o correto preenchimento do formulário
                        </div>

                        <div class="panel-footer">

                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-10">
                <div class="alert  alert-danger">
                    <h4>Aviso!</h4>

                    <p>Você não tem permissão para alterar informações deste usuário.<br><a href="/" class="alert-link">Voltar
                            para o início</a>.</p>
                </div>
            </div>
        </div>

    <?php
    endif; ?>
</div>
<div id="responseAjaxError"></div>