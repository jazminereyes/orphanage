// MAIN VARIABLES INITIALIZATION
var revapi;

$(window).resize(function () {
  'use strict';

  if($('#rev_slider').data('slider-layout') == 'fullscreen' && $('body').hasClass('left-nav')){
      var windowHeight    = $(window).height();
      $('.rev_slider_wrapper, #rev_slider').height(windowHeight);
  }

});
(function () {
  'use strict';
  slickCarousel();
  setTimeout(function(){
    revSlider();
    owlCarousel();
  },100);
  bxSlider();
  
  flexslider();
}());

// OWL CAROUSEL
function owlCarousel() {
  $('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').each(function () {
    var $carousel = $(this), opts = null, pluginOptions = $carousel.data('plugin-options'), defaults = {
        'autoplay': false,
        'autoplayTimeout': 4000,
        'autoplayHoverPause': true,
        'loop': false,
        'dots': false,
        'margin': 10,
        'nav': true,
        'center': false,
        'startPosition': 0,
        'items': 5,
        'navRewind': false,
        responsive: {
          0: { items: $carousel.data('items-mobile') ? $carousel.data('items-mobile') : 1 },
          768: { items: $carousel.data('items-tablet') ? $carousel.data('items-tablet') : 3 },
          1024: { items: $carousel.data('items-desktop') ? $carousel.data('items-desktop') : 5 }
        },
        'navText': [
          '<i class="nc-icon-outline arrows-1_minimal-left"></i>',
          '<i class="nc-icon-outline arrows-1_minimal-right"></i>'
        ]
      };
    opts = $.extend({}, defaults, pluginOptions);
    $carousel.owlCarousel(opts);
    function owlNav() {
      var carouselImageHeight = $carousel.find('figure').height();
      if (carouselImageHeight === null) {
        return;
      }
      if ($carousel.hasClass('product-carousel')) {
        var itemHeight = $carousel.find('.item').height();
        $carousel.find('.owl-prev, .owl-next').css('top', itemHeight / 2);
      } else if ($carousel.hasClass('features-carousel')) {
        var itemHeight = $carousel.find('.item').height();
        $carousel.find('.owl-prev, .owl-next').css('top', itemHeight / 2);
      } else {
        var navPos = carouselImageHeight / 2;
        $carousel.find('.owl-prev, .owl-next').css('top', carouselImageHeight / 2);
      }
      $carousel.on('changed.owl.carousel', function (event) {
        $carousel.find('figure').addClass(' visible');
      });
    }
    owlNav();
    $carousel.on('resized.owl.carousel', function (event) {
      owlNav();
    });
  });
}

// SLICK CAROUSEL
function slickCarousel() {
  $('.slick-carousel:not(.manual)').each(function () {
    var $this = $(this), opts = null, pluginOptions = $this.data('plugin-options'), defaults = {
        'centerMode': true,
        'infinite': false,
        'slidesToShow': 1,
        'initialSlide': 1,
        'prevArrow': '<div class="slick-prev"><i class="nc-icon-outline arrows-1_tail-left"></i></div>',
        'nextArrow': '<div type="button" class="slick-next"><i class="nc-icon-outline arrows-1_tail-right"></i></div>'
      };
    opts = $.extend({}, defaults, pluginOptions);
    $this.slick(opts);
  });
}

