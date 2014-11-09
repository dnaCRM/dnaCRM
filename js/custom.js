// * SIDEBAR MENU
// * ------------
// * This is a custom plugin for the sidebar menu. It provides a tree view.
// *
// * Usage:
// * $(".sidebar).tree();
// *
// * Note: This plugin does not accept any options. Instead, it only requires a class
// *       added to the element that contains a sub-menu.
// *
// * When used with the sidebar, for example, it would look something like this:
// * <ul class='sidebar-menu'>
// *      <li class="treeview active">
// *          <a href="#>Menu</a>
// *          <ul class='treeview-menu'>
// *              <li class='active'><a href=#>Level 1</a></li>
// *          </ul>
// *      </li>
// * </ul>
// *
// * Add .active class to <li> elements if you want the menu to be open automatically
// * on page load. See above for an example.
// */
(function ($) {
    "use strict";

    $.fn.tree = function () {

        return this.each(function () {
            var btn = $(this).children("a").first();
            var menu = $(this).children(".treeview-menu").first();
            var isActive = $(this).hasClass('active');

            //initialize already active menus
            if (isActive) {
                menu.show();
                btn.children(".fa-angle-left").first().removeClass("fa-angle-left").addClass("fa-angle-down");
            }
            //Slide open or close the menu on link click
            btn.click(function (e) {
                e.preventDefault();
                if (isActive) {
                    //Slide up to close menu
                    menu.slideUp();
                    isActive = false;
                    btn.children(".fa-angle-down").first().removeClass("fa-angle-down").addClass("fa-angle-left");
                    btn.parent("li").removeClass("active");
                } else {
                    //Slide down to open menu
                    menu.slideDown();
                    isActive = true;
                    btn.children(".fa-angle-left").first().removeClass("fa-angle-left").addClass("fa-angle-down");
                    btn.parent("li").addClass("active");
                }
            });

            /* Add margins to submenu elements to give it a tree look */
            menu.find("li > a").each(function () {
                var pad = parseInt($(this).css("margin-left")) + 10;

                $(this).css({"margin-left": pad + "px"});
            });

        });

    };


}(jQuery));

$(".sidebar-menu .treeview").tree();

(function () {
    var body = $('body');
    $('.slide-bar-toggle').bind('click', function () {
        body.toggleClass('menu-open');
        return false;
    });
})();

//CKEditores
CKEDITOR.replace('descricao', {
    toolbar: [
        //{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
        //'/',																					// Line break - next group will be placed in new line.
        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
        { name: 'others', items: [ '-' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    ]
});
CKEDITOR.replace('desc_conclusao', {
    toolbar: [
        //{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
        //'/',																					// Line break - next group will be placed in new line.
        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
        { name: 'others', items: [ '-' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    ]
}););

/** Collapsible panel */
jQuery(function ($) {
    $('.panel-heading span.clickable').on("click", function (e) {
        if ($(this).hasClass('panel-collapsed')) {
            // expand the panel
            $(this).parents('.panel').find('.panel-body').slideDown();
            $(this).removeClass('panel-collapsed');
            $(this).find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
        else {
            // collapse the panel
            $(this).parents('.panel').find('.panel-body').slideUp();
            $(this).addClass('panel-collapsed');
            $(this).find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }
    });
});

$(document).ready(function () {

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('#toTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 400);
        return false;
    });

});

/* Ativar tooltips */
$(function () {
    $("[data-toggle='tooltip']").tooltip();
});

/* DataTables */
$('#perfillist').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    responsive: true
});

$('#tb_pf_telefonesll').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    scrollY: 200,
    paging: false,
    "searching": false
});

$('#tb_pj_telefonesll').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    scrollY: 200,
    paging: false,
    "searching": false
});

/** Função para configuração do plugin de máscara para telefones com '9' opcional no início*/
var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

$(document).ready(function () {
    $('#cpf').mask("999.999.999-99");
    $('#cnpj').mask("99.999.999/9999-99");
    $('.fones').mask(SPMaskBehavior, spOptions);
    $('.data-input').mask("99/99/9999");
    $('#cep').mask("99999-999");
    $('#numero').mask("99999999");
});


$('#pessoafisicaform').bootstrapValidator({
    excluded: ':disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        ie_sexo: {
            validators: {
                notEmpty: {
                    message: 'Gênero é obrigatório'
                }
            }
        },
        nm_pessoa_fisica: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'Quantidade de caracteres invalida.'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                emailAddress: {
                    message: 'E-mail inválido'
                }
            }
        },
        cpf: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 14,
                    max: 14,
                    message: 'Quantidade de caracteres invalida.'
                }
            }
        },
        rg: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'Quantidade de caracteres invalida.'
                }
            }
        },
        dt_nascimento: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        },
        im_perfil: {
            validators: {
                file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
                    /*maxSize: 2048 * 1024,   // 2 MB*/
                    message: 'O arquivo selecionado não é válido. Apenas aquivos .jpg são permitidos.'
                }
            }
        }
    }
});

$('#cadastro_usuario').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        usuario: {
            validators: {
                notEmpty: {
                    message: 'Nome de usuário é obrigatório.'
                },
                different: {
                    field: 'senha',
                    message: 'Nome de usuário deve ser diferente da senha'
                },
                stringLength: {
                    min: 5,
                    max: 14,
                    message: 'Nome de usuário deve ter entre 5 em 14 caracteres.'
                }
            }
        },
        senha: {
            validators: {
                notEmpty: {
                    message: 'Senha é obrigatória'
                },
                different: {
                    field: 'usuario',
                    message: 'Senha deve ser diferente do nome de usuário'
                },
                stringLength: {
                    min: 6,
                    message: 'Senha deve ter no mínimo 6 caracteres.'
                }
            }
        },
        confirmar_senha: {
            validators: {
                notEmpty: {
                    message: 'Confirmação de senha obrigatória.'
                },
                identical: {
                    field: 'senha',
                    message: 'O valor informado deve ser igual a senha informada.'
                }
            }
        },
        nivel: {
            validators: {
                notEmpty: {
                    message: 'Escolha um nível de acesso.'
                }
            }
        },
        ie_status: {
            validators: {
                notEmpty: {
                    message: 'Defina um status.'
                }
            }
        }
    }
});

