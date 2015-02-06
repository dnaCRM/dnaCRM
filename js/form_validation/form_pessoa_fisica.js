/////////////////////////// Manipula formulário de Pessoa Física ///////////////////////

$('#tb_pf_telefonesll').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    scrollY: 200,
    paging: false,
    "searching": false
});

var pfButtonIeEstuda = $('#ie_estuda_sim');
var pfButtonNaoIeEstuda = $('#ie_estuda_nao');

pfButtonIeEstuda.on('click', function () {
    $('.field_hidden').fadeIn();
});

pfButtonNaoIeEstuda.on('click', function () {
    $('.field_hidden').fadeOut();
});

$(function () {
    if (pfButtonIeEstuda.hasClass('active')) {
        $('.field_hidden').fadeIn();
    }
});

$('#pessoafisicaform').bootstrapValidator({
    excluded: ':disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
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
                    max: 50,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                regexp: {
                    regexp: /^[a-zA-ZéúíóáÉÚÍÓÁèùìòàçÇÈÙÌÒÀõãñÕÃÑêûîôâÊÛÎÔÂëÿüïöäËYÜÏÖÄ\-\s]+$/,
                    message: 'O nome só pode ter letras e espaços.'
                }
            }
        },
        email: {
            validators: {
                verbose: false,
                emailAddress: {
                    message: 'E-mail inválido'
                },
                stringLength: {
                    min: 5,
                    max: 60,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                remote: {
                    message: 'Este e-mail já existe em outro cadastro.',
                    data: function (validator) {
                        return {
                            cd_pessoa_fisica: validator.getFieldElements('cd_pessoa_fisica').val()
                        };
                    },
                    type: 'POST',
                    url: "PessoaFisica/checkExisteEmail/"
                }
            }
        },
        cpf: {
            group: '.col-sm-4',
            validators: {
                stringLength: {
                    min: 14,
                    max: 14,
                    message: 'Quantidade de caracteres invalida.'
                },
                remote: {
                    message: 'Este CPF já existe em outro cadastro.',
                    data: function (validator) {
                        return {
                            cd_pessoa_fisica: validator.getFieldElements('cd_pessoa_fisica').val()
                        };
                    },
                    type: 'POST',
                    url: "PessoaFisica/checkExisteCPF/"
                }
            }
        },
        rg: {
            group: '.col-sm-4',
            validators: {
                stringLength: {
                    min: 5,
                    message: 'Quantidade de caracteres invalida.'
                },
                regexp: {
                    regexp: /^[A-Z0-9]+$/,
                    message: 'Só pode conter letras maiúsculas e números.'
                },
                remote: {
                    message: 'Este RG ja existe em outro cadastro.',
                    data: function (validator) {
                        return {
                            cd_pessoa_fisica: validator.getFieldElements('cd_pessoa_fisica').val()
                        };
                    },
                    type: 'POST',
                    url: "PessoaFisica/checkExisteRG/"
                }
            }
        },
        dt_nascimento: {
            validators: {
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

/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA FÍSICA */
$('#form_pf_telefones').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
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
        validating: 'glyphicon glyphicon-refresh fa-spin'
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
        validating: 'glyphicon glyphicon-refresh fa-spin'
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
/** Fim - Botões Atualizar e Apagar PF Endereço*/
/* FIM DO CÓDIGO PARA MANIPULAÇÃO DE ENDEREÇOS DE PESSOA FÍSICA */

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
        validating: 'glyphicon glyphicon-refresh fa-spin'
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
            $('#legend_form_end_morador').html('Atualizar Endereço.').addClass('text-primary');
            preencherMenuEndMorador(data);

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

$('#form_m_end_reset').click(function (e) {
    var $form = $('#form_end_morador');
    var bv = $form.data('bootstrapValidator');

    $('#form_end_morador input[name=id_m_end]').val('');
    $('#legend_form_end_morador').html('Cadastrar Endereço').removeClass('text-primary');
    bv.resetForm(true);
});
/** Fim - Botões Atualizar e Apagar PF Telefone*/
/* Fim da da Manipulação de Morador Endereço */
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
            validating: 'glyphicon glyphicon-refresh fa-spin'
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

                if ($('#checkbox_del_relac').is(':checked')) {
                    $('#tb_lista-relacionados tr[data-pessoa-relac=' + data.cd_pessoa_fisica_2 + ']').remove();
                }

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

function preencherMenuEndMorador(objeto) {
    //var condominio = $("#m_end_condominio").val();

    if (objeto.cd_condominio != '') {
        $.ajax({
            type: "get",
            url: "Setor/listByCondId/" + objeto.cd_condominio,
            success: function (data) {
                $("#m_end_setor").html(data);
                $('#m_end_condominio option[value=' + objeto.cd_condominio + ']').prop("selected", "selected");
                $('#m_end_setor option[value=' + objeto.cd_setor + ']').prop('selected', 'selected');
            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
    }

    //var setor = $("#m_end_setor").val();

    if (objeto.cd_setor != '') {
        $.ajax({
            type: "get",
            url: "Apartamento/listBySetorId/" + objeto.cd_setor,
            success: function (data) {
                $("#m_end_apartamento").html(data);
                $('#m_end_apartamento option[value=' + objeto.cd_apartamento + ']').prop("selected", "selected");
            },
            error: function (data) {
                $(data.responseText).appendTo('#responseAjaxError');
            }
        });
    }
}

Webcam.set({
    // live preview size
    width: 320,
    height: 240,

    // device capture size
    dest_width: 640,
    dest_height: 480,

    // final cropped size
    crop_width: 480,
    crop_height: 480,

    // format and quality
    image_format: 'jpeg',
    jpeg_quality: 90
});

function take_snapshot() {
    Webcam.snap(function (data_uri) {
        document.getElementById('webcam_preview').innerHTML = '<img class="img-circle img-responsive" src="' + data_uri + '"/>';

        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

        document.getElementById('webcam_photo').value = raw_image_data;

        $('#pf_foto').prop('src', data_uri);
        console.log(data_uri);
    });
}

$('#btn_camera').on('click', function () {
    $('#camera_container').html(
        '<div id="webcam_live" class="img-circle"></div>'
    )
    Webcam.attach('#webcam_live');
});

//////////////////- Cadastro de Profissao -////////////////////////////
var formProfissao = $('#form_pf_new_pro');
var selectProfissao = $('#cd_profissao');
var inputIdProfissao = $('input[name=id_profissao]');
var newProModal = $('#new_pro_modal');

selectProfissao.change(function () {
    if ($(this).val() == 'new_pro') {
        newProModal.modal('show');
    }
});

newProModal.on('hide.bs.modal', function(){
    if (selectProfissao.val() == 'new_pro'){
        selectProfissao.val('');
    }
});

formProfissao.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nome_profissao: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome da Profissão.'
                },
                remote: {
                    message: 'Esta profissão já existe.',
                    data: function (validator) {
                        return {
                            id_profissao: validator.getFieldElements('id_profissao').val()
                        };
                    },
                    type: 'POST',
                    url: "Profissao/checkExisteNome/"
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
        url: "Profissao/request",
        data: dados,
        dataType: 'json',
        success: function (data) {
            var option = '<option id="new-pro" value="' + data.id_profissao + '">' + data.nome_profissao + '</option>';
            $(option).prependTo(selectProfissao);

            $('#new-pro').prop('selected', 'selected');

            inputIdProfissao.val('');
            newProModal.modal('hide');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});
//////////////////- Fim Cadastro de Profissao -///////////////////////////////

//////////////////- Cadastro de Curso -///////////////////////////////////////
var formPfNewCurso = $('#form_pf_new_curso');
var selectCurso = $('#cd_grau_ensino');
var inputNomeCurso = $('#nome_curso');
var newCursoModal = $('#new_curso_modal');

selectCurso.change(function () {
    if ($(this).val() == 'new_curso') {
        newCursoModal.modal('show');
    }
});

newCursoModal.on('hide.bs.modal', function(){
    if (selectCurso.val() == 'new_curso'){
        selectCurso.val('');
    }
});

formPfNewCurso.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nome_sub_categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome do curso.'
                },
                remote: {
                    message: 'Este curso já existe.',
                    type: 'POST',
                    url: "CategoriaValor/checkExisteNome/"
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
        url: "CategoriaValor/request",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var option = '<option id="new-curso" value="' + data.cd_vl_categoria + '">' + data.desc_vl_categoria + '</option>';
            $(option).prependTo(selectCurso);

            $('#new-curso').prop('selected', 'selected');

            newCursoModal.modal('hide');
            inputNomeCurso.val('');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});
//////////////////- Fim Cadastro de Curso -///////////////////////////////////

//////////////////- Cadastro de Pessoa Jurídica -///////////////////////////////////

var formNewPessoaJuridica = $('#form_pf_new_pj');
var selectPessoaJuridica = $('#cd_cgc');
var newPJModal = $('#new_pj_modal');

selectPessoaJuridica.change(function () {
    if ($(this).val() == 'new_pj') {
        newPJModal.modal('show');
    }
});

newPJModal.on('hide.bs.modal', function(){
    if (selectPessoaJuridica.val() == 'new_pj'){
        selectPessoaJuridica.val('');
    }
});

formNewPessoaJuridica.bootstrapValidator({
    excluded: 'disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nm_fantasia: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 2,
                    max: 50,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                remote: {
                    message: 'Este Nome Fantasia já existe em outro cadastro.',
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteNomeFantasia/",
                    delay: 2000
                }
            }
        },
        desc_razao: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 5,
                    max: 50,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                remote: {
                    message: 'Esta Razão Social já existe em outro cadastro.',
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteRazaoSocial/",
                    delay: 2000
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
        url: "PessoaJuridica/request",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var option = '<option id="new-pj" value="' + data.cd_pessoa_juridica + '">' + data.nm_fantasia + '</option>';
            $(option).prependTo(selectPessoaJuridica);

            $('#new-pj').prop('selected', 'selected');

            newPJModal.modal('hide');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

//////////////////- Fim Cadastro de Pessoa Jurídica -///////////////////////////////////



//////////////////- Cadastro de Instituição de Ensino -///////////////////////////////////

var formNewInstEnsino = $('#form_pf_new_ie');
var selectInstEnsino = $('#cd_instituicao');
var newIEModal = $('#new_ie_modal');

selectInstEnsino.change(function () {
    if ($(this).val() == 'new_ie') {
        newIEModal.modal('show');
    }
});

newIEModal.on('hide.bs.modal', function(){
    if (selectInstEnsino.val() == 'new_ie'){
        selectInstEnsino.val('');
    }
});

formNewInstEnsino.bootstrapValidator({
    excluded: 'disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nm_fantasia: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 2,
                    max: 50,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                remote: {
                    message: 'Este Nome Fantasia já existe em outro cadastro.',
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteNomeFantasia/",
                    delay: 2000
                }
            }
        },
        desc_razao: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório'
                },
                stringLength: {
                    min: 5,
                    max: 50,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                remote: {
                    message: 'Esta Razão Social já existe em outro cadastro.',
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteRazaoSocial/",
                    delay: 2000
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
        url: "PessoaJuridica/request",
        data: dados,
        dataType: 'json',
        success: function (data) {

            var option = '<option id="new-ie" value="' + data.cd_pessoa_juridica + '">' + data.nm_fantasia + '</option>';
            $(option).prependTo(selectInstEnsino);

            $('#new-ie').prop('selected', 'selected');

            newIEModal.modal('hide');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

//////////////////- Fim Cadastro de Instituição de Ensino -///////////////////////////////////


///////////////////////- Manipula Cidade de Origem -//////////////////////////////////

var inputCidadeOrigem = $('[name=cidade_origem]');
var buttonCidadeOrigem = $('#btn-cidade_origem');
var cidadeModal = $('#cidade_origem_modal');
var pcardCidade = $('#pcard-cidade');

buttonCidadeOrigem.click(function (e) {
    e.preventDefault();
    cidadeModal.modal('show');
});

pcardCidade.delegate('#remove-cidade', 'click', function(e) {
    e.preventDefault();
    buttonCidadeOrigem
        .removeClass('btn-info')
        .addClass('btn-primary')
        .html('<i class="fa fa-plus"></i> Definir ocorrencia');
    inputCidadeOrigem.val('');
    $('#pcard-cidade .panel').fadeOut();
});

$(function () {
    if (inputCidadeOrigem.val() == '') {
        buttonCidadeOrigem
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('<i class="fa fa-plus"></i> Definir cidade');

    }
});

function buscaCidade() {
    var nome_cidade = $('#nome_cidade_origem').val();
    if (nome_cidade != '') {
        $('#busca-cidade-resultado').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.ajax({
            type: 'post',
            url: 'Cidades/buscaAjax/',
            data: 'nome_cidade_origem=' + nome_cidade,
            dataType: 'json',
            success: function (data) {

                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html +=
                        '<div class="panel-body">' +
                            '<div class="col-sm-1">' +
                            '<a href="#" ' +
                            'data-id-cidade="' + data[i].id + '" ' +
                            'data-nome-cidade="' + data[i].nome + '" ' +
                            'data-estado="' + data[i].estado_nome + '" ' +
                            'data-id-estado="' + data[i].estado_id + '" ' +
                            'title="Adicionar" ' +
                            'class="btn btn-primary btn-xs btn-circle add-cidade">' +
                            '<i class="fa fa-check"></i></a> '+
                            '</div>'+
                            '<div class="col-sm-11">' +
                            ' ' + data[i].nome +',  '+ data[i].estado_nome + '</a>' +
                            '</div>'+
                            '</div>';
                }

                var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                $('#busca-cidade-resultado').html(resultBody).hide().fadeIn();

                buttonCidadeOrigem
                    .addClass('btn-info')
                    .removeClass('btn-primary')
                    .html('<i class="fa fa-bullhorn"></i> Atualizar Cidade de Origem');

            },
            error: function (data) {
                $(data.responseText).appendTo('#area-do-resultado');
            }
        });
    } else {
        $('#busca-cidade-resultado').fadeOut();
    }
}

$('#nome_cidade_origem').keyup(function () {
    buscaCidade();
}).focusout(function () {
    $('#busca-cidade-resultado').fadeOut();
});

$('#busca-cidade-resultado').delegate('.add-cidade', 'click', function (e) {
    e.preventDefault();
    var cidade = $(this);
    var id = cidade.attr('data-id-cidade');
    var nome_cidade = cidade.attr('data-nome-cidade');
    var nome_estado = cidade.attr('data-estado');

    var pcard =
            '<div class="panel panel-default">' +
            '<div class="panel-body">' +
            '<i class="fa fa-map-marker pull"></i> ' + nome_cidade + ', ' + nome_estado +
            '<a href="#"' +
            'data-toggle="tooltip"' +
            'data-placement="left"' +
            'title="Remover Cidade"' +
            'class="btn btn-danger btn-xs btn-circle btn-pcard-bottom-right"' +
            'id="remove-cidade">' +
            '<i class="fa fa-minus"></i>' +
            '</a>' +
            '</div>' +
            '</div>';

    pcardCidade.html(pcard).hide().fadeIn();
    inputCidadeOrigem.val(id);
    cidadeModal.modal('hide');
});

///////////////////////- Fim Manipula Cidade de Origem -//////////////////////////////