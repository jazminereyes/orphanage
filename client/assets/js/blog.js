(function() {
    'use strict';
    postIsotope();
    setTimeout(function(){
        blogIsotope();
        $(window).trigger('resize');
    },700);
}());

/* PORTFOLIO ISOTOPE */
function blogIsotope() {
    if ($('.posts.masonry').length || $('.posts.masonry-grid').length) {
        var $container = $('.posts');
        /* INFINITE SCROLL FOR PORTFOLIO LIST */
        if ($('.infinite-container').length) {
            $container.isotope({
                itemSelector: '.item',
                layoutMode: 'packery',
                percentPosition: true,
                masonry: {
                    columnWidth: $container.find('.item:not(.item-wide):not(.item-fullwidth):not(.item-tall)')[0],
                    gutter: 0
                }
            });
            var currentPage = 1;
            var newPage = $('.next-page').attr('href');
            var numPage = $('.next-page').data('num-page');
            // LOAD NEW POSTS ON CLICK
            if ($('.infinite-container').hasClass('infinite-onclick')) {
                $('.next-page').click(function(e) {
                    e.preventDefault();
                    $('body').append('<div id="temp-load"></div>');
                    currentPage++;
                    if (currentPage >= numPage) {
                        $('.next-page').parent().fadeOut(300, function() {
                            $('.next-page').parent().remove();
                        });
                    }
                    var newUrl = newPage + '-' + currentPage + '.html';
                    $('#temp-load').load(newUrl + ' .posts', function() {
                        $('#temp-load > .infinite-container').children().css({
                            opacity: 0
                        });
                        var toAdd = $('#temp-load > .infinite-container').html();
                        $container.isotope('insert', $(toAdd), function() {
                            $container.children().css({
                                opacity: 1
                            });
                        });
                        $('.video-js').each(function() {
                            var videoId = $(this).attr('id');
                            videojs(videoId);
                        });
                        handleVideo();
                        flexslider();
                        $(window).trigger('resize');
                        setTimeout(function() {
                            $container.isotope('layout');
                        }, 100);
                        $('#temp-load').remove();
                    });
                });
            } // LOAD NEW POSTS ON SCROLL
            else {
                $(window).scroll(function() {
                    var scrollTop = $(window).scrollTop();
                    var windowHeight = $(window).height();
                    var docuHeight = $(document).height();
                    var footerHeight = $('#footer').height();
                    if (currentPage >= numPage) {
                        $('.spinner').parent().fadeOut(300, function() {
                            $('.spinner').parent().remove();
                        });
                        return;
                    }
                    if (scrollTop + windowHeight >= docuHeight - footerHeight) {
                        $('body').append('<div id="temp-load"></div>');
                        currentPage++;
                        var newUrl = newPage + '-' + currentPage + '.html';
                        $('#temp-load').load(newUrl + ' .posts', function() {
                            $('#temp-load > .infinite-container').children().css({
                                opacity: 0
                            });
                            var toAdd = $('#temp-load > .infinite-container').html();
                            $container.isotope('insert', $(toAdd), function() {
                                $container.children().css({
                                    opacity: 1
                                });
                            });
                            $('.video-js').each(function() {
                                var videoId = $(this).attr('id');
                                videojs(videoId);
                            });
                            handleVideo();
                            flexslider();
                            $(window).trigger('resize');
                            setTimeout(function() {
                                $container.isotope('layout');
                            }, 100);
                            $('#temp-load').remove();
                        });
                    }
                });
            }
        }
    }
}
/* POST TYPE GALLERY ISOTOPE */
function postIsotope() {
    if ($('.post .post-masonry').length) {
        var $postMasonry = $('.post .post-masonry');
        $postMasonry.isotope({
            itemSelector: '.post figure',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
        $(window).resize(function() {
            $postMasonry.isotope('layout');
        });
    }
}