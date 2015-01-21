$('#cadastro_usuario').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        usuario: {
            validators: {
                remote: {
                    message: 'Este login não está disponível.',
                    data: function(validator) {
                        return {
                            id_perfil: validator.getFieldElements('id_perfil').val()
                        };
                    },
                    type: 'POST',
                    url: "Usuario/checkExists/"
                },
                notEmpty: {
                    message: 'Nome de usuário é obrigatório.'
                },
                different: {
                    field: 'senha',
                    message: 'Nome de usuário deve ser diferente da senha'
                },
                stringLength: {
                    min: 5,
                    max: 14,
                    message: 'Nome de usuário deve ter entre 5 em 14 caracteres.'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9]+$/,
                    message: 'Só pode conter letras e números.'
                }
            }
        },
        senha: {
            validators: {
                notEmpty: {
                    message: 'Senha é obrigatória'
                },
                different: {
                    field: 'usuario',
                    message: 'Senha deve ser diferente do nome de usuário'
                },
                stringLength: {
                    min: 6,
                    message: 'Senha deve ter no mínimo 6 caracteres.'
                }
            }
        },
        confirmar_senha: {
            validators: {
                notEmpty: {
                    message: 'Confirmação de senha obrigatória.'
                },
                identical: {
                    field: 'senha',
                    message: 'O valor informado deve ser igual a senha informada.'
                }
            }
        },
        nivel: {
            validators: {
                notEmpty: {
                    message: 'Escolha um nível de acesso.'
                }
            }
        },
        ie_status: {
            validators: {
                notEmpty: {
                    message: 'Defina um status.'
                }
            }
        }
    }
});
