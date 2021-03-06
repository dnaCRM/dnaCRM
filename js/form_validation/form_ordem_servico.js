//var optionFinalizado = $('#estagio option:contains("Finalizado")');
var ordemDeServicoForm = $('#ordemservicoform');
var selectEstagio = $('#estagio');
var selected = selectEstagio.val();

var d = new Date();
var dia = d.getDate();
var mes = d.getMonth() + 1;
var ano = d.getFullYear();
var hoje = (dia < 10 ? '0'+dia : dia) + '/' + ((mes) < 10 ? '0'+mes : mes ) + '/' + ano;

$(function () {
    if (selected == 58) {
        $('.field_hidden').fadeIn();
    }
});

selectEstagio.change(function () {
    if (selectEstagio.val() == 58) {
        $('.field_hidden').fadeIn();
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
        cd_condominio: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o condomínio é obrigatório.'
                }
            }
        },
        cd_setor: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o setor é obrigatório.'
                }
            }
        },solicitante: {
            group: '.col-sm-6',
            validators: {
                notEmpty: {
                    message: 'Informar o solicitante é obrigatório.'
                }
            }
        },
        estagio: {
            group: '.col-md-4',
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
        sub_tipo: {
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
                    message: 'Informar o assunto é obrigatório.'
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
                    message: 'Informar o descrição é obrigatório.'
                },
                stringLength: {
                    min: 18,
                    message: 'No mánimo 18 caracteres.'
                }
            }
        },
        dt_inicio: {
            group: '.col-md-4',
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
        dt_fim: {
            group: '.col-md-4',
            validators: {
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Data inválida.'
                }
            }
        }
    }
});

///////////////////////- Manipula Executor -//////////////////////////////////
var inputExecutor = $('[name=executor]');
var buttonExecutor = $('#btn-executor');
var buttonRemoveExecutor = $('#remove-executor');
var executorModal = $('#executor_modal');
var pcardExecutor = $('#pcard-executor');

buttonExecutor.click(function (e) {
    e.preventDefault();
    executorModal.modal('show');
});

pcardExecutor.delegate('#remove-executor', 'click', function(e) {
    e.preventDefault();
    buttonExecutor
        .removeClass('btn-info')
        .addClass('btn-primary')
        .html('<i class="fa fa-plus"></i> Definir executor');
    inputExecutor.val('');
    $('#pcard-executor .pcard-name').html('Executor não definido');
    $('#pcard-executor img')
        .prop('src','img/default.jpg');
});

$(function () {
    if (inputExecutor.val() == '') {
        buttonExecutor
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('<i class="fa fa-plus"></i> Definir executor');

    }
});

function buscaExecutor() {
    var nome = $('#nome_executor').val();
    if (nome != '') {
        $('#busca-executor-resultado').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
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
                        '<button ' +
                        'data-id-executor="' + data[i].id + '" ' +
                        'data-nome-executor="' + data[i].nome + '" ' +
                        'data-foto-executor="' + data[i].foto + '" ' +
                        'title="Adicionar" class="btn btn-info btn-xs btn-circle add-executor">' +
                        '<i class="fa fa-bullhorn"></i></button></p></div></div>';
                }

                var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                $('#busca-executor-resultado').html(resultBody).show();

                buttonExecutor
                    .addClass('btn-info')
                    .removeClass('btn-primary')
                    .html('<i class="fa fa-bullhorn"></i> Atualizar executor');

            },
            error: function (data) {
                $(data.responseText).appendTo('#area-do-resultado');
            }
        });
    } else {
        $('#busca-executor-resultado').fadeOut();
    }
}

$('#nome_executor').keyup(function () {
    buscaExecutor();
}).focusout(function () {
    $('#busca-executor-resultado').fadeOut();
});

