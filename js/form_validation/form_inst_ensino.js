
//////////////////- Cadastro de Instituição de Ensino -////////////////////////////
var formInstEnsino = $('#form_inst_ensino');
var tableInstEnsino = $('#tb_inst_ensino');
var inputIdInstEnsino = $('input[name=id_inst_ensino]');
var inputNomeInstEnsino = $('input[name=nome_inst_ensino]');

tableInstEnsino.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    "pageLength": 5,
    paging: true,
    "searching": true
});

formInstEnsino.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nome_inst_ensino: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome da Intituição.'
                },
                remote: {
                    message: 'Esta Instituicao de Ensino já existe.',
                    data: function(validator) {
                        return {
                            id_inst_ensino: validator.getFieldElements('id_inst_ensino').val()
                        };
                    },
                    type: 'POST',
                    url: "InstituicaoEnsino/checkExisteNome/"
                }
            }
        },
        select_cat_ens: {
            validators: {
                notEmpty: 'Selecione uma categoria.'
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
        url: "InstituicaoEnsino/request",
        data: dados,
        dataType: 'json',
        success: function (data) {

            if (data.delete == 's') {
                $('tr[data-id-inst-ensino=' + data.cd_instituicao + ']').remove();
            } else {

                var celulas =
                    '<td>' + data.cd_instituicao + '</td>' +
                        '<td>' + data.ds_instituicao + '</td>' +
                        '<td>' + data.desc_catg_instuicao + '</td>' +
                        '<td>' +
                        '<a href="#" class="btn btn-primary btn-sm btn-circle update_inst_ens" data-update-inst-ens-id="' + data.cd_instituicao + '"><i class="fa fa-edit"></i></a> ' +
                        '<a href="#" class="btn btn-warning btn-sm btn-circle delete_inst_ens" data-del-inst-ens-id="' + data.cd_instituicao + '"><i class="fa fa-trash-o"></i></a>' +
                        '</td>';
                var linha = '<tr data-id-inst-ensino="' + data.cd_instituicao + '">' + celulas + '</tr>';
                var id = $('#id_inst_ensino').attr('value');

                if (id) {
                    var registro = $('tr[data-id-inst-ensino=' + id + ']');
                    registro.html(celulas);
                    registro.addClass('active');
                } else {
                    $(linha).prependTo(tableInstEnsino).hide().fadeIn();
                }
            }

            $('#legend_form_inst_ensino')
                .html('Cadastrar Instituição')
                .removeClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_inst_ens')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_inst_ens').val('n');
            inputIdInstEnsino.val('');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

tableInstEnsino.delegate('.update_inst_ens', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-update-inst-ens-id');

    $.ajax({
        type: "GET",
        url: "InstituicaoEnsino/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdInstEnsino.val(data.cd_instituicao);
            inputNomeInstEnsino.val(data.ds_instituicao);
            $('#legend_form_inst_ensino')
                .html('Atualizar Instituição ' + data.ds_instituicao)
                .addClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_inst_ens')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_inst_ens')
                .val('n');
            $('option[value=' + data.cd_vl_catg_instituicao + ']').prop('selected', 'selected');
            console.log(data);
            formInstEnsino.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

tableInstEnsino.delegate('.delete_inst_ens', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-del-inst-ens-id');

    $.ajax({
        type: "GET",
        url: "InstituicaoEnsino/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdInstEnsino.val(data.cd_instituicao);
            inputNomeInstEnsino.val(data.ds_instituicao);

            $('#legend_form_inst_ensino')
                .html('Apagar Instituicao ' + data.ds_instituicao)
                .removeClass('text-primary')
                .addClass('text-danger');
            $('#cadastrar_inst_ens')
                .val('Confirmar')
                .addClass('btn-danger')
                .removeClass('btn-primary');
            $('#del_inst_ens')
                .val('s');
            $('option[value=' + data.cd_vl_catg_instituicao + ']').prop('selected', 'selected');

            formInstEnsino.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#inst_ens_reset').click(function () {
    formInstEnsino.data('bootstrapValidator').resetForm(true);
    $('#legend_form_inst_ensino')
        .html('Instituição')
        .removeClass('text-primary')
        .removeClass('text-danger');

    $('#cadastrar_inst_ens')
        .val('Cadastrar')
        .removeClass('btn-danger')
        .addClass('btn-primary');
    $('#del_inst_ens')
        .val('n');

    formInstEnsino.hide().fadeIn();
    inputIdInstEnsino.val('');
});

//////////////////- Fim do Cadastro de Instituições de Ensino -////////////////////////////
