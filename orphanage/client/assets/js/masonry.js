$(window).bind('load', function() {
    'use strict';
    setTimeout(function() {
        masonryHeight();
        handleIsotope();
    },300);
});

$(window).resize(function() {

    'use strict';
    masonryHeight();

});

// PORTFOLIO ISOTOPE
function handleIsotope() {
    if ($('.grid').length) {
        $('.grid:not(.infinite-container)').each(function(){
            var $container = $(this);
            var layoutIsotope = 'packery';
            if ($container.hasClass('masonry-grid')) {
                layoutIsotope = 'fitRows';
            }
            $container.isotope({
                itemSelector: '.item',
                layoutMode: layoutIsotope,
                percentPosition: true,
                masonry: {
                    columnWidth: $container.find('.item:not(.item-wide):not(.item-fullwidth):not(.item-tall)')[0],
                    gutter: 0
                }
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
                masonryHeight();
                $container.isotope('layout');
            });
            $('body').trigger('resize');
        });
        setTimeout(function() {
            $('body').trigger('resize');
        },1100);
    }
}

// MASONRY ITEM HEIGHT
function masonryHeight() {
    $('.masonry').each(function(){
        if (!$(this).hasClass('masonry-layout') && !$(this).hasClass('grid-1')) {
            $(this).find('.item').height('');
            var masonryHeight =  $(this).find('.item:not(.item-tall):not(.item-wide):not(.item-fullwidth)').width();
            if ($(this).hasClass('no-space')) {
                $(this).find('.item:not(.isotope-hidden)').each(function() {
                    $(this).height(masonryHeight);
                    if ($(this).hasClass('item-tall')) {
                        $(this).height(masonryHeight * 2);
                    }
                    if ($(this).hasClass('item-wide') && !$(this).hasClass('item-tall')) {
                        $(this).width(masonryHeight * 2);
                    }
                });
            } else {
                 $(this).find('.item:not(.isotope-hidden)').each(function() {
                    $(this).height(masonryHeight - 32);
                    if ($(this).hasClass('item-tall')) {
                        $(this).height(masonryHeight * 2 - 44);
                    }
                    if ($(this).hasClass('item-wide') && !$(this).hasClass('item-tall')) {
                        $(this).width(masonryHeight * 2 + 20);
                    }
                });
            }
        }
    });
}