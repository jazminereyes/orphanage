$(window).bind('load', function() {
    
    'use strict';
    setTimeout(function() {
        if ($('.overview').length) {
            overviewIsotope();
        }
    }, 600);
});

(function() {
    'use strict';
    if ($('.overview').length) {

 
        var windowWidth = $(window).width();
        var windowHeight = $(window).height();
        var midWidth = windowWidth / 2;
        if (windowWidth < 1300) {
            $('[data-overview-link]').click(function() {
                var targetLink = $(this).data('overview-link');
                $('body').fadeOut(350, function() {
                    window.location.href = targetLink;
                });
            });
        } else {
            $('.overview .grid .item .item-wrapper').click(function() {
                $('.grid .item').removeClass('active');
                $(this).parents('.item').addClass('active');
            });
            $('.grid .item .item-close').click(function() {
                $(this).parents('.item').removeClass('active');
            });
            $('#off-aside-menu nav ul li a').click(function() {
                closeSideMenu();
            });
        }
        setTimeout(function() {
            midWidth = $(window).width() / 2;
            $('.item:not(.isotope-hidden)').each(function() {
                var posLeft = $(this).position().left;
                if (posLeft < midWidth) {
                    $(this).removeClass('active-left');
                } else {
                    $(this).addClass('active-left');
                }
            });
        }, 500);
    }
}());
/* PORTFOLIO ISOTOPE */
function overviewIsotope() {
    var $container = $('.masonry-overview');
    var itemReveal = Isotope.Item.prototype.reveal;
    Isotope.Item.prototype.reveal = function() {
        itemReveal.apply(this, arguments);
        $(this.element).removeClass('isotope-hidden');
    };
    var itemHide = Isotope.Item.prototype.hide;
    Isotope.Item.prototype.hide = function() {
        itemHide.apply(this, arguments);
        $(this.element).addClass('isotope-hidden');
    };
    $('.masonry-overview').isotope({
        itemSelector: '.item',
        itemPositionDataEnabled: true
    }).on('arrangeComplete', function(event, filteredItems) {
        midWidth = $(window).width() / 2;
        $('.item:not(.isotope-hidden)').each(function() {
            var posLeft = $(this).position().left;
            if (posLeft < midWidth) {
                $(this).removeClass('active-left');
            } else {
                $(this).addClass('active-left');
            }
        });
    });
    $('.items-filter a').click(function() {
        $('.items-filter .current').removeClass('current');
        $(this).addClass('current');
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            transitionDuration: '0.7s'
        });
        return false;
    });
    $(window).resize(function() {
        $container.isotope('layout');
    });
}