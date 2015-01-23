$('#apartamentoform').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        cd_condominio: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        setor: {
            validators: {
                notEmpty: {
                    message: 'Campo obrigatório.'
                }
            }
        },
        desc_apartamento: {
            validators: {
                notEmpty: {
                    message: 'Informar descrição é obrigatório.'
                },
                regexp: {
                    regexp: /^[A-Z0-9\-]+$/,
                    message: 'Só pode conter letras maiúsculas, números e "-".'
                },
                remote: {
                    message: 'Existe outro apartamento com esse nome.',
                    data: function (validator) {
                        return {
                            cd_apartamento: validator.getFieldElements('cd_apartamento').val()
                        };
                    },
                    type: 'POST',
                    url: "Apartamento/checkExisteNome/"
                }
            }
        }
    }
});
function listarSetores() {
    var condominio = $("#m_end_condominio").val();
    if (condominio != '') {
        $.ajax({
            type: "get",
            url: "Setor/listByCondId/" + condominio,
            success: function (data) {
                $("#m_end_setor").html(data);
            }
        });
    }
}
function getApartametoSetor() {
    var id = $('#cd_apartamento').val();

    if (id != '') {

        $.ajax({
            type: "get",
            url: "Apartamento/apartamentoJSON/" + id,
            dataType: 'json',
            success: function (data) {
                $('#m_end_setor option[value=' + data.cd_setor + ']').prop("selected", "selected");
            }
        });
    }
}

$("#m_end_condominio").change(function () {
    listarSetores();
});

$(function () {
    listarSetores();
    getApartametoSetor();
})