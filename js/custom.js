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

/** Função para configuração do plugin de máscara para telefones com '9' opcional no início*/
var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

$(document).ready(function () {
    $('#cpf').mask("999.999.999-99");
    $('#cnpj').mask("99.999.999/9999-99");
    //$('#celular').mask("(99) Z9999-9999", {translation: {'Z': {pattern: /[0-9]/, optional: true}}});  //[] Opcional
    $('.fones').mask(SPMaskBehavior, spOptions);
    $('#dt_nascimento').mask("99/99/9999");
    $('#nascimento').mask("99/99/9999");
    $('#dt_inicio_curso').mask("99/99/9999");
    $('#dt_fim_curso').mask("99/99/9999");
    $('#dt_inicio').mask("99/99/9999");
    $('#dt_fim').mask("99/99/9999");
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

            var html = '<td>'+data.fone+'</td><td>'+data.operadora+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm update_pf_tel" data-update-pftel-id="'+data.cd_pf_fone+'" data-toggle="modal" data-target="#atualizaPfTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm delete_pf_tel" data-del-pftel-id="'+data.cd_pf_fone+'" data-toggle="modal" data-target="#apagaPfTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td>';

            bv.resetForm(true);

            $('#atualizaModalLabel').html('<span class="text-success"><i class="fa fa-check"></i> Telefone atualizado!</span>')
                .fadeIn();

            linha.html(html);

            $form.parents('#atualizaPfTelModal').modal('hide');

        },
        error: function(data) {
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
            $('#tel_operadora option[value='+data.operadora+']').prop("selected", "selected");
            $('#tel_categoria option[value='+data.categoria+']').prop("selected", "selected");

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

            var celulas = '<td>'+ data.rua + '</td><td>'+data.numero+'</td><td>'+data.bairro+'</td><td>'+data.cidade+'</td><td>'+data.cep+'</td><td>'+data.estado+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                        '<a href="#" class="btn btn-primary btn-sm update_pf_end" data-update-pfend-id="'+data.id_endereco+'" data-toggle="modal" data-target="#atualizaPfEndModal"><i class="fa fa-edit"></i></a>' +
                        '&nbsp;<a href="#" class="btn btn-warning btn-sm delete_pf_end" data-del-pfend-id="'+data.id_endereco+'" data-toggle="modal" data-target="#apagaPfEndModal"><i class="fa fa-trash-o"></i></a></td>';

            var linha = '<tr data-pf-endereco="'+data.id_endereco+'">' + celulas + '</tr>';

            var id_end = $('#id_endereco').attr('value');

            if (id_end){
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
        error: function(data) {
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
            $('#end_estado option[value='+data.estado+']').prop("selected", "selected");
            $('#end_categoria option[value='+data.categoria+']').prop("selected", "selected");
            $('#legend_form_enderecos').html('Atualizar Endereço.').addClass('text-primary');

        },
        error: function(data) {
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
        error: function(data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#form_end_reset').click(function() {
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
            var html = '<tr data-pj-tel="'+data.cd_pj_fone+'"><td>'+data.fone+'</td><td>'+data.operadora+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm update_pj_tel" data-update-pjtel-id="'+data.cd_pj_fone+'" data-toggle="modal" data-target="#atualizaPjTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm delete_pj_tel" data-del-pjtel-id="'+data.cd_pj_fone+'" data-toggle="modal" data-target="#apagaPjTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td></tr>';
            $(html).appendTo('#tb_pj_telefones').hide().fadeIn();
            bv.resetForm(true);
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

            var html = '<td>'+data.fone+'</td><td>'+data.operadora+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm update_pj_tel" data-update-pjtel-id="'+data.cd_pj_fone+'" data-toggle="modal" data-target="#atualizaPjTelModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm delete_pj_tel" data-del-pjtel-id="'+data.cd_pj_fone+'" data-toggle="modal" data-target="#apagaPjTelModal"><i class="fa fa-trash-o"></i></a>' +
                '</td>';

            bv.resetForm(true);

            $('#atualizaModalLabel').html('<span class="text-success"><i class="fa fa-check"></i> Telefone atualizado!</span>')
                .fadeIn();

            linha.html(html);

            $form.parents('#atualizaPjTelModal').modal('hide');

        },
        error: function(data) {
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
            $('#tel_operadora option[value='+data.operadora+']').prop("selected", "selected");
            $('#tel_categoria option[value='+data.categoria+']').prop("selected", "selected");

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
/** Fim - Botões Atualizar e Apagar PJ Telefone*/
/* FIM DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA JURIDICA */

/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE ENDEREÇOS DE PESSOA JURIDICA */
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

            var celulas = '<td>'+ data.rua + '</td><td>'+data.numero+'</td><td>'+data.bairro+'</td><td>'+data.cidade+'</td><td>'+data.cep+'</td><td>'+data.estado+'</td><td>'+data.categoria+'</td><td>'+data.observacao+'</td><td>' +
                '<a href="#" class="btn btn-primary btn-sm update_pj_end" data-update-pjend-id="'+data.id_endereco+'" data-toggle="modal" data-target="#atualizaPjEndModal"><i class="fa fa-edit"></i></a>' +
                '&nbsp;<a href="#" class="btn btn-warning btn-sm delete_pj_end" data-del-pjend-id="'+data.id_endereco+'" data-toggle="modal" data-target="#apagaPjEndModal"><i class="fa fa-trash-o"></i></a></td>';

            var linha = '<tr data-pj-endereco="'+data.id_endereco+'">' + celulas + '</tr>';

            var id_end = $('#id_endereco').attr('value');

            if (id_end){
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
        error: function(data) {
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

                $('#tb_pj_enderecos tr[data-pj-endereco=' + data.id_endereco + ']').remove();
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
            $('#end_estado option[value='+data.estado+']').prop("selected", "selected");
            $('#end_categoria option[value='+data.categoria+']').prop("selected", "selected");
            $('#legend_form_enderecos').html('Atualizar Endereço.').addClass('text-primary');

        },
        error: function(data) {
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
        error: function(data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#form_end_reset').click(function() {
    $('#form_pj_enderecos input[name=id_endereco]').val('');
    $('#legend_form_enderecos').html('Cadastrar Endereço').removeClass('text-primary');

});
