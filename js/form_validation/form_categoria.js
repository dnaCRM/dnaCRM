//////////////////- Cadastro de Categorias -////////////////////////////
var formCategorias = $('#form_categorias');
var tableCategorias = $('#tb_categorias');
var inputIdCategoria = $('input[name=id_categoria]');
var inputNomeCategoria = $('input[name=nome_categoria]');

tableCategorias.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    "pageLength": 5,
    paging: true,
    "searching": true
});

formCategorias.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nome_categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome da categoria.'
                },
                remote: {
                    message: 'Esta categoria já existe.',
                    data: function (validator) {
                        return {
                            id_categoria: validator.getFieldElements('id_categoria').val()
                        };
                    },
                    type: 'POST',
                    url: "Categoria/checkExisteNome/"
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
                $('tr[data-id-categoria=' + data.id_categoria + ']').remove();
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

            $('#legend_form_categorias')
                .html('Cadastrar Categoria')
                .removeClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_categ')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_categ').val('n');
            formCategorias.hide().fadeIn();
            inputIdCategoria.val('');
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
            formCategorias.hide().fadeIn();
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
            formCategorias.hide().fadeIn();
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
    formCategorias.hide().fadeIn();
    inputIdCategoria.val('');
});
//////////////////- Fim do Cadastro de Categorias -////////////////////////////

//////////////////- Cadastro de Sub-Categorias -////////////////////////////
var formSubCategorias = $('#form_sub_categorias');
var tableSubCategorias = $('#tb_sub_categorias');
var inputIdSubCategoria = $('#id_sub_categoria');
var inputNomeSubCategoria = $('#nome_sub_categoria');
var labelCatGenero = $('#label-cat-genero');
var inputCatGenero = $('#cat_genero');
var inputNomeGrupo = $('#nome_grupo');
var labelGroupName = $('#group_name');
var cdGrupo = $('#cd_grupo');
var cdCatGrupo = $('#cd_cat_grupo');

inputCatGenero.change(function(){
    console.log($(this).val());
});
tableSubCategorias.dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    "pageLength": 5,
    paging: true,
    "searching": true
});

formSubCategorias.bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nome_sub_categoria: {
            validators: {
                notEmpty: {
                    message: 'Informe o nome da sub-categoria.'
                },
                remote: {
                    message: 'Esta sub-categoria já existe.',
                    data: function (validator) {
                        return {
                            id_sub_categoria: validator.getFieldElements('id_sub_categoria').val()
                        };
                    },
                    type: 'POST',
                    url: "CategoriaValor/checkExisteNome/"
                }
            }
        },
        select_cat: {
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
        url: "CategoriaValor/request",
        data: dados,
        dataType: 'json',
        success: function (data) {

            if (data.delete == 's') {
                $('tr[data-id-sub-categoria=' + data.cd_vl_categoria + ']').remove();
            } else {

                var celulas =
                    '<td>' + data.cd_vl_categoria + '</td>' +
                        '<td>' + data.desc_vl_categoria + '</td>' +
                        '<td>' + data.desc_categoria + '</td>' +
                        '<td>' + data.grupo + '</td>' +
                        '<td>' +
                        '<a href="#" class="btn btn-primary btn-sm btn-circle update_sub_categ" data-update-sub-categ-id="' + data.cd_vl_categoria + '"><i class="fa fa-edit"></i></a> ' +
                        '<a href="#" class="btn btn-info btn-sm btn-circle group" data-nome-grupo="' + data.desc_vl_categoria + '" data-id-grupo="' + data.cd_vl_categoria + '" data-id-cat-grupo="' + data.cd_categoria + '"><i class="fa fa-plus"></i></a>' +
                        '<a href="#" class="btn btn-warning btn-sm btn-circle delete_sub_categ" data-del-sub-categ-id="' + data.cd_vl_categoria + '"><i class="fa fa-trash-o"></i></a>' +
                        '</td>';
                var linha = '<tr data-id-sub-categoria="' + data.cd_vl_categoria + '">' + celulas + '</tr>';
                var id = $('#id_sub_categoria').attr('value');

                if (id) {
                    var registro = $('tr[data-id-sub-categoria=' + id + ']');
                    registro.html(celulas);
                    registro.addClass('active');
                } else {
                    $(linha).prependTo(tableSubCategorias).hide().fadeIn();
                }
            }

            $('#legend_form_sub_categorias')
                .html('Cadastrar Sub-Categoria')
                .removeClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_sub_categ')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_sub_categ').val('n');
            labelGroupName.removeClass('has-success');
            labelCatGenero.removeClass('active');
            inputIdSubCategoria.val('');
            inputNomeSubCategoria.val('');
            inputNomeGrupo.html('')
            cdGrupo.val('');
            cdCatGrupo.val('');
            bv.resetForm(true);
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
    return false;
});