$('#pessoajuridicaform').bootstrapValidator({
    excluded: ':disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        nm_fantasia: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 2,
                    message: 'Mínimo 2 caracteres.'
                }
            }
        },
        desc_razao: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                }
            },
            stringLength: {
                min: 5,
                message: 'Mínimo 5 caracteres.'
            }
        },
        email: {
            validators: {
                emailAddress: {
                    message: 'E-mail inválido'
                }
            }
        },
        cnpj: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 18,
                    max: 18,
                    message: 'Quantidade de caracteres invalida.'
                }
            }
        },
        im_perfil: {
            validators: {
                file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
                    /*maxSize: 2048 * 1024,   // 2 MB*/
                    message: 'O arquivo selecionado não é válido. Apenas aquivos .jpg são permitidos.'
                }
            }
        }
    }
});

$('#login').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        usuario: {
            validators: {
                notEmpty: {
                    message: 'Nome de usuário é obrigatório.'
                },
                different: {
                    field: 'senha',
                    message: 'Nome de usuário deve ser diferente da senha'
                }
            }
        },
        senha: {
            validators: {
                notEmpty: {
                    message: 'Senha é obrigatória'
                },
                different: {
                    field: 'usuario',
                    message: 'Senha deve ser diferente do nome de usuário'
                }
            }
        }
    }
});

$('#ordemservicoform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        solicitante: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o solicitante é obrigatório.'
                }
            }
        },
        estagio: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o estágio é obrigatório.'
                }
            }
        },
        tipo: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o tipo é obrigatório.'
                }
            }
        },
        assunto: {
            validators: {
                notEmpty: {
                    message: 'Informar o assunto é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        descricao: {
            validators: {
                notEmpty: {
                    message: 'Informar o descrição é obrigatório'
                },
                stringLength: {
                    min: 18,
                    message: 'No mínimo 18 caracteres.'
                }
            }
        },
        dt_inicio: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        }
    }
});


$('#ocorrenciaform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        informante: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o informante é obrigatório.'
                }
            }
        },
        estagio: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o estagio é obrigatório.'
                }
            }
        },
        tipo: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o tipo é obrigatório.'
                }
            }
        },
        dt_ocorrencia: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        },
        assunto: {
            validators: {
                notEmpty: {
                    message: 'Informar o assunto é obrigatório.'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        descricao: {
            validators: {
                notEmpty: {
                    message: 'Informar o descrição é obrigatório.'
                }
            }
        }
    }
});

$('#setorform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        cd_condominio: {
            validators: {
                notEmpty: {
                    message: 'Informar o condominio é obrigatório.'
                }
            }
        },
        nm_setor: {
            validators: {
                notEmpty: {
                    message: 'Informar o nome do setor é obrigatório.'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        im_perfil: {
            validators: {
                file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
                    /*maxSize: 2048 * 1024,   // 2 MB*/
                    message: 'O arquivo selecionado não é válido. Apenas aquivos .jpg são permitidos.'
                }
            }
        }
    }
});

$('#apartamentoform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        cd_condominio: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        setor: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        desc_apartamento: {
            validators: {
                notEmpty: {
                    message: 'Informar descrição é obrigatório.'
                }
            }
        }
    }
});
$('#condominioform').bootstrapValidator({
    excluded: ':disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        nm_condominio: {
            validators: {
                notEmpty: {
                    message: 'Informar nome é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        cep: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar cep é obrigatório'
                },
                stringLength: {
                    min: 9,
                    message: 'CEP inválido.'
                }
            }
        },
        rua: {
            validators: {
                notEmpty: {
                    message: 'Informar rua é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        bairro: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar bairro é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        cidade: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar cidade obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        numero: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar numero obrigatório'
                }
            }
        },
        estado: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo estado obrigatório'
                }
            }
        },
        im_perfil: {
            validators: {
                file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
                    /*maxSize: 2048 * 1024,   // 2 MB*/
                    message: 'O arquivo selecionado não é válido. Apenas aquivos .jpg são permitidos.'
                }
            }
        }
    }
});

/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA FÍSICA */
$('#form_pf_telefones').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        fone: {
            validators: {
                notEmpty: {
                    message: 'Informe o número de telefone.'
                },
                stringLength: {
                    min: 14,
                    message: 'Informe o número com o código de área'
                }
            }
        },
        observacao: {
            validators: {
                notEmpty: {
                    message: 'Observação obrigatória.'
                }
            }
        },
        categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        },
        operadora: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {
    e.preventDefault();

    var $form = $(e.target);

    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaFisicaTelefone/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {
            var html = '<tr data-pf-tel="' + data.cd_pf_fone + '"><td>' + data.fone + '</td><td>' + data.operadora + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pf_tel" data-update-pftel-id="' + data.cd_pf_fone + '" data-toggle="modal" data-target="#atualizaPfTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pf_tel" data-del-pftel-id="' + data.cd_pf_fone + '" data-toggle="modal" data-target="#apagaPfTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td></tr>';
            $(html).appendTo('#tb_pf_telefones').hide().fadeIn();
            bv.resetForm(true);
        }
    });
    return false;
});

