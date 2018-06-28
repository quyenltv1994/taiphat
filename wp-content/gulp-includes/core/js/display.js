/*
 * @file
 *
 * Available variables
 * - gulp_display
 *
 */

var gulp_display = {};
var gulp_firstTime = 1;

(function ($) {
    'use strict';

    gulp_display.breakpoints = [['2560'], ['1920'], ['1440'], ['1366'], ['1280'], ['1024'], ['768'], ['480'], ['320']].sort(function (a, b) {
        return a[0] - b[0];
    });

    gulp_display.getHeight = function () {
        return verge.viewportH();
    };
    gulp_display.getWidth = function () {
        return verge.viewportW();
    };
    gulp_display.getScrollY = function () {
        return verge.scrollY();
    };
    gulp_display.getScrollX = function () {
        return verge.scrollX();
    };
    gulp_display.getBreakpoint = function () {
        return breakpointDetection();
    };
    gulp_display.getOrientation = function () {
        return getOrientation(gulp_display.getWidth(), gulp_display.getHeight());
    };

    gulp_display.height = verge.viewportH();
    gulp_display.width = verge.viewportW();
    gulp_display.scrollY = verge.scrollY();
    gulp_display.scrollX = verge.scrollX();
    gulp_display.breakpoint = breakpointDetection();
    gulp_display.orientation = getOrientation(gulp_display.width, gulp_display.height);

    $(window).on('resizeend', function () {
        gulp_firstTime = 0;
        gulp_display.breakpointOrigin = gulp_display.breakpoint;
        gulp_display.scrollYOrigin = gulp_display.scrollY;
        gulp_display.scrollXOrigin = gulp_display.scrollX;
        gulp_display.scrollY = verge.scrollY();
        gulp_display.scrollX = verge.scrollX();
        gulp_display.orientationOrigin = gulp_display.orientation;
        gulp_display.heightOrigin = gulp_display.height;
        gulp_display.widthOrigin = gulp_display.width;
        gulp_display.height = verge.viewportH();
        gulp_display.width = verge.viewportW();
        gulp_display.breakpoint = breakpointDetection();
        gulp_display.orientation = getOrientation(gulp_display.width, gulp_display.height);
    });

    $(window).on('scroll', function () {
        gulp_display.scrollYOrigin = gulp_display.scrollY;
        gulp_display.scrollXOrigin = gulp_display.scrollX;
        gulp_display.scrollY = verge.scrollY();
        gulp_display.scrollX = verge.scrollX();
    });

    function getOrientation(width, height) {
        if (height > width) {
            return 'portrait';
        } else if (height < width) {
            return 'landscape';
        } else {
            return 'square';
        }
    }

    function breakpointDetection() {
        var i;
        for (i = 0; i < gulp_display.breakpoints.length - 1; ++i) {
            if (gulp_display.width <= gulp_display.breakpoints[i + 1][0] - 1 && gulp_display.width >= gulp_display.breakpoints[i][0]) {
                return parseInt(gulp_display.breakpoints[i][0]);
            } else {
                if (gulp_display.width <= gulp_display.breakpoints[0][0]) {
                    return parseInt(gulp_display.breakpoints[0][0]);
                } else if (gulp_display.width >= gulp_display.breakpoints[gulp_display.breakpoints.length - 1][0]) {
                    return parseInt(gulp_display.breakpoints[gulp_display.breakpoints.length - 1][0]);
                }
            }
        }
        return parseInt(gulp_display.breakpoints[gulp_display.breakpoints.length - 1][0]);
    }

})(jQuery);