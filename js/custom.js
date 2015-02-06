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

/** Collapsible panel */
jQuery(function ($) {
    $('.panel-heading span.clickable').on("click", function (e) {
        if ($(this).hasClass('panel-collapsed')) {
            // expand the panel
            $(this).parents('.panel').find('.panel-body').slideDown();
            $(this).removeClass('panel-collapsed');
            $(this).find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
        else {
            // collapse the panel
            $(this).parents('.panel').find('.panel-body').slideUp();
            $(this).addClass('panel-collapsed');
            $(this).find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        }
    });
});

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

/* Ativar tooltips */
$(function () {
    $("[data-toggle='tooltip']").tooltip();
});

/* DataTables */
$('#perfillist').dataTable({
    "language": {
        "url": "js/datatables/js/dataTables.pt-br.lang"
    },
    responsive: true
});

/** Função para configuração do plugin de máscara para telefones com '9' opcional no início*/
var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

$(document).ready(function () {
    $('#cpf').mask("999.999.999-99");
    $('#cnpj').mask("99.999.999/9999-99");
    $('.fones').mask(SPMaskBehavior, spOptions);
    $('.data-input').mask("99/99/9999");
    $('#cep').mask("99999-999");
    $('#numero').mask("99999999");
});
/*
 $('.delete_pf_end').click(function () {
 $('html, body').animate({scrollTop: 100}, 400);
 return false;
 });
 */
function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
            break;
        }
    }
}
/** Busca Pessoa Física */
$(document).ready(function () {
    function search() {
        var nome = $('#pessoa_1').val();

        if (nome != '') {
            var pesquisando = '<div class="row"><div class="col-md-12"><i class="fa fa-spinner fa-spin fa-3x"></i></div></div>';
            $('#area-do-resultado').html(pesquisando).fadeIn();
            $.ajax({
                type: 'post',
                url: 'PessoaFisica/buscaAjax/',
                data: 'nome=' + nome,
                dataType: 'json',
                success: function (data) {

                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        data[i].email = (data[i].email ? data[i].email : 'E-mail não cadastrado.');
                        html += '<a title="Visualizar perfil" href="PessoaFisica/visualizar/' + data[i].id + '"><div class="list-group-item"><div><img src="' + data[i].foto + '" class="img-circle img-thumb-panel pull-left">' +
                            '<p class="list-group-item-heading">' + data[i].nome + '</p>' +
                            '<p class="list-group-item-text">' + data[i].email + '</p></div></div></a>';
                    }

                    var resultBody = '<div class="row"><div class="col-md-12">' + html + '</div></div>';
                    $('#area-do-resultado').html(resultBody).hide().fadeIn();
                    //'<img src="'+data[0].foto+'">'
                    //$('#pessoa_1').val('');
                },
                error: function (data) {
                    $(data.responseText).appendTo('#area-do-resultado');
                }
            });
        } else {
            $('#area-do-resultado').fadeOut();
        }
    }

    $('#botao-pesquisar-pessoa').click(function () {
        search();
    });
    $('#pessoa_1').keyup(function (e) {
        search();

/*      if(e.keyCode == 13) {
         //Executa esta linha se 'enter' for apertado
         }*/
    });
    $('#nav-top-form-busca').focusout(function () {
        $('#area-do-resultado').fadeOut();
    });
});