/*
 * @file
 *
 * Available variables
 * - gulp_display
 *
*/

(function ($) {
    'use strict';

    $(document).ready(function () {
        console.log('DOM is ready! JS running 🚀');
    });
    $(window).on(
        {
            'load': function () {
                console.log('The document has finished loading!');
            },
            'resizeend': function () {
                console.log('Window has been resized!');
            }
        }
    );
    $(window).on('load resizeend', function () {
        console.log('gulp_display', gulp_display);
    });

})(jQuery);