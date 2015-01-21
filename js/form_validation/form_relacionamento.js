
//////////////////- Cadastro de Relacionamentos -////////////////////////////
var formRelacionamentos = $('#form_relacionamentos');
var tableRelacionamentos = $('#tb_relacionamentos');
var inputIdRelacionamento = $('#id_relacionamento');
var inputNomeRelacionamento = $('#nome_relacionamento');

tableRelacionamentos.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    "pageLength": 5,
    paging: true,
    "searching": true
});

formRelacionamentos.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nome_sub_categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome da Relacionamento.'
                },
                remote: {
                    message: 'Esta Categoria já existe.',
                    data: function(validator) {
                        return {
                            id_sub_categoria: validator.getFieldElements('id_sub_categoria').val()
                        };
                    },
                    type: 'POST',
                    url: "CategoriaValor/checkExisteNome/"
                }
            }
        },
        genero: {
            validators: {
                notEmpty: {
                    message: 'Obrigatório'
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

            if (data.delete == 's') {
                $('tr[data-id-Relacionamento=' + data.cd_vl_categoria + ']').remove();
            } else {

                var celulas =
                    '<td>' + data.cd_vl_categoria + '</td>' +
                        '<td>' + data.desc_vl_categoria + '</td>' +
                        '<td>' + data.genero + '</td>' +
                        '<td>' +
                        '<a href="#" class="btn btn-primary btn-sm btn-circle update_relacionamento" data-update-relacionamento-id="' + data.cd_vl_categoria + '"><i class="fa fa-edit"></i></a> ' +
                        '<a href="#" class="btn btn-warning btn-sm btn-circle delete_relacionamento" data-del-relacionamento-id="' + data.cd_vl_categoria + '"><i class="fa fa-trash-o"></i></a>' +
                        '</td>';
                var linha = '<tr data-id-Relacionamento="' + data.cd_vl_categoria + '">' + celulas + '</tr>';
                var id = $('#id_relacionamento').attr('value');

                if (id) {
                    var registro = $('tr[data-id-relacionamento=' + id + ']');
                    registro.html(celulas);
                    registro.addClass('active');
                } else {
                    $(linha).prependTo(tableRelacionamentos).hide().fadeIn();
                }
            }

            $('#legend_form_relacionamentos')
                .html('Cadastrar Relacionamento')
                .removeClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_relacionamento')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_relac').val('n');
            inputIdRelacionamento.val('');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

tableRelacionamentos.delegate('.update_relacionamento', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-update-relacionamento-id');
    $('#M, #F').removeClass('active');

    $.ajax({
        type: "GET",
        url: "CategoriaValor/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdRelacionamento.val(data.cd_vl_categoria);
            inputNomeRelacionamento.val(data.desc_vl_categoria);
            $('#legend_form_relacionamentos')
                .html('Atualizar Relacionamento ' + data.desc_vl_categoria)
                .addClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_relacionamento')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_relacionamento')
                .val('n');
            $('input[value=' + data.genero + ']').prop('checked', 'checked');
            $('#' + data.genero + '').addClass('active');

            formRelacionamentos.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

tableRelacionamentos.delegate('.delete_relacionamento', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-del-relacionamento-id');

    $.ajax({
        type: "GET",
        url: "CategoriaValor/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdRelacionamento.val(data.cd_vl_categoria);
            inputNomeRelacionamento.val(data.desc_vl_categoria);

            $('#legend_form_relacionamentos')
                .html('Apagar Relacionamento ' + data.desc_vl_categoria)
                .removeClass('text-primary')
                .addClass('text-danger');
            $('#cadastrar_relacionamento')
                .val('Confirmar')
                .addClass('btn-danger')
                .removeClass('btn-primary');
            $('#del_relacionamento')
                .val('s');
            $('input[value=' + data.genero + ']').prop('checked', 'checked');
            $('#' + data.genero + '').addClass('active');

            formRelacionamentos.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#relac_reset').click(function () {
    formRelacionamentos.data('bootstrapValidator').resetForm(true);
    $('#legend_form_relacionamentos')
        .html('Relacionamento')
        .removeClass('text-primary')
        .removeClass('text-danger');

    $('#cadastrar_relacionamento')
        .val('Cadastrar')
        .removeClass('btn-danger')
        .addClass('btn-primary');
    $('#del_relacionamento')
        .val('n');
    $('#M, #F').removeClass('active');
    formRelacionamentos.hide().fadeIn();
    inputIdRelacionamento.val('');
});

//////////////////- Fim do Cadastro de Relacionamentos -////////////////////////////

/////////////////- Cadastro de Relacionamento Parâmetro -//////////////////////////
var formRelacoes = $('#form_relacoes');
var selectRelac1 = $('#relac_1');
var selectRelac2 = $('#relac_2');
var tableRelacoes = $('#tb_relacoes');
var buttonRelac = $('#button_relac');
var buttonRelacContent = $('#buttonRelacContent');


function successButtonRelac() {

    buttonRelac
        .removeClass('btn-primary')
        .removeClass('btn-danger')
        .removeClass('disabled')
        .removeClass('btn-warning')
        .addClass('btn-success')
        .hide()
        .fadeIn();
    buttonRelacContent
        .removeClass('glyphicon-chevron-right')
        .removeClass('glyphicon-trash')
        .removeClass('glyphicon-remove')
        .addClass('glyphicon-ok');
}

function resetButtonRelac() {

    buttonRelac
        .addClass('btn-primary')
        .removeClass('btn-success')
        .removeClass('btn-danger')
        .removeClass('disabled')
        .removeClass('btn-warning')
        .hide()
        .fadeIn();
    buttonRelacContent
        .addClass('glyphicon-chevron-right')
        .removeClass('glyphicon-trash')
        .removeClass('glyphicon-remove')
        .removeClass('glyphicon-ok');

    $('#legend_form_relacoes')
        .html('Relações.')
        .removeClass('text-danger')
        .removeClass('text-primary')
        .removeClass('text-success');
    $('#del_relacao').val('n');
}

function dangerButtonRelac() {
    buttonRelac
        .removeClass('btn-primary')
        .removeClass('btn-success')
        .removeClass('btn-warning')
        .addClass('btn-danger')
        .addClass('disabled')
        .hide()
        .fadeIn();
    buttonRelacContent
        .removeClass('glyphicon-chevron-right')
        .removeClass('glyphicon-ok')
        .removeClass('glyphicon-trash')
        .addClass('glyphicon-remove');
}

function deleteButtonRelac() {
    buttonRelac
        .removeClass('btn-primary')
        .removeClass('btn-success')
        .removeClass('btn-danger')
        .removeClass('disabled')
        .addClass('btn-warning')
        .hide()
        .fadeIn();
    buttonRelacContent
        .removeClass('glyphicon-chevron-right')
        .removeClass('glyphicon-ok')
        .removeClass('glyphicon-remove')
        .addClass('glyphicon-trash');
}

tableRelacoes.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    "pageLength": 5,
    paging: true,
    "searching": true
});

selectRelac1.change(function () {
    resetButtonRelac();
    $('#del_relacao').val('n');
});
selectRelac2.change(function () {
    resetButtonRelac();
    $('#del_relacao').val('n');
});
formRelacoes.bootstrapValidator({
    onError: function (e) {
        if (selectRelac1.val() == '' || selectRelac2.val() == '') {
            dangerButtonRelac();
        }
    },
    onSuccess: function (e) {
        console.log('Baum demais!!');
    },
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        relac_1: {
            validators: {
                notEmpty: {
                    message: 'Informe o  Relacionamento 1.'
                }
            }
        },
        relac_2: {
            validators: {
                notEmpty: {
                    message: 'Informe o  Relacionamento 2.'
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
        url: "RelacionamentoParametro/request",
        data: dados,
        dataType: 'json',
        success: function (data) {
            if (data.exist) {
                successButtonRelac();
                $('#legend_form_relacoes')
                    .html('Esta relação já existe.')
                    .removeClass('text-danger')
                    .removeClass('text-primary')
                    .addClass('text-success');
                $('#del_relacao').val('n');
                formRelacoes.hide().fadeIn();
                return false;
            }

            var id = data.cd_catg_vl_relac_1 + '' + data.cd_catg_vl_relac_2;

            if (data.delete == 's') {
                $('tr[data-id-relacao=' + id + ']').remove();
            } else {
                var celulas = '<td>' + data.cd_catg_vl_relac_1 + '</td>' +
                    '<td>' + data.desc_vl_relac_1 + '</td>' +
                    '<td>' + data.genero_relac_1 + '</td>' +
                    '<td>' + data.cd_catg_vl_relac_2 + '</td>' +
                    '<td>' + data.desc_vl_relac_2 + '</td>' +
                    '<td>' + data.genero_relac_2 + '</td>' +
                    '<td>' +
                    '<a href="#" class="btn btn-warning btn-sm btn-circle delete_relacao" ' +
                    'data-del-relac-1="' + data.cd_catg_vl_relac_1 + '" ' +
                    'data-del-relac-2="' + data.cd_catg_vl_relac_2 + '">' +
                    '<i class="fa fa-trash-o"></i></a>' +
                    '</td>';

                var linha = '<tr class="active" data-id-relacao="' + id + '">' + celulas + '</tr>';
                $(linha).prependTo(tableRelacoes).hide().fadeIn();
            }
            resetButtonRelac();
            formRelacoes.hide().fadeIn();
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

tableRelacoes.delegate('.delete_relacao', 'click', function (e) {
    e.preventDefault();
    var id_relac_1 = $(this).attr('data-del-relac-1');
    var id_relac_2 = $(this).attr('data-del-relac-2');

    var full_id = id_relac_1 + '' + id_relac_2;

    $('#legend_form_relacoes')
        .html('Apagar Relacão ' + full_id)
        .removeClass('text-primary')
        .addClass('text-danger');

    $('#del_relacao').val('s');
    $('#relac_1 option[value=' + id_relac_1 + ']').prop('selected', 'selected');
    $('#relac_2 option[value=' + id_relac_2 + ']').prop('selected', 'selected');

    //$('#' + data.genero + '').addClass('active');
    formRelacoes.hide().fadeIn();
    deleteButtonRelac();
});
