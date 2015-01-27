//var optionFinalizado = $('#estagio option:contains("Finalizado")');
var ordemDeServicoForm = $('#ordemservicoform');
var selectEstagio = $('#estagio');
var selected = selectEstagio.val();

var d = new Date();
var hoje = d.getDate()+'/'+d.getMonth()+1+'/'+ d.getFullYear();

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

ordemDeServicoForm.bootstrapValidator({
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
                    message: 'Informar o solicitante Ã© obrigatÃ³rio.'
                }
            }
        },
        estagio: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o estÃ¡gio Ã© obrigatÃ³rio.'
                }
            }
        },
        tipo: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o tipo Ã© obrigatÃ³rio.'
                }
            }
        },
        assunto: {
            validators: {
                notEmpty: {
                    message: 'Informar o assunto Ã© obrigatÃ³rio'
                },
                stringLength: {
                    min: 5,
                    message: 'No mÃ­nimo 5 caracteres.'
                }
            }
        },
        descricao: {
            validators: {
                notEmpty: {
                    message: 'Informar o descriÃ§Ã£o Ã© obrigatÃ³rio'
                },
                stringLength: {
                    min: 18,
                    message: 'No mÃ­nimo 18 caracteres.'
                }
            }
        },
        dt_inicio: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Campo obrigatÃ³rio'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data invÃ¡lida.'
                }
            }
        }
    }
});