$('#form_atualiza_pf_tel').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        fone: {
            validators: {
                notEmpty: {
                    message: 'Informe o número de telefone.'
                },
                stringLength: {
                    min: 14,
                    message: 'Informe o número com o código de área'
                }
            }
        },
        observacao: {
            validators: {
                notEmpty: {
                    message: 'Observação obrigatória.'
                }
            }
        },
        categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        },
        operadora: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {

    e.preventDefault();

    var $form = $(e.target);

    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaFisicaTelefone/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var linha = $('#tb_pf_telefones tr[data-pf-tel=' + data.cd_pf_fone + ']');

            var html = '<td>' + data.fone + '</td><td>' + data.operadora + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pf_tel" data-update-pftel-id="' + data.cd_pf_fone + '" data-toggle="modal" data-target="#atualizaPfTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pf_tel" data-del-pftel-id="' + data.cd_pf_fone + '" data-toggle="modal" data-target="#apagaPfTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td>';

            bv.resetForm(true);

            $('#atualizaModalLabel').html('<span class="text-success"><i class="fa fa-check"></i> Telefone atualizado!</span>')
                .fadeIn();

            linha.html(html);

            $form.parents('#atualizaPfTelModal').modal('hide');

        },
        error: function (data) {
            console.log(data.responseText);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

$('#form_apaga_pf_tel')
    .submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "PessoaFisicaTelefone/apagar",
            data: dados,
            dataType: 'json',
            success: function (data) {
                $('#form_apaga_pf_tel input[name=cd_pf_fone]').val('');

                $('#del_pf_tel_confirma').html('<span class="text-success"><i class="fa fa-check"></i> Telefone ' + data.fone + ' Apagado!</span>')
                    .hide().fadeIn();

                $('#tb_pf_telefones tr[data-pf-tel=' + data.cd_pf_fone + ']').remove();
                $('#apagaPfTelModal').modal('hide');
            }
        });
        return false;
    });


/** Início - Botões Atualizar e Apagar  PF Telefone */
$('#tb_pf_telefones').delegate('.update_pf_tel', 'click', function () {

    var id = $(this).attr('data-update-pftel-id');

    $.ajax({
        type: "GET",
        url: "PessoaFisicaTelefone/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_atualiza_pf_tel input[name=cd_pf_fone]').val(data.cd_pf_fone);
            $('#form_atualiza_pf_tel input[name=fone]').val(data.fone);
            $('#form_atualiza_pf_tel input[name=observacao]').val(data.observacao);
            $('#tel_operadora option[value=' + data.operadora + ']').prop("selected", "selected");
            $('#tel_categoria option[value=' + data.categoria + ']').prop("selected", "selected");

            $('#atualizaModalLabel').html('Atualizar Telefone!!!!');

        }
    });
});

$('#tb_pf_telefones').delegate('.delete_pf_tel', 'click', function () {

    var id = $(this).attr('data-del-pftel-id');

    $.ajax({
        type: "GET",
        url: "PessoaFisicaTelefone/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_apaga_pf_tel input[name=cd_pf_fone]').val(data.cd_pf_fone);

            $('#del_pf_tel_confirma').html('<span class="text-danger"><i class="fa fa-trash-o"></i> Apagar telefone ' + data.fone + '?</span>');

        }
    });
});
/** Fim - Botões Atualizar e Apagar PF Telefone*/
/* FIM DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA FÍSICA */

/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE ENDEREÇOS DE PESSOA FÍSICA */
$('#form_pf_enderecos').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        rua: {
            group: '.col-sm-5',
            validators: {
                notEmpty: {
                    message: 'Informe a rua.'
                }
            }
        },
        numero: {
            group: '.col-sm-1',
            validators: {
                notEmpty: {
                    message: 'Informe o número.'
                },
                numeric: {
                    message: 'Somente números.'
                }
            }
        },
        bairro: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe o bairro.'
                }
            }
        },
        cidade: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe a cidade.'
                }
            }
        },
        cep: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe o CEP.'
                },
                stringLength: {
                    min: 9,
                    message: 'CEP incompleto.'
                }
            }
        },
        estado: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe o estado.'
                }
            }
        },
        categoria: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {
    e.preventDefault();

    var $form = $(e.target);

    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaFisicaEndereco/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var celulas = '<td>' + data.rua + '</td><td>' + data.numero + '</td><td>' + data.bairro + '</td><td>' + data.cidade + '</td><td>' + data.cep + '</td><td>' + data.estado + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pf_end" data-update-pfend-id="' + data.id_endereco + '" data-toggle="modal" data-target="#atualizaPfEndModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pf_end" data-del-pfend-id="' + data.id_endereco + '" data-toggle="modal" data-target="#apagaPfEndModal"><i class="fa fa-trash-o"></i></a></td>';

            var linha = '<tr data-pf-endereco="' + data.id_endereco + '">' + celulas + '</tr>';

            var id_end = $('#id_endereco').attr('value');

            if (id_end) {
                var registro = $('#tb_pf_enderecos tr[data-pf-endereco=' + id_end + ']');
                registro.html(celulas);
                registro.addClass('active');
                $('#form_pf_enderecos input[name=id_endereco]').val('');
                $('#legend_form_enderecos').html('Cadastrar Endereço').removeClass('text-primary');
            } else {
                $(linha).appendTo('#tb_pf_enderecos').hide().fadeIn();
            }
            $('html, body').animate({scrollTop: 400}, 400);
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

$('#form_apaga_pf_end')
    .submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "PessoaFisicaEndereco/apagar",
            data: dados,
            dataType: 'json',
            success: function (data) {
                $('#form_apaga_pf_end input[name=id_endereco]').val('');

                $('#del_pf_end_confirma').html('<span class="text-success"><i class="fa fa-check"></i> Endereço Apagado!</span>')
                    .hide().fadeIn();

                $('#tb_pf_enderecos tr[data-pf-endereco=' + data.id_endereco + ']').remove();
                $('#apagaPfEndModal').modal('hide');
            }
        });
        return false;
    });


