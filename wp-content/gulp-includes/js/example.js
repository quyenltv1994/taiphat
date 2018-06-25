(function ($) {
    'use strict';

    $(document).ready(function () {

        var w = jQuery(window).width();
        var h = jQuery(window).height();

        $('.flexslider').flexslider({
            animation: "slide",
            prevText: "<i class='fal fa-angle-right'></i>",
            nextText: "<i class='fal fa-angle-right'></i>",
        });
        $('.flexslider .flex-control-paging li').each(function( index ) {
            $(this).append("<span></span>");
        });
        // Mobile to tablet portrait Only JS
        if ($(window).width() < 1024) {
            $('.flexslider .slides li').each(function( index ) {
                var src = $(this).find('img').attr('src');
                $(this).css({"background":"url("+src+")"});
            });

            $(".header__menu .read__article").hide();
            // Open main-menu
            $('.button__menu-container__open').on(
                'click', function (e) {
                    $(this).addClass('open').hide();
                    $('html').addClass('menu-mobile--active');
                    $(".header__menu .read__article").show();
                }
            );

            $(".header__menu .read__article").on('click', function(e){
                e.preventDefault();
                $(this).hide();
                $('.button__menu-container__open').show();
                $(".button__menu-close").trigger('click');
            })

            // Close main-menu
            $('.button__menu-close').on(
                'click', function (e) {
                    $('.button__menu-container__open').removeClass('open');
                    $('html').removeClass('menu-mobile--active');
                }
            );
        }
    });

})(jQuery);