$('#busca-executor-resultado').delegate('.add-executor', 'click', function (e) {
    e.preventDefault();
    var executor = $(this);
    var id = executor.attr('data-id-executor');
    var nome = executor.attr('data-nome-executor');
    var foto = executor.attr('data-foto-executor');

    var pcard =
        '<div class="col-md-3">' +
            '<div class="panel profile-card pcard-sm">' +
                '<div class="panel-body">' +
                    '<div class="profile-card-foto-container">' +
                        '<img src="' + foto + '" class="img-circle profilefoto foto-md">' +
                    '</div>' +
                    '<div class="pcard-name">' +
                        '<a href="PessoaFisica/visualizar/' + id + '">' + nome + '</a>' +
                    '<div class="pcard-info">Executor</div>' +
                    '<a href="#"' +
                        'data-toggle="tooltip"' +
                        'data-placement="left"' +
                        'title="Remover Executor"' +
                        'class="btn btn-danger btn-xs btn-circle btn-pcard-bottom-right"' +
                        'id="remove-executor">' +
                    '<i class="fa fa-minus"></i>' +
                    '</a>' +
                '</div>' +
            '</div>' +
        '</div>';

    pcardExecutor.html(pcard).hide().fadeIn();
    inputExecutor.val(id);
    executorModal.modal('hide');

    ordemDeServicoForm
        .bootstrapValidator('updateStatus', inputExecutor, 'NOT_VALIDATED')
        .bootstrapValidator('validateField', inputExecutor);
});

///////////////////////- Fim Manipula Executor -//////////////////////////////////

///////////////////////- Manipula Solicitante -//////////////////////////////////
var inputSolicitante = $('[name=solicitante]');
var buttonSolicitante = $('#btn-solicitante');
var solicitanteModal = $('#solicitante_modal');
var pcardSolicitante = $('#pcard-solicitante');

buttonSolicitante.click(function (e) {
    e.preventDefault();
    solicitanteModal.modal('show');
});

$(function () {
    if (inputSolicitante.val() == '') {
        buttonSolicitante
            .removeClass('btn-warning')
            .addClass('btn-primary')
            .html('<i class="fa fa-plus"></i> Definir solicitante');

    }
});

function buscaSolicitante() {
    var nome = $('#nome_solicitante').val();
    if (nome != '') {
        $('#busca-solicitante-resultado').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
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
                        '<button ' +
                        'data-id-solicitante="' + data[i].id + '" ' +
                        'data-nome-solicitante="' + data[i].nome + '" ' +
                        'data-foto-solicitante="' + data[i].foto + '" ' +
                        'title="Adicionar" class="btn btn-info btn-xs btn-circle add-solicitante">' +
                        '<i class="fa fa-bullhorn"></i></button></p></div></div>';
                }

                var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                $('#busca-solicitante-resultado').html(resultBody).show();

                buttonSolicitante
                    .addClass('btn-info')
                    .removeClass('btn-warning')
                    .html('<i class="fa fa-bullhorn"></i> Atualizar solicitante');

            },
            error: function (data) {
                $(data.responseText).appendTo('#area-do-resultado');
            }
        });
    } else {
        $('#busca-solicitante-resultado').fadeOut();
    }
}

$('#nome_solicitante').keyup(function () {
    buscaSolicitante();
}).focusout(function () {
    $('#busca-solicitante-resultado').fadeOut();
});

$('#busca-solicitante-resultado').delegate('.add-solicitante', 'click', function (e) {
    e.preventDefault();
    var solicitante = $(this);
    var id = solicitante.attr('data-id-solicitante');
    var nome = solicitante.attr('data-nome-solicitante');
    var foto = solicitante.attr('data-foto-solicitante');

    var pcard =
        '<div class="col-md-3">' +
            '<div class="panel profile-card pcard-sm">' +
            '<div class="panel-body">' +
            '<div class="profile-card-foto-container">' +
            '<img src="' + foto + '" class="img-circle profilefoto foto-md">' +
            '</div>' +
            '<div class="pcard-name">' +
            '<a href="PessoaFisica/visualizar/' + id + '">' + nome + '</a>' +
            '<div class="pcard-info">Solicitante</div>' +
            '</div>' +
            '</div>' +
            '</div>';

    pcardSolicitante.html(pcard).hide().fadeIn();
    inputSolicitante.val(id);
    solicitanteModal.modal('hide');

    ordemDeServicoForm
        .bootstrapValidator('updateStatus', inputSolicitante, 'NOT_VALIDATED')
        .bootstrapValidator('validateField', inputSolicitante);
});

///////////////////////- Fim Manipula Solicitante -//////////////////////////////////