tableSubCategorias.delegate('.update_sub_categ', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-update-sub-categ-id');

    $.ajax({
        type: "GET",
        url: "CategoriaValor/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdSubCategoria.val(data.cd_vl_categoria);
            inputNomeSubCategoria.val(data.desc_vl_categoria);
            inputNomeGrupo
                .html(data.grupo).hide().fadeIn();
            labelGroupName.addClass('has-success');
            cdGrupo.val(data.cd_grupo);
            cdCatGrupo.val(data.cd_cat_grupo);

            $('#legend_form_sub_categorias')
                .html('Atualizar Sub-Categoria ' + data.desc_vl_categoria)
                .addClass('text-primary')
                .removeClass('text-danger');
            $('#cadastrar_sub_categ')
                .val('Cadastrar')
                .removeClass('btn-danger')
                .addClass('btn-primary');
            $('#del_sub_categ')
                .val('n');
            $('option[value=' + data.cd_categoria + ']').prop('selected', 'selected');

            formSubCategorias.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

tableSubCategorias.delegate('.group', 'click', function (e) {
    e.preventDefault();
    var nome = $(this).attr('data-nome-grupo');
    var id_grupo = $(this).attr('data-id-grupo');
    var id_cat_grupo = $(this).attr('data-id-cat-grupo');

    var id_sub_categoria = inputIdSubCategoria.val();

    if (id_grupo != id_sub_categoria) {
        inputNomeGrupo
            .html(nome).hide().fadeIn();
        labelGroupName.addClass('has-success');
        cdGrupo.val(id_grupo);
        cdCatGrupo.val(id_cat_grupo);
    }

});

$('#btn-desagrupar').click(function (e) {
    e.preventDefault();
    inputNomeGrupo
        .html('').hide().fadeIn();
    labelGroupName.addClass('has-success');
    cdGrupo.val('');
    cdCatGrupo.val('');
});
tableSubCategorias.delegate('.delete_sub_categ', 'click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-del-sub-categ-id');

    $.ajax({
        type: "GET",
        url: "CategoriaValor/findById/" + id,
        data: $(this).serialize(),
        dataType: 'json',
        success: function (data) {
            inputIdSubCategoria.val(data.cd_vl_categoria);
            inputNomeSubCategoria.val(data.desc_vl_categoria);

            $('#legend_form_sub_categorias')
                .html('Apagar Sub-Categoria ' + data.desc_vl_categoria)
                .removeClass('text-primary')
                .addClass('text-danger');
            $('#cadastrar_sub_categ')
                .val('Confirmar')
                .addClass('btn-danger')
                .removeClass('btn-primary');
            $('#del_sub_categ')
                .val('s');
            $('option[value=' + data.cd_categoria + ']').prop('selected', 'selected');

            formSubCategorias.hide().fadeIn();
        },
        error: function (data) {
            console.log(data);
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
});

$('#sub_categ_reset').click(function () {
    formSubCategorias.data('bootstrapValidator').resetForm(true);
    $('#legend_form_sub_categorias')
        .html('Sub-Categoria')
        .removeClass('text-primary')
        .removeClass('text-danger');

    $('#cadastrar_sub_categ')
        .val('Cadastrar')
        .removeClass('btn-danger')
        .addClass('btn-primary');
    $('#del_sub_categ')
        .val('n');
    $('#nome_grupo')
        .val('').hide().fadeIn();
    $('#group_name').removeClass('has-success');
    $('#cd_grupo').val('');
    $('#cd_cat_grupo').val('');

    formSubCategorias.hide().fadeIn();
    inputIdSubCategoria.val('');
    cdGrupo.val('');
    cdCatGrupo.val('');
    inputNomeSubCategoria.val('');
    labelCatGenero.removeClass('active');
});

//////////////////- Fim do Cadastro de Sub-Categorias -////////////////////////////
    /*
    var $form = $('#form_categorias');
    var bv = $form.data('bootstrapValidator');
    bv.resetForm(true);*/
