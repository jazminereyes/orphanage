$(window).resize(function () {

  'use strict';
  portfolioAjax();
  galleryCover();
});

$(window).bind('load', function () {

  'use strict';
  setTimeout(function(){
    portfolioAjax();
  },400);
});

(function () {
  
  'use strict';
  /* PORTFOLIO ITEM AJAX LOADING */
  if ($('.portfolio-ajax').length) {
    var colioRun = function () {
      $('#ajax-portfolio').remove();
      $('.masonry').colio({
        id: 'ajax-portfolio',
        theme: 'white',
        placement: 'before',
        scrollOffset: 130,
        expandLink: '.ajax-link',
        closeText: '<i class="nc-icon-outline ui-1_circle-remove"></i>',
        nextText: '<i class="nc-icon-outline arrows-1_circle-right-37"></i>',
        prevText: '<i class="nc-icon-outline arrows-1_circle-left-38"></i>',
        onContent: function (content) {
          $('.flexslider', content).flexslider({
            'controlNav': false,
            'prevText': '',
            'nextText': ''
          });
          iconHover();
          handleVideo();
          if($(content).find('.masonry').length != 0){
              setTimeout(function(){
                  handleIsotope();
              },300);
          }
        }
      });
    };
    colioRun();
  }
  galleryCover();
}());

// PORTFOLIO SINGLE: IMAGE COVER HALF OF PAGE
function galleryCover() {
  if ($('.gallery-medium-cover').length) {
    var element = $('.gallery-medium-cover');
    if(element.attr('style') == undefined) {
      setTimeout(function(){
        var elementPosition = element.offset();
        element.css('margin-left', -element.offset().left).css('margin-top', -element.offset().top);
      },500);    
    }else{
      element.css('margin-left', '').css('margin-top', '');
      var elementPosition = element.offset();
      element.css('margin-left', -element.offset().left).css('margin-top', -element.offset().top);
    }
  }
}

// PORTFOLIO AJAX LOADING
function portfolioAjax() {
  if ($('.section-portfolio .grid').length) {
    var $container = $('.grid');
    /* INFINITE SCROLL FOR PORTFOLIO LIST */
    if ($('.infinite-container').length) {
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
      var currentPage = 1;
      var newPage = $('.next-page').attr('href');
      var numPage = $('.next-page').data('num-page');
      // PORTFOLIO INFINITE ONCLICK
      if ($('.infinite-container').hasClass('infinite-onclick')) {
        $(".next-page").unbind('click');

        $('.next-page').click(function (e) {
          e.preventDefault();
          $('body').append('<div id="temp-load"></div>');
          currentPage++;
          if (currentPage >= numPage) {
            $('.next-page').parent().fadeOut(300, function () {
              $('.next-page').parent().remove();
            });
          }
          var newUrl = newPage + '-' + currentPage + '.html';
          $('#temp-load').load(newUrl + ' .grid', function () {
            $('#temp-load > .infinite-container').children().css({ opacity: 0 });
            var toAdd = $('#temp-load > .infinite-container').html();
            $container.isotope('insert', $(toAdd), function () {
              $container.children().css({ opacity: 1 });
            });
            masonryHeight();
            $container.isotope('layout');
            $('#temp-load').remove();
          });
        });
      } 
      // PORTFOLIO INFINITE SCROLL
      else {
        $(window).scroll(function () {
          var scrollTop = $(window).scrollTop();
          var windowHeight = $(window).height();
          var docuHeight = $(document).height();
          var footerHeight = $('#footer').height();
          if (currentPage >= numPage) {
            $('.spinner').parent().fadeOut(300, function () {
              $('.spinner').parent().remove();
            });
          } else {
            if (scrollTop + windowHeight >= docuHeight - footerHeight) {
              $('body').append('<div id="temp-load"></div>');
              currentPage++;
              var newUrl = newPage + '-' + currentPage + '.html';
              $('#temp-load').load(newUrl + ' .grid', function () {
                $('#temp-load > .infinite-container').children().css({ opacity: 0 });
                var toAdd = $('#temp-load > .infinite-container').html();
                $container.isotope('insert', $(toAdd), function () {
                  $container.children().css({ opacity: 1 });
                });
                masonryHeight();
                $container.isotope('layout');
                $('#temp-load').remove();
              });
            }
          }
        });
      }
    }
  }
}