// BX SLIDER
function bxSlider() {
  $('.bx-slider:not(.manual)').each(function () {
    var $this = $(this), opts = null, pluginOptions = $this.data('plugin-options'), defaults = {
        'pager': false,
        'mode': 'horizontal',
        'auto': true,
        'touchEnabled': true,
        'controls': false
      };
    opts = $.extend({}, defaults, pluginOptions);
    $this.bxSlider(opts);
  });
}
stopAtSlide:1
// REVOLUTION SLIDER
function revSlider() {
  if ($.fn.revolution && $('#rev_slider').length) {
    var revSliderLayout = $('#rev_slider').data('slider-layout') ? $('#rev_slider').data('slider-layout') : 'auto';
    var revSliderHeight =  $('#rev_slider').data('gridheight') ? $('#rev_slider').data('gridheight') : [800, 800, 480, 360];
    var windowHeight    = $(window).height();
    if($('body').hasClass('left-nav')){
        revSliderLayout = 'auto';
        if($('#rev_slider').data('slider-layout') == 'fullscreen'){
            revSliderHeight = windowHeight;
        }
    }
    revapi = $('#rev_slider').show().revolution({
      sliderType: $('#rev_slider').data('slider-type') ? $('#rev_slider').data('slider-type') : 'standard',// standard, hero, carousel
      jsFileLocation: 'assets/js/plugins/revolution-slider/revolution/js/',
      sliderLayout: revSliderLayout, // auto, fullscreen, fullwidth
      dottedOverlay: 'none',
      delay: 9000,
      lazyLoad:'on',
      navigation: {
        keyboardNavigation: 'on',
        keyboard_direction: 'horizontal',
        mouseScrollNavigation: $('#rev_slider').data('nav-mouse') ? $('#rev_slider').data('nav-mouse') : 'off',
        onHoverStop: 'off',
        touch: {
          touchenabled: 'on',
          swipe_threshold: 75,
          swipe_min_touches: 1,
          swipe_direction: 'horizontal',
          drag_block_vertical: false
        },
        arrows: {
          style: 'zeus',
          enable: $('#rev_slider').attr('data-nav-arrows') ? false : true,
          hide_onmobile: false,
          hide_onleave: false,
          tmp: $('#rev_slider').data('slider-thumbnail') ? '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>' : '<div class="tp-title-wrap"></div>',
          left: {
            h_align: 'left',
            v_align: 'center',
            h_offset: 10,
            v_offset: 0
          },
          right: {
            h_align: 'right',
            v_align: 'center',
            h_offset: 10,
            v_offset: 0
          }
        },
        bullets: {
          enable: $('#rev_slider').attr('data-nav-bullets') ? true : false,
          hide_onmobile: false,
          style: 'uranus',
          hide_onleave: false,
          direction: 'vertical',
          h_align:  $('#rev_slider').data('bullets-align') ? $('#rev_slider').data('bullets-align') : 'left',
          v_align: 'center',
          h_offset: 30,
          v_offset: 0,
          space: 10,
          tmp: '<span class="tp-bullet-inner"></span>'
        }
      },
      carousel: {
        maxRotation: 5,
        vary_rotation: "off",
        minScale: 15,
        vary_scale: "off",
        horizontal_align: "center",
        vertical_align: "center",
        fadeout: "on",
        vary_fade: "on",
        maxVisibleItems: 3,
        infinity: "off",
        space: -80,
        stretch: "off"
      },
      responsiveLevels: $(this).data('responsive') ? $(this).data('responsive') : [1240,1024,778,480],
      gridwidth: $(this).data('gridwidth') ? $(this).data('gridwidth') : [1230, 1024, 767, 480],
      gridheight: revSliderHeight,
      lazyType: 'none',
      parallax: {
        type: 'mouse',
        origo: 'slidertop',
        speed: 2000,
        levels: [2, 3, 4, 5, 6, 7, 12,16, 10, 50],
        disable_onmobile: 'on'
      },
      shadow: 0,
      spinner: 'off',
      stopLoop: 'on',
      stopAfterLoops: 0,
      // stopAtSlide: $('#rev_slider').data('autoplay') ? 0 : 1,
      shuffle: 'off',
      autoHeight: 'off',
      disableProgressBar: 'on',
      hideThumbsOnMobile: 'off',
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      startWithSlide: 0,
      fallbacks: {
        simplifyAll: 'off',
        nextSlideOnWindowFocus: 'off',
        disableFocusListener: 'off'
      }
    });
    revapi.bind("revolution.slide.onbeforeswap",function (e) {
        if($('#rev_slider').data('slider-layout') == 'fullscreen' && $('body').hasClass('left-nav')){
            var windowHeight    = $(window).height();
            $('.rev_slider_wrapper, #rev_slider').height(windowHeight);
        }
    });
    revapi.bind('revolution.slide.onchange', function (event, data) {
      var logoImg = $('#logo a img');
      var logoLight = $('#logo a').data('logo-light');
      var logoDark = $('#logo a').data('logo-dark');
      var currentSlide = data.slideIndex;
      if (revapi.find('li').eq(data.slideIndex - 1).attr('data-color') === 'dark') {
        $('body').addClass('transparent-dark');
        logoImg.attr('src', logoDark);
      }
      if (revapi.find('li').eq(data.slideIndex - 1).attr('data-color') === 'light') {
        $('body').removeClass('transparent-dark');
        logoImg.attr('src', logoLight);
      }
    });
    $('body').on('click', '[data-go-to-slide]', function() {
      var goToSlide = $(this).data('go-to-slide');
      revapi.revshowslide(goToSlide);
      return false;
    });

    setTimeout(function(){
        revapi.revredraw();
    },400);
  }
}
// FLEXSLIDER
function flexslider() {
  $('[data-plugin-flexslider]:not(.manual), .flexslider:not(.manual)').each(function () {
    var $this = $(this), opts = null, pluginOptions = $this.data('plugin-options'), defaults = {
        'animation': 'fade', //String: Select your animation type, "fade" or "slide"
        'easing': 'swing',//{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
        'direction': 'horizontal', //String: Select the sliding direction, "horizontal" or "vertical"
        'animationLoop': true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        'smoothHeight': false, //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode  
        'startAt': 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        'slideshow': true, //Boolean: Animate slider automatically
        'slideshowSpeed': 7000,//Integer: Set the speed of the slideshow cycling, in milliseconds
        'animationSpeed': 600,//Integer: Set the speed of animations, in milliseconds
        'initDelay': 0, //{NEW} Integer: Set an initialization delay, in milliseconds
        'pauseOnAction': true,  //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        'pauseOnHover': true, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        'touch': true, //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
        'video': false, //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
        'controlNav': true, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        'directionNav': true, //Boolean: Create navigation for previous/next navigation? (true/false)
        'prevText': '', //String: Set the text for the "previous" directionNav item
        'nextText': '',//String: Set the text for the "next" directionNav item
        'keyboard': true, //Boolean: Allow slider navigating via keyboard left/right keys
        'multipleKeyboard': false, //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
        'mousewheel': false,  //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
        'pausePlay': false, //Boolean: Create pause/play dynamic element
        'pauseText': 'Pause', //String: Set the text for the "pause" pausePlay item
        'playText': 'Play',  //String: Set the text for the "play" pausePlay item
        'controlsContainer': '', //{UPDATED} Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.
        'manualControls': '', //Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
        'itemWidth': 0,  //{NEW} Integer: Box-model width of individual carousel items, including horizontal borders and padding.
        'itemMargin': 0, //{NEW} Integer: Margin between carousel items.
        'minItems': 0,//{NEW} Integer: Minimum number of carousel items that should be visible. Items will resize fluidly when below this.
        'maxItems': 0
      };
    opts = $.extend({}, defaults, pluginOptions);
    $this.flexslider(opts);
  });
}