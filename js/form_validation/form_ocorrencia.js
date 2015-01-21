$('#ocorrenciaform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
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
