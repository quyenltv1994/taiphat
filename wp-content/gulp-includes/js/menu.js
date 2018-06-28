(function ($) {

//Tablet Landscape to Desktop only JS
//    if (matchMedia('(min-width: 768px) and (orientation:landscape)').matches) {
//        $('.button__menu-open').removeClass('open');
//        $('html').removeClass('menu-mobile--active');
//    }

    $(window).resize(
        function () {
            $('.button__menu-container__open').removeClass('open');
            $(".header__menu .read__article").hide();
            $('html').removeClass('menu-mobile--active');

            // Open main-menu
            $('.button__menu-container__open').on(
                'click', function (e) {
                    $(this).addClass('open').hide();;
                    $('html').addClass('menu-mobile--active');
                    $(".header__menu .read__article").show();
                }
            );

            $(".header__menu .read__article").on('click', function(e){
                e.preventDefault();
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
    );
})(jQuery);