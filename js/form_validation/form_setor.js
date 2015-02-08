$('#setorform').bootstrapValidator({
    excluded: ':disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        cd_condominio: {
            validators: {
                notEmpty: {
                    message: 'Informar o condominio é obrigatório.'
                }
            }
        },
        nm_setor: {
            group: ".col-sm-6",
            validators: {
                notEmpty: {
                    message: 'Informar o nome do setor é obrigatório.'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                },
                remote: {
                    message: 'Existe outro setor com esse nome.',
                    data: function(validator) {
                        return {
                            cd_setor: validator.getFieldElements('cd_setor').val()
                        };
                    },
                    type: 'POST',
                    url: "Setor/checkExisteNome/"
                }
            }
        },
        im_perfil: {
            validators: {
                file: {
                    extension: 'jpg',
                    type: 'image/jpeg',
                    /*maxSize: 2048 * 1024,   // 2 MB*/
                    message: 'O arquivo selecionado não é válido. Apenas aquivos .jpg são permitidos.'
                }
            }
        },
        cd_tipo: {
            group: ".col-sm-6",
            validators: {
                notEmpty: {
                    message: "Informe o tipo."
                }
            }
        },
        cd_sub_tipo: {
            group: ".col-sm-5",
            validators: {
                notEmpty: {
                    message: "Informe a categoria."
                }
            }
        }
    }
});
////////////////////////////////////////////////////////////
var selectCondominio = $('#cd_condominio');
var cdCondominio = selectCondominio.val();
var tipoApartamento = $('#check_tipo_apartamento');
var tipoSetor = $('#check_tipo_setor');

selectCondominio.change(function(){
    cdCondominio = selectCondominio.val();

    if (tipoApartamento.prop('checked')) {
        menuCategoria(tipoApartamento.val());
        menuGrupo(tipoApartamento.val());
    } else if (tipoSetor.prop('checked')) {
        menuGrupo(tipoSetor.val());
        menuCategoria(tipoSetor.val());
    }

});

tipoApartamento.change(function () {
    menuCategoria($(this).val());
    menuGrupo($(this).val());
});
tipoSetor.change(function () {
    menuGrupo($(this).val());
    menuCategoria($(this).val());
});

function menuCategoria (id) {
    $.ajax({
        type: "get",
        url: "CategoriaValor/listByCatId/" + id,
        success: function (data) {
            $("#cd_sub_tipo").html(data);
        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
}

function menuGrupo (id) {
    $.ajax({
        type: "get",
        url: "Setor/listByTipoId/" + id + "/" + cdCondominio,
        success: function (data) {
            $("#cd_setor_grupo").html(data);
        },
        error: function (data) {
            $(data.responseText).appendTo('#responseAjaxError');
        }
    });
}
