(function ($) {
    'use strict';

    $(document).ready(function () {

        var w = jQuery(window).width();
        var h = jQuery(window).height();

        $('.flexslider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
        });
        if($(window).width() > 1023){
            $(window).scroll(function(){
                if($(window).scrollTop() > 0){
                    $(".header").addClass("scroll_top");
                }else{
                    $(".header").removeClass("scroll_top");
                }
            });
        }

        if($(window).width() < 992){
            $(window).scroll(function(){
                if($(window).scrollTop() > 0){
                    $(".header").addClass("scroll_mobile");
                }else{
                    $(".header").removeClass("scroll_mobile");
                }
            });
        }

        $('.flexslider .flex-control-paging li').each(function( index ) {
            $(this).append("<span></span>");
        });

        $("#menu-main-menu>li:first-child").addClass(" current-menu-item");

        $("#menu-main-menu li a").click(function(e){
            e.preventDefault();
            $("#menu-main-menu li").removeClass(" current-menu-item");
            $(this).parent().addClass(" current-menu-item");
            var id = $(this).attr('href');
            var top = $(id).offset().top - 100;
            var body = $("html, body");
            body.animate({scrollTop:top}, 500);

        })

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
            });

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