/** Início - Botões Atualizar e Apagar  PF Telefone */
$('#tb_pf_enderecos').delegate('.update_pf_end', 'click', function () {

    var id = $(this).attr('data-update-pfend-id');

    $('html, body').animate({scrollTop: 180}, 400);
    $.ajax({
        type: "GET",
        url: "PessoaFisicaEndereco/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_pf_enderecos input[name=id_endereco]').val(data.id_endereco);
            $('#form_pf_enderecos input[name=rua]').val(data.rua);
            $('#form_pf_enderecos input[name=numero]').val(data.numero);
            $('#form_pf_enderecos input[name=bairro]').val(data.bairro);
            $('#form_pf_enderecos input[name=cidade]').val(data.cidade);
            $('#form_pf_enderecos input[name=cep]').val(data.cep);
            $('#form_pf_enderecos input[name=observacao]').val(data.observacao);
            $('#form_pf_enderecos input[name=cd_pessoa_fisica]').val(data.cd_pessoa_fisica);
            $('#end_estado option[value=' + data.estado + ']').prop("selected", "selected");
            $('#end_categoria option[value=' + data.categoria + ']').prop("selected", "selected");
            $('#legend_form_enderecos').html('Atualizar Endereço.').addClass('text-primary');

        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#tb_pf_enderecos').delegate('.delete_pf_end', 'click', function () {
    var id = $(this).attr('data-del-pfend-id');

    $.ajax({
        type: "GET",
        url: "PessoaFisicaEndereco/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_apaga_pf_end input[name=id_endereco]').val(data.id_endereco);
            var confirm_end = data.rua + ', ' + data.numero + ', ' + data.bairro + ', ' + data.cidade + ', ' + data.estado + ', CEP ' + data.cep;
            $('#del_pf_end_confirma').html('<span class="text-danger"><i class="fa fa-trash-o"></i> Apagar endereco ' + confirm_end + '?</span>');

        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#form_end_reset').click(function () {
    $('#form_pf_enderecos input[name=id_endereco]').val('');
    $('#legend_form_enderecos').html('Cadastrar Endereço').removeClass('text-primary');

});
/** Fim - Botões Atualizar e Apagar PF Telefone*/
/* FIM DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA FÍSICA */

/*
 $('.delete_pf_end').click(function () {
 $('html, body').animate({scrollTop: 100}, 400);
 return false;
 });
 */
/** Início da Manipulação de Morador Endereço */
$("#m_end_condominio").change(function () {
    var condominio = $("#m_end_condominio").val();
    $.ajax({
        type: "get",
        url: "Setor/listByCondId/" + condominio,
        success: function (data) {
            $("#m_end_setor").html(data);
        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});
$("#m_end_setor").change(function () {
    var setor = $("#m_end_setor").val();
    $.ajax({
        type: "get",
        url: "Apartamento/listBySetorId/" + setor,
        success: function (data) {
            $("#m_end_apartamento").html(data);
        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#form_end_morador').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        m_end_condominio: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        m_end_setor: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        m_end_apartamento: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        m_end_dt_entrada: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        },
        m_end_dt_saida: {
            group: '.col-sm-6',
            validators: {
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {
    e.preventDefault();
    var $form = $(e.target);
    var bv = $form.data('bootstrapValidator');
    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "MoradorEndereco/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var celulas_old = '<td>' + data.rua + '</td><td>' + data.numero + '</td><td>' + data.bairro + '</td><td>' + data.cidade + '</td><td>' + data.cep + '</td><td>' + data.estado + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pf_end" data-update-pfend-id="' + data.id_endereco + '" data-toggle="modal" data-target="#atualizaPfEndModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pf_end" data-del-pfend-id="' + data.id_endereco + '" data-toggle="modal" data-target="#apagaPfEndModal"><i class="fa fa-trash-o"></i></a></td>';

            var celulas = '<td>' + data.condominio + '</td><td>' + data.setor + '</td><td>' + data.apartamento + '</td><td>' + data.m_end_dt_entrada + '</td><td>' + data.m_end_dt_saida + '</td>' +
                '<td><a href="#" class="btn btn-primary btn-sm btn-circle update_m_end" data-update-mend-id="' + data.id_m_end + '"' +
                'data-toggle="modal" data-target="#atualizaMEndModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_m_end" data-del-mend-id="' + data.id_m_end + '"' +
                'data-toggle="modal" data-target="#apagaMEndModal"><i class="fa fa-trash-o"></i></a></td>';

            var linha = '<tr data-m-end="' + data.id_m_end + '">' + celulas + '</tr>';

            var id_end = $('#id_m_end').attr('value');

            if (id_end) {
                var registro = $('#tb_m_enderecos tr[data-m-end=' + id_end + ']');
                registro.html(celulas);
                registro.addClass('active');
                $('#legend_form_end_morador').html('Cadastrar Endereço').removeClass('text-primary');
            } else {
                $(linha).appendTo('#tb_m_enderecos').hide().fadeIn();
            }
            $('#form_end_morador input[name=id_m_end]').val('');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

$('#form_apaga_m_end')
    .submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "MoradorEndereco/apagar",
            data: dados,
            dataType: 'json',
            success: function (data) {
                $('#form_apaga_m_end input[name=id_m_end]').val('');

                $('#del_m_end_confirma').html('<span class="text-success"><i class="fa fa-check"></i> Endereço Apagado!</span>')
                    .hide().fadeIn();

                $('#tb_m_enderecos tr[data-m-end=' + data.id_m_end + ']').remove();
                $('#apagaMEndModal').modal('hide');
            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
        return false;
    });

/** Início - Botões Atualizar e Apagar  PF Telefone */
$('#tb_m_enderecos').delegate('.update_m_end', 'click', function () {

    var id = $(this).attr('data-update-mend-id');

    $('html, body').animate({scrollTop: 180}, 400);
    $.ajax({
        type: "GET",
        url: "MoradorEndereco/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_end_morador input[name=id_m_end]').val(data.id_m_end);
            $('#form_end_morador input[name=m_end_dt_entrada]').val(data.m_end_dt_entrada);
            $('#form_end_morador input[name=m_end_dt_saida]').val(data.m_end_dt_saida);
            $('#form_end_morador input[name=cd_pessoa_fisica]').val(data.cd_pessoa_fisica);
            $('#m_end_condominio option[value=' + data.cd_condominio + ']').prop("selected", "selected");
            $('#m_end_setor option[value=' + data.cd_setor + ']').prop("selected", "selected");
            $('#m_end_apartamento option[value=' + data.cd_apartamento + ']').prop("selected", "selected");
            $('#legend_form_end_morador').html('Atualizar Endereço.').addClass('text-primary');

        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#tb_m_enderecos').delegate('.delete_m_end', 'click', function () {
    var id = $(this).attr('data-del-mend-id');

    $.ajax({
        type: "GET",
        url: "MoradorEndereco/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_apaga_m_end input[name=id_m_end]').val(data.id_m_end);
            var confirm_end = data.condominio + ', ' + data.setor + ', ' + data.apartamento + ', ' + data.m_end_dt_entrada;
            $('#del_m_end_confirma').html('<span class="text-danger"><i class="fa fa-trash-o"></i> Apagar endereco ' + confirm_end + '?</span>');

        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#form_m_end_reset').click(function () {
    $('#form_end_morador input[name=id_m_end]').val('');
    $('#legend_form_end_morador').html('Cadastrar Endereço').removeClass('text-primary');

});
/** Fim - Botões Atualizar e Apagar PF Telefone*/
/* Fim da da Manipulação de Morador Endereço */


/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA JURIDICA */
$('#form_pj_telefones').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        fone: {
            validators: {
                notEmpty: {
                    message: 'Informe o número de telefone.'
                },
                stringLength: {
                    min: 14,
                    message: 'Informe o número com o código de área'
                }
            }
        },
        observacao: {
            validators: {
                notEmpty: {
                    message: 'Observação obrigatória.'
                }
            }
        },
        categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        },
        operadora: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {
    e.preventDefault();

    var $form = $(e.target);

    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaJuridicaTelefone/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {
            var html = '<tr data-pj-tel="' + data.cd_pj_fone + '"><td>' + data.fone + '</td><td>' + data.operadora + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pj_tel" data-update-pjtel-id="' + data.cd_pj_fone + '" data-toggle="modal" data-target="#atualizaPjTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pj_tel" data-del-pjtel-id="' + data.cd_pj_fone + '" data-toggle="modal" data-target="#apagaPjTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td></tr>';
            $(html).appendTo('#tb_pj_telefones').hide().fadeIn();
            bv.resetForm(true);
        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

$('#form_atualiza_pj_tel').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        fone: {
            validators: {
                notEmpty: {
                    message: 'Informe o número de telefone.'
                },
                stringLength: {
                    min: 14,
                    message: 'Informe o número com o código de área'
                }
            }
        },
        observacao: {
            validators: {
                notEmpty: {
                    message: 'Observação obrigatória.'
                }
            }
        },
        categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        },
        operadora: {
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {

    e.preventDefault();

    var $form = $(e.target);

    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaJuridicaTelefone/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var linha = $('#tb_pj_telefones tr[data-pj-tel=' + data.cd_pj_fone + ']');

            var html = '<td>' + data.fone + '</td><td>' + data.operadora + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pj_tel" data-update-pjtel-id="' + data.cd_pj_fone + '" data-toggle="modal" data-target="#atualizaPjTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pj_tel" data-del-pjtel-id="' + data.cd_pj_fone + '" data-toggle="modal" data-target="#apagaPjTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td>';

            bv.resetForm(true);

            $('#atualizaModalLabel').html('<span class="text-success"><i class="fa fa-check"></i> Telefone atualizado!</span>')
                .fadeIn();

            linha.html(html);

            $form.parents('#atualizaPjTelModal').modal('hide');

        },
        error: function (data) {
            console.log(data.responseText);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

$('#form_apaga_pj_tel')
    .submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "PessoaJuridicaTelefone/apagar",
            data: dados,
            dataType: 'json',
            success: function (data) {
                $('#form_apaga_pj_tel input[name=cd_pj_fone]').val('');

                $('#del_pj_tel_confirma').html('<span class="text-success"><i class="fa fa-check"></i> Telefone ' + data.fone + ' Apagado!</span>')
                    .hide().fadeIn();

                $('#tb_pj_telefones tr[data-pj-tel=' + data.cd_pj_fone + ']').remove();
                $('#apagaPjTelModal').modal('hide');
            }
        });
        return false;
    });


/** Início - Botões Atualizar e Apagar  PF Telefone */
$('#tb_pj_telefones').delegate('.update_pj_tel', 'click', function () {

    var id = $(this).attr('data-update-pjtel-id');

    $.ajax({
        type: "GET",
        url: "PessoaJuridicaTelefone/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_atualiza_pj_tel input[name=cd_pj_fone]').val(data.cd_pj_fone);
            $('#form_atualiza_pj_tel input[name=fone]').val(data.fone);
            $('#form_atualiza_pj_tel input[name=observacao]').val(data.observacao);
            $('#tel_operadora option[value=' + data.operadora + ']').prop("selected", "selected");
            $('#tel_categoria option[value=' + data.categoria + ']').prop("selected", "selected");

            $('#atualizaModalLabel').html('Atualizar Telefone!!!!');

        }
    });
});

$('#tb_pj_telefones').delegate('.delete_pj_tel', 'click', function () {

    var id = $(this).attr('data-del-pjtel-id');

    $.ajax({
        type: "GET",
        url: "PessoaJuridicaTelefone/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_apaga_pj_tel input[name=cd_pj_fone]').val(data.cd_pj_fone);

            $('#del_pj_tel_confirma').html('<span class="text-danger"><i class="fa fa-trash-o"></i> Apagar telefone ' + data.fone + '?</span>');

        }
    });
});
/** Fim - Botões Atualizar e Apagar PF Telefone*/
/* FIM DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA FÍSICA */

/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE ENDEREÇOS DE PESSOA FÍSICA */
$('#form_pj_enderecos').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        rua: {
            group: '.col-sm-5',
            validators: {
                notEmpty: {
                    message: 'Informe a rua.'
                }
            }
        },
        numero: {
            group: '.col-sm-1',
            validators: {
                notEmpty: {
                    message: 'Informe o número.'
                },
                numeric: {
                    message: 'Somente números.'
                }
            }
        },
        bairro: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe o bairro.'
                }
            }
        },
        cidade: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe a cidade.'
                }
            }
        },
        cep: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe o CEP.'
                },
                stringLength: {
                    min: 9,
                    message: 'Informe o CEP completo.'
                }
            }
        },
        estado: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe o estado.'
                }
            }
        },
        categoria: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe a categoria.'
                }
            }
        }
    }
}).on('success.form.bv', function (e) {
    e.preventDefault();

    var $form = $(e.target);

    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaJuridicaEndereco/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var celulas = '<td>' + data.rua + '</td><td>' + data.numero + '</td><td>' + data.bairro + '</td><td>' + data.cidade + '</td><td>' + data.cep + '</td><td>' + data.estado + '</td><td>' + data.categoria + '</td><td>' + data.observacao + '</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm btn-circle update_pj_end" data-update-pjend-id="' + data.id_endereco + '" data-toggle="modal" data-target="#atualizaPjEndModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm btn-circle delete_pj_end" data-del-pjend-id="' + data.id_endereco + '" data-toggle="modal" data-target="#apagaPjEndModal"><i class="fa fa-trash-o"></i></a></td>';

            var linha = '<tr data-pj-endereco="' + data.id_endereco + '">' + celulas + '</tr>';

            var id_end = $('#id_endereco').attr('value');

            if (id_end) {
                var registro = $('#tb_pj_enderecos tr[data-pj-endereco=' + id_end + ']');
                registro.html(celulas);
                registro.addClass('active');
                $('#form_pj_enderecos input[name=id_endereco]').val('');
                $('#legend_form_enderecos').html('Cadastrar Endereço').removeClass('text-primary');
            } else {
                $(linha).appendTo('#tb_pj_enderecos').hide().fadeIn();
            }
            $('html, body').animate({scrollTop: 400}, 400);
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

$('#form_apaga_pj_end')
    .submit(function () {

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "PessoaJuridicaEndereco/apagar",
            data: dados,
            dataType: 'json',
            success: function (data) {
                $('#form_apaga_pj_end input[name=id_endereco]').val('');

                $('#del_pj_end_confirma').html('<span class="text-success"><i class="fa fa-check"></i> Endereço Apagado!</span>')
                    .hide().fadeIn();

                $('#tb_pf_enderecos tr[data-pj-endereco=' + data.id_endereco + ']').remove();
                $('#apagaPjEndModal').modal('hide');
            }
        });
        return false;
    });


