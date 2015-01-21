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
                    data: function(validator) {
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
