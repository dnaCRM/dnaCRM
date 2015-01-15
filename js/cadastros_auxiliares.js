/* INÍCIO DO CÓDIGO PARA MANIPULAÇÃO DE ENDEREÇOS DE PESSOA JURÍDICA */
$('#form_pj_enderecos').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
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

//////////////////////////////////////////////////////////////////////////////////////////
var formCategorias = $('#form_categorias');
var tableCategorias = $('#tb_categorias');
var inputIdCategoria = $('input[name=id_categoria]');
var inputNomeCategoria = $('input[name=nome_categoria]');

tableCategorias.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    scrollY: 200,
    paging: false,
    "searching": false
});

formCategorias.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        nome_categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome da categoria.'
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
        url: "Categoria/request",
        data: dados,
        dataType: 'json',
        success: function (data) {

            if (data.delete == 's') {
                $('tr[data-id-categoria='+data.id_categoria+']').remove();
                console.log(data);
            } else {
                var celulas = '<td>' + data.id_categoria + '</td><td>' + data.nome_categoria + '</td>' +
                    '<td><a href="#" class="btn btn-primary btn-sm btn-circle update_categ" data-update-categ-id="' + data.id_categoria + '"><i class="fa fa-edit"></i></a> ' +
                    '<a href="#" class="btn btn-warning btn-sm btn-circle delete_categ" data-del-categ-id="' + data.id_categoria + '"><i class="fa fa-trash-o"></i></a>' +
                    '</td>';

                var linha = '<tr data-id-categoria="' + data.id_categoria + '">' + celulas + '</tr>';

                var id = $('#id_categoria').attr('value');

                if (id) {
                    var registro = $('tr[data-id-categoria=' + id + ']');
                    registro.html(celulas);
                    registro.addClass('active');
                } else {
                    $(linha).prependTo(tableCategorias).hide().fadeIn();
                }
            }
            inputIdCategoria.val('');
            $('#legend_form_categorias')
                .html('Cadastrar Categoria')
                .removeClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_categ')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_categ').val('n');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

tableCategorias.delegate('.update_categ', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-update-categ-id');

    $.ajax({
        type: "GET",
        url: "Categoria/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdCategoria.val(data.id_categoria);
            inputNomeCategoria.val(data.nome_categoria);
            $('#legend_form_categorias').html('Atualizar Categoria ' + data.nome_categoria).addClass('text-primary').removeClass('text-danger');

            $('#cadastrar_categ').val('Cadastrar').removeClass('btn-danger').addClass('btn-primary');
            $('#del_categ').val('n');
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });

});

tableCategorias.delegate('.delete_categ', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-del-categ-id');

    $.ajax({
        type: "GET",
        url: "Categoria/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdCategoria.val(data.id_categoria);
            inputNomeCategoria.val(data.nome_categoria);
            $('#legend_form_categorias').html('Apagar Categoria ' + data.nome_categoria).addClass('text-danger');

            $('#cadastrar_categ').val('Confirmar').removeClass('btn-primary').addClass('btn-danger');
            $('#del_categ').val('s');
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });

});

$('#categ_reset').click(function () {
    $('#form_categorias').data('bootstrapValidator').resetForm(true);
    $('#legend_form_categorias').html('Cadastrar Categoria').removeClass('text-primary').removeClass('text-danger');

    $('#cadastrar_categ').val('Cadastrar').removeClass('btn-danger').addClass('btn-primary');
    $('#del_categ').val('n');
});