/** Início - Botões Atualizar e Apagar  PF Telefone */
$('#tb_pj_enderecos').delegate('.update_pj_end', 'click', function () {

    var id = $(this).attr('data-update-pjend-id');

    $('html, body').animate({scrollTop: 180}, 400);
    $.ajax({
        type: "GET",
        url: "PessoaJuridicaEndereco/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_pj_enderecos input[name=id_endereco]').val(data.id_endereco);
            $('#form_pj_enderecos input[name=rua]').val(data.rua);
            $('#form_pj_enderecos input[name=numero]').val(data.numero);
            $('#form_pj_enderecos input[name=bairro]').val(data.bairro);
            $('#form_pj_enderecos input[name=cidade]').val(data.cidade);
            $('#form_pj_enderecos input[name=cep]').val(data.cep);
            $('#form_pj_enderecos input[name=observacao]').val(data.observacao);
            $('#form_pj_enderecos input[name=cd_pessoa_juridica]').val(data.cd_pessoa_juridica);
            $('#end_estado option[value=' + data.estado + ']').prop("selected", "selected");
            $('#end_categoria option[value=' + data.categoria + ']').prop("selected", "selected");
            $('#legend_form_enderecos').html('Atualizar Endereço.').addClass('text-primary');

        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#tb_pj_enderecos').delegate('.delete_pj_end', 'click', function () {
    var id = $(this).attr('data-del-pjend-id');

    $.ajax({
        type: "GET",
        url: "PessoaJuridicaEndereco/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {

            $('#form_apaga_pj_end input[name=id_endereco]').val(data.id_endereco);
            var confirm_end = data.rua + ', ' + data.numero + ', ' + data.bairro + ', ' + data.cidade + ', ' + data.estado + ', CEP ' + data.cep;
            $('#del_pj_end_confirma').html('<span class="text-danger"><i class="fa fa-trash-o"></i> Apagar endereco ' + confirm_end + '?</span>');

        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#form_end_reset').click(function () {
    $('#form_pj_enderecos input[name=id_endereco]').val('');
    $('#legend_form_enderecos').html('Cadastrar Endereço').removeClass('text-primary');

});

/** Busca Pessoa Física */
$(document).ready(function () {
    function search() {
        var nome = $('#pessoa_1').val();

        if (nome != '') {
            $('#area-do-resultado').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                type: 'post',
                url: 'PessoaFisica/buscaAjax/',
                data: 'nome=' + nome,
                dataType: 'json',
                success: function (data) {

                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<a title="Visualizar perfil" href="PessoaFisica/visualizar/' + data[i].id + '"><div class="list-group-item"><div><img src="' + data[i].foto + '" class="img-circle img-thumb-panel pull-left">' +
                            '<p class="list-group-item-heading">' + data[i].nome + '</p>' +
                            '<p class="list-group-item-text">' + data[i].email + '</p></div></div></a>';
                    }

                    var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                    $('#area-do-resultado').html(resultBody).hide().fadeIn();
                    //'<img src="'+data[0].foto+'">'
                    //$('#pessoa_1').val('');
                },
                error: function (data) {
                    $(data.responseText).appendTo('#area-do-resultado');
                }
            });
        } else {
            $('#area-do-resultado').fadeOut();
        }
    }

    $('#botao-pesquisar-pessoa').click(function () {
        search();
    });
    $('#pessoa_1').keyup(function (e) {
        search();

        /*        if(e.keyCode == 13) {
         //Executa esta linha se 'enter' for apertado
         }*/
    });
    $('#nav-top-form-busca').focusout(function () {
        $('#area-do-resultado').fadeOut();
    });
});


/** Busca Pessoa Física para Ocorrência*/
$(document).ready(function () {
    function buscaPessoaOcorrencia() {
        var nome = $('#ocorr_pessoa').val();

        if (nome != '') {
            $('#busca-ocorr-pessoa-resultado').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                type: 'post',
                url: 'PessoaFisica/buscaAjax/',
                data: 'nome=' + nome,
                dataType: 'json',
                success: function (data) {

                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<div class="list-group-item"><div><img src="' + data[i].foto + '" class="img-circle img-thumb-panel pull-left">' +
                            '<p class="list-group-item-heading"><a title="Visualizar perfil" href="PessoaFisica/visualizar/' + data[i].id + '">' + data[i].nome + '</a></p>' +
                            '<p class="list-group-item-text text-right">' +
                            '<button data-id-pessoa="' + data[i].id + '" title="Adicionar" class="btn btn-info btn-xs btn-circle add-ocorr-pessoa">' +
                            '<i class="fa fa-plus"></i></button></p></div></div>';
                    }

                    var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                    $('#busca-ocorr-pessoa-resultado').html(resultBody).hide().fadeIn();
                },
                error: function (data) {
                    $(data.responseText).appendTo('#area-do-resultado');
                }
            });
        } else {
            $('#busca-ocorr-pessoa-resultado').fadeOut();
        }
    }

    $('#ocorr_pessoa').keyup(function (e) {
        buscaPessoaOcorrencia();
    }).focusout(function () {
        $('#busca-ocorr-pessoa-resultado').fadeOut();
    });

    // Adiciona Pessoa
    $('#busca-ocorr-pessoa-resultado').delegate('.add-ocorr-pessoa', 'click', function () {

        var pessoa = $(this).attr('data-id-pessoa');
        var ocorrencia = $('#form-ocorrencia-pessoa input[name=cd_ocorrencia]').val();
        //var data = $('#form-ocorrencia-pessoa').serialize();

        $.ajax({
            type: 'post',
            url: 'OcorrenciaPessoaFisicaEnvolvida/cadastra/',
            data: 'cd_pessoa_fisica=' + pessoa + '&cd_ocorrencia=' + ocorrencia,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.msg) {
                    var html = '<div class="alert alert-dismissable alert-warning">' +
                        '<button type="button" class="close" data-dismiss="alert">×</button>' +
                        '<h4>' + data.msg + '</h4>' +
                        '<p></p>' +
                        '</div>';
                    $('#msg-ja-existe').html(html);
                } else {
                    var pessoa = '<tr data-tr-registro-op="' + data.cd_pessoa_fisica + '">' +
                        '<td><img class="img-circle" src="' + data.im_perfil + '"></td>' +
                        '<td><h6><a href="PessoaFisica/visualizar/' + data.cd_pessoa_fisica + '">' + data.nm_pessoa_fisica + '</a></h6></td>' +
                        '<td>' +
                        '<a href=\"#\" data-id-ocorrencia="' + data.cd_ocorrencia + '" data-id-pessoa="' + data.cd_pessoa_fisica + '" class="btn btn-danger btn-xs btn-circle remove-ocorr-pessoa" data-toggle="modal" data-target="#apagaOPModal"><i class="fa fa-minus"></i></i></a>' +
                        '</button>' +
                        '</td></tr>';

                    $(pessoa).appendTo('#ocorr-envolvidos').hide().fadeIn();
                }
            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
        return false;
    });

    $('#ocorr-envolvidos').delegate('.remove-ocorr-pessoa', 'click', function () {
        console.log('Remove!');
        var pessoa = $(this).attr('data-id-pessoa');
        var ocorrencia = $(this).attr('data-id-ocorrencia');
        $.ajax({
            type: "post",
            url: "OcorrenciaPessoaFisicaEnvolvida/findBy2Ids/",
            data: 'cd_pessoa_fisica=' + pessoa + '&cd_ocorrencia=' + ocorrencia,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#form_apaga_op input[name=cd_pessoa_fisica]').val(data.cd_pessoa_fisica);

                var confirm_pessoa =
                    '<div class="profile-card pcard-lg"><div class="panel-body">' +
                        '<div class="profile-card-foto-container">' +
                        '<img src="' + data.im_perfil + '" class="img-circle profilefoto foto-md">' +
                        '</div>' +
                        '<div class="pcard-name">' + data.nm_pessoa_fisica + '' +
                        '<div class="pcard-info text-danger"><i class="fa fa-trash-o"></i> Remover envolvido?</div>' +
                        '</div>' +
                        '</div></div>';
                $('#del_op_confirma').html(confirm_pessoa);

            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
    });
    $('#form_apaga_op')
        .submit(function () {

            var dados = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "OcorrenciaPessoaFisicaEnvolvida/apagar",
                data: dados,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#form_apaga_op input[name=cd_pessoa_fisica]').val('');

                    $('#del_op_confirma').html('<span class="text-success"><i class="fa fa-check"></i> Endereço Apagado!</span>')
                        .hide().fadeIn();

                    $('#ocorr-envolvidos tr[data-tr-registro-op=' + data.cd_pessoa_fisica + ']').remove();
                    $('#apagaOPModal').modal('hide');
                },
                error: function (data) {
                    console.log(data);
                    $(data.responseText).appendTo('#responseAjaxError');
                }
            });
            return false;
        });
});

