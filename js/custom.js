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

$(document).ready(function () {
    $('#cpf').mask("999.999.999-99");
    $('#cnpj').mask("99.999.999/9999-99");
    $('#celular').mask("(99) Z9999-9999", {translation: {'Z': {pattern: /[0-9]/, optional: true}}});  //[] Opcional
    $('#dt_nascimento').mask("99/99/9999");
    $('#nascimento').mask("99/99/9999");
    $('#dt_inicio_curso').mask("99/99/9999");
    $('#dt_fim_curso').mask("99/99/9999");
    $('#dt_inicio').mask("99/99/9999");
    $('#dt_fim').mask("99/99/9999");
    $('#fone').mask("(99) 9999-9999");
    $('#cep').mask("99999-999");
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
                }
            }
        },
        rg: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                }
            }
        },
        dt_nascimento: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
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


$('#pfformnovo').bootstrapValidator({
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
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                }
            }
        },
        rg: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                }
            }
        },
        dt_nascimento: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
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
}).on('success.form.bv', function (e) {
    // Prevent form submission
    e.preventDefault();

    // Get the form instance
    var $form = $(e.target);

    // Get the BootstrapValidator instance
    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaFisica/novo",
        data: dados,
        dataType: 'json',
        success: function (data) {
            $('#ajax_response').html(data);
            console.log(data);
        }
    });
    return false;
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
                }
            }
        },
        desc_razao: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                }
            }
        },
        desc_atividade: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
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
        cnpj: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
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
            validators: {
                notEmpty: {
                    message: 'Informar o solicitante é obrigatório.'
                }
            }
        },
        assunto: {
            validators: {
                notEmpty: {
                    message: 'Informar o assunto é obrigatória'
                }
            }
        },
        dt_inicio: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
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
            validators: {
                notEmpty: {
                    message: 'Informar o informante é obrigatório.'
                }
            }
        },
        estagio: {
            validators: {
                notEmpty: {
                    message: 'Informar o estagio é obrigatório.'
                }
            }
        },
        dt_ocorrencia: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                }
            }
        },
        assunto: {
            validators: {
                notEmpty: {
                    message: 'Informar o assunto é obrigatória'
                }
            }
        },

        descricao: {
            validators: {
                notEmpty: {
                    message: 'Informar o descrição é obrigatória'
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
        im_perfil: {
            validators: {
                file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
                    /*maxSize: 2048 * 1024,   // 2 MB*/
                    message: 'O arquivo selecionado não é válido. Apenas aquivos .jpg são permitidos.'
                }
            }
        },
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
                }
            }
        },
        observacao: {
            validators: {
                notEmpty: {
                    message: 'Informar a observação é obrigatório.'
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
        cd_setor: {
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
                }
            }
        },
        cep: {
            validators: {
                notEmpty: {
                    message: 'Informar cep é obrigatório'
                }
            }
        },
        rua: {
            validators: {
                notEmpty: {
                    message: 'Informar rua é obrigatório'
                }
            }
        },
        bairro: {
            validators: {
                notEmpty: {
                    message: 'Informar bairro é obrigatório'
                }
            }
        },
        cidade: {
            validators: {
                notEmpty: {
                    message: 'Informar cidade obrigatório'
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

$('#pf_ajax_form').submit(function () {
    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "app/ajax_controllers/processa.php",
        data: dados,
        success: function (data) {
            $('#ajax_response').html(data);
            console.log(data + 'Alguma coisa aconteceu');
        }
    });

    return false;
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
    // Prevent form submission
    e.preventDefault();

    // Get the form instance
    var $form = $(e.target);

    // Get the BootstrapValidator instance
    var bv = $form.data('bootstrapValidator');

    // Use Ajax to submit form data
    /*
     $.post($form.attr('action'), $form.serialize(), function(result) {
     // ... Process the result ...
     }, 'json');
     */

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaFisicaTelefone/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {
            var html = '<tr data-pf-tel="'+data.cd_pf_fone+'"><td>'+data.fone+'</td><td>'+data.operadora+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm update_pf_tel" data-update-pftel-id="'+data.cd_pf_fone+'" data-toggle="modal" data-target="#atualizaPfTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm delete_pf_tel" data-del-pftel-id="'+data.cd_pf_fone+'" data-toggle="modal" data-target="#apagaPfTelModal"><i class="fa fa-trash-o"></i></a>' +
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
// Prevent form submission
    e.preventDefault();

    // Get the form instance
    var $form = $(e.target);

    // Get the BootstrapValidator instance
    var bv = $form.data('bootstrapValidator');

    var dados = $(this).serialize();

    $.ajax({
        type: "POST",
        url: "PessoaFisicaTelefone/cadastra",
        data: dados,
        dataType: 'json',
        success: function (data) {

            //var prod_id = '#prod_' + data.id_prod;
            //var prod = $(prod_id);

            var linha = $('#tb_pf_telefones tr[data-pf-tel=' + data.cd_pf_fone + ']');

            var html = '<td>'+data.fone+'</td><td>'+data.operadora+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                ' <a href="#" class="btn btn-warning btn-sm pull-right delete_pf_tel" data-del-pftel-id="'+data.cd_pf_fone+'" data-toggle="modal" data-target="#apagaPfTelModal"><i class="fa fa-trash-o"></i></a>' +
                '<a href="#" class="btn btn-primary btn-sm pull-right update_pf_tel" data-update-pftel-id="'+data.cd_pf_fone+'" data-toggle="modal" data-target="#atualizaPfTelModal"><i class="fa fa-edit"></i></a>' +
                '</td>';

            bv.resetForm(true);

            $('#atualizaModalLabel').html('<span class="text-success"><i class="fa fa-check"></i> Telefone atualizado!</span>')
                .fadeIn();

            linha.html(html);

            $form.parents('#atualizaPfTelModal').modal('hide');

        },
        error: function(data) {
            console.log(data.responseText);
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
            $('#form_atualiza_pf_tel input[name=operadora]').val(data.operadora);
            $('#form_atualiza_pf_tel input[name=observacao]').val(data.observacao);
            $('#form_atualiza_pf_tel input[name=categoria]').val(data.categoria);

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