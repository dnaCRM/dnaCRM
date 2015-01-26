$('#tb_pj_telefonesll').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    scrollY: 200,
    paging: false,
    "searching": false
});

$('#pessoajuridicaform').bootstrapValidator({
    excluded: ':disabled',
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
                    data: function(validator) {
                        return {
                            cd_pessoa_juridica: validator.getFieldElements('cd_pessoa_juridica').val()
                        };
                    },
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
                    data: function(validator) {
                        return {
                            cd_pessoa_juridica: validator.getFieldElements('cd_pessoa_juridica').val()
                        };
                    },
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteRazaoSocial/",
                    delay: 2000
                }
            }
        },
        email: {
            validators: {
                emailAddress: {
                    message: 'E-mail inválido'
                },
                stringLength: {
                    max: 50,
                    message: 'Deve ter entre 5 e 50 caracteres.'
                },
                remote: {
                    message: 'Este e-mail já existe em outro cadastro.',
                    data: function(validator) {
                        return {
                            cd_pessoa_juridica: validator.getFieldElements('cd_pessoa_juridica').val()
                        };
                    },
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteEmail/"
                }
            }
        },
        cnpj: {
            group: '.col-sm-4',
            validators: {
                stringLength: {
                    min: 18,
                    max: 18,
                    message: 'Quantidade de caracteres invalida.'
                },
                remote: {
                    message: 'Este CNPJ já existe em outro cadastro.',
                    data: function(validator) {
                        return {
                            cd_pessoa_juridica: validator.getFieldElements('cd_pessoa_juridica').val()
                        };
                    },
                    type: 'POST',
                    url: "PessoaJuridica/checkExisteCNPJ/"
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
$('#form_pj_telefones').bootstrapValidator({
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


/** Início - Botões Atualizar e Apagar  PJ Telefone */
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
/** Fim - Botões Atualizar e Apagar PJ Telefone*/
/* FIM DO CÓDIGO PARA MANIPULAÇÃO DE TELEFONES DE PESSOA JURÍDICA */

/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE ENDEREÇOS DE PESSOA JURÍDICA */
$('#form_pj_enderecos').bootstrapValidator({
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


//////////////////- Cadastro de Ramo de Atividade -///////////////////////////////////////
var formPJNewRamoAtiv = $('#form_pj_new_ramo_ativ');
var selectRamoAtiv = $('#cd_ramo_atividade');
var newRamoAtivModal = $('#new_ramo_ativ');

selectRamoAtiv.change(function () {
    if ($(this).val() == 'new_ra') {
        newRamoAtivModal.modal('show');
    }
});

formPJNewRamoAtiv.bootstrapValidator({
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

            var option = '<option id="new-ra" value="' + data.cd_vl_categoria + '">' + data.desc_vl_categoria + '</option>';
            $(option).prependTo(selectRamoAtiv);

            $('#new-ra').prop('selected', 'selected');

            newRamoAtivModal.modal('hide');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});
//////////////////- Fim Cadastro de Ramo de Atividade -///////////////////////////////////