/** Busca Pessoa Física para Relacionamento*/
$(document).ready(function () {
    function buscaPessoaRelacionada() {
        var nome = $('#relac_busca').val();

        if (nome != '') {
            $('#busca-relac-pessoa-resultado').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                type: 'post',
                url: 'PessoaFisica/buscaAjax/',
                data: 'nome=' + nome,
                dataType: 'json',
                success: function (data) {

                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<div data-pessoa-relac="' + data[i].id + '" class="list-group-item"><div><img src="' + data[i].foto + '" class="img-circle img-thumb-panel pull-left">' +
                            '<p class="list-group-item-heading"><a title="Visualizar perfil" href="PessoaFisica/visualizar/' + data[i].id + '">' + data[i].nome + '</a></p>' +
                            '<p class="list-group-item-text text-right">' +
                            '<button data-id-pessoa="' + data[i].id + '" title="Adicionar" class="btn btn-info btn-xs btn-circle add-relac-pessoa">' +
                            '<i class="fa fa-plus"></i></button></p></div></div>';
                    }

                    var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                    $('#busca-relac-pessoa-resultado').html(resultBody).hide().fadeIn();
                },
                error: function (data) {
                    $(data.responseText).appendTo('#busca-relac-pessoa-resultado');
                }
            });
        } else {
            $('#busca-relac-pessoa-resultado').fadeOut();
        }
    }

    $('#form_pf_relacionamento').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            catg_relac: {
                validators: {
                    notEmpty: {
                        message: 'Informe o relacionamento.'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();

        var $form = $(e.target);

        var bv = $form.data('bootstrapValidator');

        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "Relacionados/cadastra",
            data: dados,
            dataType: 'json',
            success: function (data) {

                var celulas = '<td><img src="' + data.pessoa2_foto + '" class="img-circle profilefoto"></td>' +
                    '<td><a href="PessoaFisica/visualizar/' + data.cd_pessoa_fisica_2 + '">' + data.pessoa2_nome + '</a></td>' +
                    '<td>' + data.relac + '</td>' +
                    '<td><button ' +
                    'data-img-pessoa="' + data.pessoa2_foto + '" ' +
                    'data-nome-pessoa="' + data.pessoa2_nome + '" ' +
                    'data-id-pessoa="' + data.cd_pessoa_fisica_2 + '" ' +
                    'data-toggle="tooltip" ' +
                    'data-placement="top" ' +
                    'title="Editar relacionamento" class="btn btn-primary btn-xs btn-circle add-relac-pessoa">' +
                    '<i class="fa fa-arrow-left"></i></button></td>';

                var linha = '<tr data-pessoa-relac="' + data.cd_pessoa_fisica_2 + '">' + celulas + '</tr>';

                $('#tb_lista-relacionados tr[data-pessoa-relac=' + data.cd_pessoa_fisica_2 + ']').remove();

                $(linha).appendTo('#tb_lista-relacionados').hide().fadeIn();

                var msg = '<div class="alert alert-dismissable alert-success">' +
                    '<a href="#" class="close" data-dismiss="alert">×</a><h4>' + data.fn_relacionados + '</h4></div>';

                $('#form_pf_relacionamento input[name=cd_pessoa_fisica_2]').val('');
                $('#legend_form_relacionamento').html('Relacionamentos').removeClass('text-primary');
                $('#pessoa_relac').html(msg);

                bv.resetForm(true);
            },
            error: function (data) {
                console.log(data);
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
        return false;
    });


    $('#relac_busca').keyup(function (e) {
        buscaPessoaRelacionada();
    }).focusout(function () {
        $('#busca-relac-pessoa-resultado').fadeOut();
    });

    // Adiciona Pessoa ao formulário #form_pf_relacionamento
    $('#busca-relac-pessoa-resultado').delegate('.add-relac-pessoa', 'click', function () {

        var id_pessoa = $(this).attr('data-id-pessoa');
        var nome_pessoa = $(this).attr('data-nome-pessoa');

        var p = $('div[data-pessoa-relac=' + id_pessoa + ']');

        $('#pessoa_relac').html(p).hide().fadeIn();
        $('#form_pf_relacionamento input[name=cd_pessoa_fisica_2]').val(id_pessoa);


        return false;
    });
    $('#tb_lista-relacionados').delegate('.add-relac-pessoa', 'click', function () {

        var id_pessoa = $(this).attr('data-id-pessoa');
        var nome_pessoa = $(this).attr('data-nome-pessoa');
        var img_pessoa = $(this).attr('data-img-pessoa');

        var p = '<div data-pessoa-relac="1" class="list-group-item">' +
            '<div>' +
            '<img src="' + img_pessoa + '" class="img-circle img-thumb-panel pull-left">' +
            '<p class="list-group-item-heading">' +
            '<a title="Visualizar perfil" href="PessoaFisica/visualizar/' + id_pessoa + '">' + nome_pessoa + '</a>' +
            '</p>' +
            '<p class="list-group-item-text text-right">' +
            '</p></div></div>';

        $('#pessoa_relac').html(p).hide().fadeIn();
        $('#form_pf_relacionamento input[name=cd_pessoa_fisica_2]').val(id_pessoa);


        return false;
    });

    $('#deletar_relac').on('click', function () {

        $('#del_button_txt').html($('#checkbox_del_relac').is(':checked') ? 'Deletar?' : 'Será deletado.');

    });

    $('#form_pf_r_reset').click(function () {
        $('#form_pf_relacionamento input[name=cd_pessoa_fisica_2]').val('');
        $('#legend_form_relacionamento').html('Cadastrar Relacionamento').removeClass('text-primary');
        $('#pessoa_relac .list-group-item').remove();

    });
});
