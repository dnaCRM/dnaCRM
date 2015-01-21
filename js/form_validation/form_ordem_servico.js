//var optionFinalizado = $('#estagio option:contains("Finalizado")');
var selectEstagio = $('#estagio')
var selected = selectEstagio.val();

var d = new Date();
var hoje = d.getDate()+'/'+d.getMonth()+1+'/'+ d.getFullYear();

console.log(hoje);

$(function () {
    if (selected == 58) {
        $('.field_hidden').fadeIn();
    }
});

selectEstagio.change(function () {
    if (selectEstagio.val() == 58) {
        $('.field_hidden').fadeIn();
        var d = new Date();
        var hoje = d.getDate()+'/'+d.getMonth()+1+'/'+ d.getFullYear();
        $('#dt_fim').val(hoje);
    } else {
        $('.field_hidden').fadeOut();
    }
});

$('#ordemservicoform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
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