///////////////////////- Manipula Ocorrência -//////////////////////////////////
var inputOcorrencia = $('[name=ocorrencia]');
var buttonOcorrencia = $('#btn-ocorrencia');
var ocorrenciaModal = $('#ocorrencia_modal');
var pcardOcorrencia = $('#pcard-ocorrencia');

buttonOcorrencia.click(function (e) {
    e.preventDefault();
    ocorrenciaModal.modal('show');
    $('#nome_ocorrencia').focus();
});

pcardOcorrencia.delegate('#remove-ocorrencia', 'click', function(e) {
    e.preventDefault();
    buttonOcorrencia
        .removeClass('btn-info')
        .addClass('btn-primary')
        .html('<i class="fa fa-plus"></i> Definir ocorrencia');
    inputOcorrencia.val('');
    $('#pcard-ocorrencia .col-sm-6').fadeOut();
});

$(function () {
    if (inputOcorrencia.val() == '') {
        buttonOcorrencia
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('<i class="fa fa-plus"></i> Definir ocorrencia');

    }
});

function buscaOcorrencia() {
    var assunto = $('#nome_ocorrencia').val();

    if (assunto != '') {
        $('#busca-ocorrencia-resultado').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.ajax({
            type: 'post',
            url: 'Ocorrencia/buscaAjax/',
            data: 'assunto=' + assunto + '&id_condominio=' + selectCondominio.val(),
            dataType: 'json',
            success: function (data) {

                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html +=
                        '<div class="panel-body">' +
                            '<div class="col-sm-2">' +
                            '<a href="#" ' +
                            'data-id-ocorrencia="' + data[i].cd_ocorrencia + '" ' +
                            'data-assunto-ocorrencia="' + data[i].desc_assunto + '" ' +
                            'data-dt-ocorrencia="' + data[i].dt_ocorrencia + '" ' +
                            'title="Adicionar" ' +
                            'class="btn btn-primary btn-xs btn-circle add-ocorrencia">' +
                            '<i class="fa fa-check"></i></a> '+
                            '</div>'+
                            '<div class="col-sm-7">' +
                            '<a title="Visualizar Ocorrência" href="Ocorrencia/visualizar/' + data[i].cd_ocorrencia + '">' +
                            'Nº ' + data[i].cd_ocorrencia +' -  '+ data[i].desc_assunto + '</a>' +
                            '<br>'+ data[i].setor +
                            '</div>'+
                            '<div class="col-sm-3">'+data[i].dt_ocorrencia+
                            '</div>'+
                        '</div>';
                }

                var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                $('#busca-ocorrencia-resultado').html(resultBody).show();

                buttonOcorrencia
                    .addClass('btn-info')
                    .removeClass('btn-primary')
                    .html('<i class="fa fa-bullhorn"></i> Atualizar ocorrencia');

            },
            error: function (data) {
                $(data.responseText).appendTo('#area-do-resultado');
            }
        });
    } else {
        $('#busca-ocorrencia-resultado').fadeOut();
    }
}

$('#nome_ocorrencia').keyup(function () {
    buscaOcorrencia();
}).focusout(function () {
    $('#busca-ocorrencia-resultado').fadeOut();
});

$('#busca-ocorrencia-resultado').delegate('.add-ocorrencia', 'click', function (e) {
    e.preventDefault();
    var ocorrencia = $(this);
    var id = ocorrencia.attr('data-id-ocorrencia');
    var assunto = ocorrencia.attr('data-assunto-ocorrencia');
    var dt_ocorrencia = ocorrencia.attr('data-dt-ocorrencia');

    var pcard =
        '<div class="col-sm-6">' +
            '<div class="panel panel-default">' +
            '<div class="panel-body">' +
            '<a href="Ocorrencia/visualizar/' + id + '">' + assunto + '</a><br>' +
            '<i class="fa fa-calendar-o"></i> '+ dt_ocorrencia +
            '<a href="#"' +
                'data-toggle="tooltip"' +
                'data-placement="left"' +
                'title="Remover Ocorrencia"' +
                'class="btn btn-danger btn-xs btn-circle btn-pcard-bottom-right"' +
                'id="remove-ocorrencia">' +
            '<i class="fa fa-minus"></i>' +
            '</a>' +
            '</div>' +
            '</div>' +
            '</div>';

    pcardOcorrencia.html(pcard).hide().fadeIn();
    inputOcorrencia.val(id);
    ocorrenciaModal.modal('hide');

    ordemDeServicoForm
        .bootstrapValidator('updateStatus', inputOcorrencia, 'NOT_VALIDATED')
        .bootstrapValidator('validateField', inputOcorrencia);
});

