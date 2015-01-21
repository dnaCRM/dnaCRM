$('#condominioform').bootstrapValidator({
    excluded: ':disabled',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        nm_condominio: {
            validators: {
                notEmpty: {
                    message: 'Informar nome é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                },
                remote: {
                    message: 'Existe outro condomínio com esse nome.',
                    data: function(validator) {
                        return {
                            cd_condominio: validator.getFieldElements('cd_condominio').val()
                        };
                    },
                    type: 'POST',
                    url: "Condominio/checkExisteNome/"
                }
            }
        },
        cep: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar cep é obrigatório'
                },
                stringLength: {
                    min: 9,
                    message: 'CEP inválido.'
                }
            }
        },
        rua: {
            validators: {
                notEmpty: {
                    message: 'Informar rua é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        bairro: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar bairro é obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        cidade: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar cidade obrigatório'
                },
                stringLength: {
                    min: 5,
                    message: 'No mínimo 5 caracteres.'
                }
            }
        },
        numero: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Informar numero obrigatório'
                }
            }
        },
        estado: {
            group: '.col-sm-4',
            validators: {
                notEmpty: {
                    message: 'Campo estado obrigatório'
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
