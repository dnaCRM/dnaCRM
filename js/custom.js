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

$(document).ready(function(){
    $('#cpf').inputmask("999.999.999-99");
    $('#celular').inputmask("(99) [9]9999-9999");  //[] Opcional
    $('#dt_nascimento').inputmask("99/99/9999");
    $('#fone').inputmask("(99) 9999-9999");
});