///////////////////////- Fim Manipula Ocorrência -//////////////////////////////


/* Pesquisa Setor */

var selectCondominio = $('#os_cd_condominio');
var cdCondominio = selectCondominio.val();

var btnPesquisaSetor = $('#btn-pesquisa-setor');
var pesquisaSetorModal = $('#setor_modal');
var inputNomeSetor = $('#nome_setor');
var inputIdSetor = $('#cd_setor');

btnPesquisaSetor.click(function (e) {
    e.preventDefault();
    pesquisaSetorModal.modal('show');
});

function buscaSetorPorCond() {
    cdCondominio = selectCondominio.val();
    var nome_setor = $('#nome-setor').val();

    if (nome_setor != '') {
        $('#busca-setor-resultado').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
        $.ajax({
            type: "get",
            url: "Setor/buscaPorCondAjax/" + nome_setor + "/" + cdCondominio,
            dataType: 'json',
            success: function (data) {

                var html = '';
                for (var i = 0; i < data.length; i++) {
                    if (data[i].setor_grupo != ''){
                        data[i].setor_grupo = ' - ' + data[i].setor_grupo;
                    }
                    html +=
                        '<div class="panel-body">' +
                            '<div class="col-sm-1">' +
                            '<a href="#" ' +
                            'data-cd-setor="' + data[i].cd_setor + '" ' +
                            'data-nome-setor="' + data[i].nm_setor + '" ' +
                            'title="Adicionar" ' +
                            'class="btn btn-primary btn-xs btn-circle add-setor">' +
                            '<i class="fa fa-check"></i></a> '+
                            '</div>'+
                            '<div class="col-sm-11">' +
                            ' ' + data[i].nm_setor + data[i].setor_grupo + '<br>' + data[i].sub_tipo +
                            '</div>'+
                            '</div>';
                }

                var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                $('#busca-setor-resultado').html(resultBody).show();


            },
            error: function (data) {
                $(data.responseText).appendTo('#area-do-resultado');
            }
        });
    } else {
        $('#busca-setor-resultado').fadeOut();
    }
}

$('#nome-setor').keyup(function () {
    buscaSetorPorCond();
}).focusout(function () {
    $('#busca-setor-resultado').fadeOut();
});

$('#busca-setor-resultado').delegate('.add-setor','click',function(e) {
    e.preventDefault();
    var setor = $(this);
    var id_setor = setor.attr('data-cd-setor');
    var nome_setor = setor.attr('data-nome-setor');

    inputIdSetor.val(id_setor);
    inputNomeSetor.html(nome_setor);
    pesquisaSetorModal.modal('hide');

    ordemDeServicoForm
        .bootstrapValidator('updateStatus', inputIdSetor, 'NOT_VALIDATED')
        .bootstrapValidator('validateField', inputIdSetor);

});

/* Fim Pesquisa Setor */

/* Início manipulação de tipode OS*/
var selectTipoOS = $('#tipo');
var selectSubTipoOS = $('#sub_tipo');

selectTipoOS.change(function(){
    var id_grupo = selectTipoOS.val();

    $.ajax({
        type: "get",
        url: "CategoriaValor/listByGroupId/" + id_grupo,
        success: function (data) {
            selectSubTipoOS.html(data);

            /* REVALIDAÇÃO DE CAMPO **********************************/
            ordemDeServicoForm
                .bootstrapValidator('updateStatus', selectSubTipoOS, 'NOT_VALIDATED')
                .bootstrapValidator('validateField', selectSubTipoOS);
            /* *************************************************** */
        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

/* Fim manipulação de tipode OS*/

/*
 var $form = $('#ocorrenciaform');
 var bv = $form.data('bootstrapValidator');
 bv.resetForm(true);
 */
