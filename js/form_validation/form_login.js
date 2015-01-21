$('#login').bootstrapValidator({
    message: 'This value is not valid',
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh fa-spin'
    },
    fields: {
        usuario: {
            validators: {
                notEmpty: {
                    message: 'Nome de usuário é obrigatório.'
                },
                different: {
                    field: 'senha',
                    message: 'Nome de usuário deve ser diferente da senha'
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
                }
            }
        }
    }
});
