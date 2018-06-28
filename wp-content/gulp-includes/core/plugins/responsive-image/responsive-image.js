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
        imgSwitch();
        $(window).on('resizeend', function () {
            if (gulp_display.height !== gulp_display.heightOrigin || gulp_display.width !== gulp_display.widthOrigin) {
                imgSwitch();
            }
        });
    });

    function imgSwitch() {
        $("noscript.gulp-responsiveimage").each(function () {
            var i;
            var source = false;
            for (i = 0; i < gulp_display.breakpoints.length; i++) {
                if (gulp_display.breakpoint == gulp_display.breakpoints[i][0]) {
                    if ($(this).get(0).hasAttribute('data-src-' + gulp_display.breakpoints[i][0])) {
                        source = $(this).attr('data-src-' + gulp_display.breakpoints[i][0]);
                    } else {
                        source = $(this).attr('data-src');
                    }
                }
            }
            if (gulp_firstTime) {
                var alt = $(this).attr('data-alt');
                var id = $(this).attr('data-id');
                var title = $(this).attr('data-title');
                var classs = $(this).attr('data-class');
                if (!isDefined(alt)) {
                    alt = '';
                }
                if (!isDefined(id)) {
                    id = '';
                }
                if (!isDefined(title)) {
                    title = '';
                }
                if (!isDefined(classs)) {
                    classs = '';
                }
                var tag = '<img class="responsiveimg ' + classs + '" src="' + source + '" alt="' + alt + '" id="' + id + '" title="' + title + '" />';
                $(this).before(tag);
            } else {
                $(this).prev('img').attr('src', source);
            }
            if (!source) {
                $(this).prev('img').hide(0);
            } else {
                $(this).prev('img').show(0);
            }
        });
    }

    function isDefined(str) {
        if (typeof str === 'undefined' || str.length === 0 || !str.trim()) {
            return false;
        } else {
            return true;
        }
    }

})(jQuery);