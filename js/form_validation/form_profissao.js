//////////////////- Cadastro de Profissao -////////////////////////////
var formProfissao = $('#form_profissao');
var tableProfissao = $('#tb_profissao');
var inputIdProfissao = $('input[name=id_profissao]');
var inputNomeProfissao = $('input[name=nome_profissao]');

tableProfissao.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    "pageLength": 5,
    paging: true,
    "searching": true
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
                    data: function(validator) {
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

            if (data.delete == 's') {
                $('tr[data-id-profissao=' + data.id_profissao + ']').remove();
                console.log(data);
            } else {
                var celulas = '<td>' + data.id_profissao + '</td><td>' + data.nome_profissao + '</td>' +
                    '<td><a href="#" class="btn btn-primary btn-sm btn-circle update_prof" data-update-prof-id="' + data.id_profissao + '"><i class="fa fa-edit"></i></a> ' +
                    '<a href="#" class="btn btn-warning btn-sm btn-circle delete_prof" data-del-prof-id="' + data.id_profissao + '"><i class="fa fa-trash-o"></i></a>' +
                    '</td>';

                var linha = '<tr data-id-profissao="' + data.id_profissao + '">' + celulas + '</tr>';

                var id = $('#id_profissao').attr('value');

                if (id) {
                    var registro = $('tr[data-id-profissao=' + id + ']');
                    registro.html(celulas);
                    registro.addClass('active');
                } else {
                    $(linha).prependTo(tableProfissao).hide().fadeIn();
                }
            }

            $('#legend_form_profissao')
                .html('Cadastrar Profissao')
                .removeClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_prof')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_prof').val('n');
            formProfissao.hide().fadeIn();
            inputIdProfissao.val('');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

tableProfissao.delegate('.update_prof', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-update-prof-id');

    $.ajax({
        type: "GET",
        url: "Profissao/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdProfissao.val(data.id_profissao);
            inputNomeProfissao.val(data.nome_profissao);
            $('#legend_form_profissao').html('Atualizar Profissao ' + data.nome_profissao).addClass('text-primary').removeClass('text-danger');

            $('#cadastrar_prof').val('Cadastrar').removeClass('btn-danger').addClass('btn-primary');
            $('#del_prof').val('n');
            formProfissao.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });

});

tableProfissao.delegate('.delete_prof', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-del-prof-id');

    $.ajax({
        type: "GET",
        url: "Profissao/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdProfissao.val(data.id_profissao);
            inputNomeProfissao.val(data.nome_profissao);
            $('#legend_form_profissao').html('Apagar Profissao ' + data.nome_profissao).addClass('text-danger');

            $('#cadastrar_prof').val('Confirmar').removeClass('btn-primary').addClass('btn-danger');
            $('#del_prof').val('s');
            formProfissao.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });

});

$('#prof_reset').click(function () {
    $('#form_profissao').data('bootstrapValidator').resetForm(true);
    $('#legend_form_profissao').html('Cadastrar Profissao').removeClass('text-primary').removeClass('text-danger');

    $('#cadastrar_prof').val('Cadastrar').removeClass('btn-danger').addClass('btn-primary');
    $('#del_prof').val('n');
    formProfissao.hide().fadeIn();
    inputIdProfissao.val('');
});
//////////////////- Fim do Cadastro de Profissao -////////////////////////////

