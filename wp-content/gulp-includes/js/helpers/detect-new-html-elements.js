/*
    (function ($) {
        'use strict';
        $(document).ready(function () {
            var options = [
                {
                    selector: '#carousel, #slider',
                    callback: function (el) {
                        el.owlCarousel();
                    }
                },
                {
                    selector: '#masonry',
                    callback: function (el) {
                        el.masonry();
                    }
                }
            ];
            detectNewHtmlElements(options);
        });
    })(jQuery);
*/

function detectNewHtmlElements(options) {
    var observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.addedNodes) {
                if (mutation.addedNodes.length) {
                    $.each(options, function (key, item) {
                        if ($(mutation.addedNodes[0]).is(item.selector)) {
                            item.callback($(mutation.addedNodes[0]));
                        }
                    });
                }
            }
        });
    });
    var config = {
        attributes: false,
        childList: true,
        subtree: true,
        characterData: false
    };
    observer.observe($('body')[0], config);
}