/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE INFORMAÇÕES DE ESTUDANTE */
var formEstudante = $('#form_estudante');
var tableEstudante = $('#tb_estudante');

formEstudante.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        select_inst_ensino: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informe a Instituição.'
                }
            }
        },
        select_curso: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informe o curso.'
                }
            }
        },
        select_periodo_curso: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informe o período.'
                }
            }
        },
        dt_inicio_curso: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe a data de início.'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        },
        dt_fim_curso: {
            group: '.col-sm-3',
            validators: {
                notEmpty: {
                    message: 'Informe a data de fim.'
                },
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
        url: "InfoEstudante/cadastra",
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
