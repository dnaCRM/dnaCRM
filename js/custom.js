// * SIDEBAR MENU
// * ------------
// * This is a custom plugin for the sidebar menu. It provides a tree view.
// * 
// * Usage:
// * $(".sidebar).tree();
// * 
// * Note: This plugin does not accept any options. Instead, it only requires a class
// *       added to the element that contains a sub-menu.
// *       
// * When used with the sidebar, for example, it would look something like this:
// * <ul class='sidebar-menu'>
// *      <li class="treeview active">
// *          <a href="#>Menu</a>
// *          <ul class='treeview-menu'>
// *              <li class='active'><a href=#>Level 1</a></li>
// *          </ul>
// *      </li>
// * </ul>
// * 
// * Add .active class to <li> elements if you want the menu to be open automatically
// * on page load. See above for an example.
// */
(function ($) {
    "use strict";

    $.fn.tree = function () {

        return this.each(function () {
            var btn = $(this).children("a").first();
            var menu = $(this).children(".treeview-menu").first();
            var isActive = $(this).hasClass('active');

            //initialize already active menus
            if (isActive) {
                menu.show();
                btn.children(".fa-angle-left").first().removeClass("fa-angle-left").addClass("fa-angle-down");
            }
            //Slide open or close the menu on link click
            btn.click(function (e) {
                e.preventDefault();
                if (isActive) {
                    //Slide up to close menu
                    menu.slideUp();
                    isActive = false;
                    btn.children(".fa-angle-down").first().removeClass("fa-angle-down").addClass("fa-angle-left");
                    btn.parent("li").removeClass("active");
                } else {
                    //Slide down to open menu
                    menu.slideDown();
                    isActive = true;
                    btn.children(".fa-angle-left").first().removeClass("fa-angle-left").addClass("fa-angle-down");
                    btn.parent("li").addClass("active");
                }
            });

            /* Add margins to submenu elements to give it a tree look */
            menu.find("li > a").each(function () {
                var pad = parseInt($(this).css("margin-left")) + 10;

                $(this).css({"margin-left": pad + "px"});
            });

        });

    };


}(jQuery));

$(".sidebar-menu .treeview").tree();

(function () {
    var body = $('body');
    $('.slide-bar-toggle').bind('click', function () {
        body.toggleClass('menu-open');
        return false;
    });
})();

$(document).ready(function () {

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('#toTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 400);
        return false;
    });

});

$(document).ready(function () {
    $('#cpf').mask("999.999.999-99");
    $('#cnpj').mask("99.999.999/9999-99");
    $('#celular').mask("(99) Z9999-9999", {translation: {'Z': {pattern: /[0-9]/, optional: true}}});  //[] Opcional
    $('#dt_nascimento').mask("99/99/9999");
    $('#nascimento').mask("99/99/9999");
    $('#dt_inicio_curso').mask("99/99/9999");
    $('#dt_fim_curso').mask("99/99/9999");
    $('#dt_inicio').mask("99/99/9999");
    $('#dt_fim').mask("99/99/9999");
    $('#fone').mask("(99) 9999-9999");
});

$(document).ready(function () {
    $('#datetimepicker').datetimepicker({
        language: 'pt-br',
        pickTime: false
    });
    $('#nascimento').datetimepicker({
        language: 'pt-br',
        pickTime: false
    });
    $('#dt_inicio_curso_picker').datetimepicker({
        language: 'pt-br',
        pickTime: false
    });
    $('#dt_fim_curso_picker').datetimepicker({
        language: 'pt-br',
        pickTime: false
    });;
    $('#dt_inicio_picker').datetimepicker({
        language: 'pt-br',
        pickTime: false
    });
    $('#dt_fim_picker').datetimepicker({
        language: 'pt-br',
        pickTime: false
    });

    $('#pessoafisicaform').bootstrapValidator({
        excluded: ':disabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ie_sexo: {
                validators: {
                    notEmpty: {
                        message: 'Gênero é obrigatório'
                    }
                }
            },
            nm_pessoa_fisica: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    },
                    emailAddress: {
                        message: 'E-mail inválido'
                    }
                }
            },
            cpf: {
                group: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            rg: {
                group: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            dt_nascimento: {
                group: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
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
$('#pf_ajax_form').bootstrapValidator({
        excluded: ':disabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ie_sexo: {
                validators: {
                    notEmpty: {
                        message: 'Gênero é obrigatório'
                    }
                }
            },
            nm_pessoa_fisica: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    },
                    emailAddress: {
                        message: 'E-mail inválido'
                    }
                }
            },
            cpf: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            rg: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            dt_nascimento: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            }
        }
    });

    $('#cadastro_usuario').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
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
            }
        }
    });

    $('#pessoajuridicaform').bootstrapValidator({
        excluded: ':disabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nm_fantasia: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            desc_razao: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            desc_atividade: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    },
                    emailAddress: {
                        message: 'E-mail inválido'
                    }
                }
            },
            cnpj: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
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

    $('#login').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
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

    $('#ordemservicoform').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            solicitante: {
                validators: {
                    notEmpty: {
                        message: 'Informar o solicitante é obrigatório.'
                    }
                }
            },
            assunto: {
                validators: {
                    notEmpty: {
                        message: 'Informar o assunto é obrigatória'
                    }
                }
            },
            dt_inicio: {
                validators: {
                    notEmpty: {
                        message: 'Campo obrigatório'
                    }
                }
            }
        }
    });

    $('#datetimepicker')
        .on('dp.change dp.show', function (e) {
            // Valida a data quando o usuário inserir
            $('#pessoafisicaform').bootstrapValidator('revalidateField', 'dt_nascimento');
        });
    $('#dt_inicio_picker')
        .on('dp.change dp.show', function (e) {
            // Valida a data quando o usuário inserir
            $('#ordemservicoform').bootstrapValidator('revalidateField', 'dt_inicio_picker');
        });
    $('#datetimepicker')
        .on('dp.change dp.show', function (e) {
            // Valida a data quando o usuário inserir
            $('#pf_ajax_form').bootstrapValidator('revalidateField', 'dt_nascimento');
        });

});


$('#perfillist').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    responsive: true
});

$(document).ready(function(){
    $('#pf_ajax_form').submit(function(){
        var dados = $( this ).serialize();

        $.ajax({
            type: "POST",
            url: "app/ajax_controllers/processa.php",
            data: dados,
            success: function( data )
            {
                $('#ajax_response').html(data);
                console.log( data + 'Alguma coisa aconteceu' );
            }
        });

        return false;
    });
});