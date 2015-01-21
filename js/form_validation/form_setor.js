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
        }
    }
});
