
// MAIN VARIABLES INITIALIZATION
var showMobileMenuWidth = 1200;
var body                = $('body');
var wrapper             = $('#wrapper');
var toggleMenu          = $('.toggle-menu');
var topnav              = $('.main-nav-wrapper');
var topnavHeight        = $('#main-navigation').height();
var topbarHeight        = $('#topbar').height() + 1;
var headerTopHeight     = $('.header-top').height();
var windowWidth         = $(window).width();
var windowHeight        = $(window).height();
var scrollPos           = $(window).scrollTop();
var lastScrollTop       = 0;
var fullPageCreated     = false;
var isOpera             = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
var isFirefox           = typeof InstallTrigger !== 'undefined';
var isSafari            = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
var isIE                = false || !!document.documentMode;
var isEdge              = !isIE && !!window.StyleMedia;
var isChrome            = !!window.chrome && !!window.chrome.webstore;
var isBlink             = (isChrome || isOpera) && !!window.CSS;

$(window).scroll(function () {

  'use strict';
  scrollPos = $(window).scrollTop();
  navbarScroll();
  stickyNav();
  headerNoSticky();
  handleTopbar();
});

$(window).resize(function () {
  
  'use strict';
  handleMenus();
  handleFullpage();
});

(function () {
  'use strict';

  var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
  };

  handleMenus();
  handleTopMenu();
  handleFullscreenMenu();
  handleOffMainMenu();
  handleSideMenu();
  handleMobileMenu();
  mainNavSubmenus();
  asideNavSubmenus();
  navbarScroll();
  stickyNav();
  headerNoSticky();
  onepageNavigation();
  handleFullpage();

  if(!isMobile.any() && windowWidth > 992) {
    splitscreen();
  }
  handleTopbar();
  menuBackgroundImg();
  if (body.data('page-type') !== 'ecommerce') {
    $('.wishlist-tool, .cart-tool').remove();
  }

}());

// HANDLE MENUS 
function handleMenus() {
  windowWidth = $(window).width();
  if (!$('#off-fullscreen-menu').length && !$('#off-aside-menu').length && !$('.left-nav').length && !$('.right-nav').length && !$('.aside-right').length) {
    if (windowWidth < showMobileMenuWidth) {
      body.addClass('menu-mobile').removeClass('top-menu-open');
      toggleMenu.removeClass('active');
      $('#main-menu, .main-menu').removeClass('main-menu-open');
    } else {
      body.removeClass('menu-mobile mobile-menu-open');
    }
  } else {
    body.removeClass('menu-mobile mobile-menu-open');
  }
}

// OFF MAIN MENU (SAME PLACE AS NORMAL TOP MENU)
function handleOffMainMenu() {
  var mainMenu = $('.off-main-menu');
  $('html').on('click', 'body:not(.menu-mobile) [data-toggle="main-menu"]', function (e) {
    e.preventDefault();
    if ($('.toggle-menu').hasClass('active') === true) {
      $('.toggle-menu').removeClass('active');
      mainMenu.removeClass('main-menu-open');
      body.addClass('main-menu-closing');
      setTimeout(function () {
        if (body.hasClass('main-menu-closing') === true) {
          body.removeClass('main-menu-closing');
        }
      }, 500);
    } else {
      $('.toggle-menu').addClass('active');
      mainMenu.addClass('main-menu-open');
    }
  });
}

// OFF SIDE MENU
function handleSideMenu() {
  if ($.fn.slimScroll) {
    $('#aside-nav .main-nav-wrapper').slimScroll({
      color: $('#off-aside-menu').hasClass('header-dark') ? '#7B7B7B' : '#eee',
      size: '8px',
      height: '100%',
      alwaysVisible: true
    });
  }
  $('body').on('click', '[data-toggle="aside-menu"]', function (e) {
    e.preventDefault();
    var toggleEffect = $(this).data('effect');
    var menuPosition = $(this).data('position');
    if (toggleEffect === 'hover') {
      $('body').addClass('aside-hover');
    }
    if (toggleEffect === 'push') {
      $('body').removeClass('aside-hover');
    }
    if (menuPosition === 'left') {
      $('body').addClass('aside-left').removeClass('aside-right');
    }
    if (menuPosition === 'right') {
      $('body').addClass('aside-right').removeClass('aside-left');
    }
    if ($('.toggle-menu').hasClass('active') === true) {
      closeSideMenu();
    } else {
      $('.toggle-menu').addClass('active');
      $('body').addClass('aside-menu-open');
    }
  });
  body.click(function (e) {
    if ($(e.target).parents('#aside-nav').length || $(e.target).is('aside') || $(e.target).is('.toggle-menu') || $(e.target).parents('.toggle-menu').length || $(e.target).parents('.off-menu-btn').length) {
      return;
    }
    if (body.hasClass('aside-menu-open') === true) {
      closeSideMenu();
    }
  });
}

// CLOSE OFF SIDE MENU
function closeSideMenu() {
  if (body.hasClass('aside-menu-open')) {
    $('.toggle-menu').removeClass('active');
    body.removeClass('aside-menu-open');
    body.addClass('aside-menu-closing');
    setTimeout(function () {
      if (body.hasClass('aside-menu-closing') === true) {
        body.removeClass('aside-menu-closing');
      }
    }, 500);
  }
}

// OFF MOBILE MENU
function handleMobileMenu() {
  $('html').on('click', 'body.menu-mobile .toggle-menu', function (e) {
    $('.toggle-menu').toggleClass('active');
    if ($('.toggle-menu').hasClass('active') === true) {
      setTimeout(function(){
        $('body').addClass('mobile-menu-open');
      },100);
    } else {
      $('.toggle-menu').removeClass('active');
      $('body').removeClass('mobile-menu-open');
      $('body').addClass('mobile-menu-closing');
      setTimeout(function () {
        if ($('body').hasClass('mobile-menu-closing') === true) {
          $('body').removeClass('mobile-menu-closing');
        }
      }, 500);
    }
  });
  $(window).on('click', function(e) {
    if ($(e.target).parents('#aside-nav').length != 1 && $('body').hasClass('menu-mobile')) {
      $('.toggle-menu').removeClass('active');
      $('body').removeClass('mobile-menu-open');
      $('body').addClass('mobile-menu-closing');
      setTimeout(function () {
        if ($('body').hasClass('mobile-menu-closing') === true) {
          $('body').removeClass('mobile-menu-closing');
        }
      }, 500);
    }
    $('.close-aside-nav').on('click', function(){
      $('.toggle-menu').removeClass('active');
      $('body').removeClass('mobile-menu-open');
    });
  });
}

// CLOSE OFF MOBILE MENU
function closeMobileMenu() {
  if ($('body').hasClass('mobile-menu-open')) {
    $('.toggle-menu').removeClass('active');
    $('body').removeClass('mobile-menu-open');
    $('body').addClass('mobile-menu-closing');
    setTimeout(function () {
      if ($('body').hasClass('mobile-menu-closing') === true) {
        $('body').removeClass('mobile-menu-closing');
      }
    }, 500);
  }
}

// OFF TOP MENU 
function handleTopMenu() {
  $('html').on('click', 'body:not(.menu-mobile) [data-toggle="top-menu"]', function (e) {
    toggleMenu.toggleClass('active');
    body.toggleClass('top-menu-open');
    $('#off-top-menu .submenu').each(function () {
      var menuWidth = $(this).prev().width();
      var menuHeight = $(this).height();
      $(this).css('left', menuWidth).css('top', -(menuHeight / 2 - 15));
    });
  });
  body.click(function(e) {
    if ($(e.target).parents('#off-top-menu').length || $(e.target).parents('.toggle-menu').length || $(e.target).hasClass('toggle-menu')) {
      return;
    }
    if (body.hasClass('top-menu-open') === true) {
      body.removeClass('top-menu-open');
      toggleMenu.removeClass('active');
    }
  });
}

// OFF FULLSCREEN OVERLAY MENU
function handleFullscreenMenu() {
  $('body').on('click', '[data-toggle="fullscreen-menu"]', function(e) {
    $('.toggle-menu').toggleClass('active');
    $('body').toggleClass('full-menu-open');
    $('#off-fullscreen-menu').toggleClass('full-menu-open');
    $('body').on('click', '#off-fullscreen-menu nav > ul li > a', function (e) {
      e.preventDefault();
      var targetLink = $(this).attr('href');
      if (targetLink != '#' && targetLink != '') {
          $('body').fadeOut(350, function() {
              window.location.href = targetLink;
          });
      }
      if ($(this).hasClass('is-open')) {
        $(this).removeClass('is-open');
        $(this).next().slideUp(300);
      } 
      else {
        $(this).parent('.submenu').parent().find('.is-open').next().slideUp(300);
        $(this).parent('.submenu').parent().find('.is-open').removeClass('is-open');
        $(this).addClass('is-open');
        $(this).next().slideDown(300);
      }
    });
  });
}

// SUBMENUS MAIN NAVIGATION 
function mainNavSubmenus() {
  if ($.fn.superfish) {
    if (!$('#off-aside-menu').length && !body.hasClass('left-nav') && !body.hasClass('right-nav') && !body.hasClass('overview') && !body.hasClass('split-screen')) {
      $('#main-navigation #main-menu ul, #main-navigation .main-menu ul, #main-navigation .nav-tools').superfish({
        popUpSelector: 'ul,.mega-menu-content',
        delay: 250,
        speed: 250,
        animation: {opacity: 'show'},
        animationOut: {opacity: 'hide'},
        cssArrows: !1,
        autoArrows: false,
        onShow: function() {
          $(this).find('.perspective-img-1, .perspective-img-2, .perspective-img-3').css('-webkit-transform','translateY(20px)').css('opacity',1);
        },
        onHide: function() {
          $(this).find('.perspective-img-1, .perspective-img-2, .perspective-img-3').css('-webkit-transform','translateY(50px)').css('opacity',0);
        }
      });
      $('.topbar-menu > ul').superfish({
        popUpSelector: 'ul',
        delay: 100,
        speed: 300,
        animation: {
          opacity: 'show',
          height: 'show'
        },
        animationOut: {
          opacity: 'hide',
          height: 'hide'
        },
        cssArrows: !1,
        autoArrows: false
      });
    }
  }
}

// SUBMENUS LATERAL NAVIGATION 
function asideNavSubmenus() {
  var timer = null;
  $('#main-aside-menu > ul li > a').click(function(e) {
    if ($(this).hasClass('is-open')) {
      $(this).removeClass('is-open');
      $(this).next().slideUp(300);
    } else {
      $(this).parent('.submenu').parent().find('.is-open').next().slideUp(300);
      $(this).parent('.submenu').parent().find('.is-open').removeClass('is-open');
      if($(this).parent().hasClass('submenu')) $(this).addClass('is-open');
      $(this).next().slideDown(300);
    }
    clearTimeout(timer);
    //cancel the previous timer.
    timer = null;
    timer = setTimeout(function () {
      $('#main-aside-menu > ul li > a').removeClass('is-open');
      $('#main-aside-menu > ul li > a').next().slideUp();
    }, 50000);
    if($('body').hasClass('one-page') || $('body').hasClass('slider-page')){
        closeMobileMenu();
    }
  });
}

// MANAGE NAVIGATION LOGO / BACKGROUND COLOR
function navbarScroll() {
  var topScroll = $(window).scrollTop();
  var logoImg = $('body').find('#logo a img');
  var logoLight = $('body').find('#logo a').data('logo-light');
  var logoDark = $('body').find('#logo a').data('logo-dark');
  if(body.hasClass('onepage-special')) return;
  if (body.hasClass('header-light')) {
    logoImg.attr('src', logoDark);
  }
  if (body.hasClass('header-dark')) {
    logoImg.attr('src', logoLight);
  }
  if (body.hasClass('transparent-dark')) {
    logoImg.attr('src', logoDark);
  }
  if (body.hasClass('nav-bottom')) {
    return;
  }
  if (body.hasClass('header-transparent') && body.hasClass('transparent-dark')) {
    logoImg.attr('src', logoDark);
  }
  if (topnav.length > 0) {
    if (topScroll > 0) {
      body.removeClass('topnav-top');
      if (!topnav.hasClass('bg-black') && !body.hasClass('header-light') && !body.hasClass('header-dark') && !body.hasClass('header-scroll-transparent')) {
        logoImg.attr('src', logoDark);
      }
      if (body.hasClass('header-scroll-dark')) {
        logoImg.attr('src', logoLight);
      }
      if (body.hasClass('header-scroll-transparent') && body.hasClass('header-light')) {
        logoImg.attr('src', logoLight);
      }
      if (body.hasClass('header-scroll-transparent') && !body.hasClass('header-light')) {
        logoImg.attr('src', logoLight);
      }
    } else {
      body.addClass('topnav-top');
      // Fix for revolution slider parallax effect
      $('.slotholder').animate({ textIndent: 0 }, {
        step: function (now, fx) {
          $(this).css('-webkit-transform', 'translate3d(0px, ' + now + 'px, 0px)');
        },
        duration: 400
      }, 'ease-in-out');
      if (!topnav.hasClass('bg-black') && !body.hasClass('header-light') && !body.hasClass('header-dark')) {
        $('#logo a img').attr('src', logoLight);
        if (body.hasClass('header-transparent') && body.hasClass('transparent-dark')) {
          logoImg.attr('src', logoDark);
        }
      }
      if (body.hasClass('header-dark')) {
        $('#aside-logo a img').attr('src', $('body').find('#aside-logo a').data('logo-light'));
      }
    }
  }
  if (body.hasClass('dark-skin')) {
      if(body.hasClass('header-light')){
          body.removeClass('header-light').addClass('header-dark');
      }else{
        logoImg.attr('src', logoLight);
      }
  }
}

// NAVIGATION VISIBLE ONLY ON SCROLL TO TOP
function stickyNav() {
  if ($('.sticky-nav').length) {
    var stickyNav = $('.sticky-nav');
    var windowScrollTop = $(window).scrollTop();
    if (windowScrollTop >= 60) {
      stickyNav.addClass('pos-fixed');
    } else {
      stickyNav.removeClass('pos-fixed');
    }
  }
}

/* HEADER NO STICKY EFFECT */
function headerNoSticky() {
  scrollPos = $(window).scrollTop();
  if ($('.header-no-sticky #main-navigation:not(.header-2)').length) {
    var st = $(this).scrollTop();
    if (st > lastScrollTop) {
      $('.header-no-sticky #main-navigation').removeClass('nav-visible');
    } else {
      $('.header-no-sticky #main-navigation').addClass('nav-visible');
    }
    if (st > 0) {
      $('#main-navigation .main-nav-wrapper').css('background', '#fff');
    } else {
      $('#main-navigation .main-nav-wrapper').css('background', '');
    }
    lastScrollTop = st;
  }
}

// ONEPAGE NAVIGATION
function onepageNavigation() {
  if (body.hasClass('one-page')) {
    $('#main-navigation, #main-aside-menu').onePageNav({
      currentClass: 'current',
      scrollSpeed: 1000,
      easing: 'easeInOutQuint'
    });
  }
}

// ONEPAGE FULLPAGE
function handleFullpage() {
  if ($('.fullpage').length) {
      windowWidth = $(window).width();
      if(windowWidth < 1024) {
          if ($.fn.fullpage) {
              fullPageCreated = false;   
              $.fn.fullpage.destroy('all');
              console.log('aaa');
          }  
      }else{
          var tooltipsText = [];
          $('.fullpage .section').each(function (i) {
            var title = $(this).data('title');
            tooltipsText[i] = title;
          });
          if(fullPageCreated === false) {
              fullPageCreated = true;
              $('.fullpage').fullpage({
                anchors: tooltipsText,
                navigation: true,
                showActiveTooltip: true,
                navigationPosition: 'left',
                navigationTooltips: tooltipsText,
                scrollBar: false,
                scrollOverflow: true,
                touchSensitivity: 15,
                normalScrollElementTouchThreshold: 5,
                controlArrows: true,
                verticalCentered: true,
                resize: false,
                paddingTop: '0',
                paddingBottom: '20px',
                responsiveWidth: 0,
                responsiveHeight: 0,
                afterLoad: function (anchorLink, index) {        
                  var logoImg = $('#logo a img');
                  var logoLight = $('#logo a').data('logo-light');
                  var logoDark = $('#logo a').data('logo-dark');
                  if ($('.fp-section.active').hasClass('section-dark')) {
                    body.removeClass('transparent-dark');
                    $('#fp-nav').addClass('nav-light');
                    logoImg.attr('src', logoLight);
                  } else {
                    body.addClass('transparent-dark');
                    $('#fp-nav').removeClass('nav-light');
                    logoImg.attr('src', logoDark);
                  }
                }
              });
          }

      }
      
  }
}

// ONEPAGE SLIT SCREEN
function splitscreen() {
  if ($('#split-screen').length) {
    var tooltipsText = [];
    $('#split-screen .split-left .split-section').each(function (i) {
      var title = $(this).data('title');
      tooltipsText[i] = title;
    });
    $('#split-screen').multiscroll({
      verticalCentered: true,
      scrollingSpeed: 700,
      easing: 'easeInQuart',
      menu: '#main-menu',
      anchors: tooltipsText,
      sectionsColor: [],
      navigation: true,
      navigationPosition: 'right',
      navigationColor: '#000',
      navigationTooltips: tooltipsText,
      normalScrollElements: null,
      keyboardScrolling: true,
      sectionSelector: '.split-section',
      leftSelector: '.split-left',
      rightSelector: '.split-right',
      //events
      onLeave: function (index, nextIndex, direction) {
      },
      afterLoad: function (anchorLink, index) {
      },
      afterLoad: function (anchorLink, index) {
        var logoImg = $('#logo a img');
        var logoLight = $('#logo a').data('logo-light');
        var logoDark = $('#logo a').data('logo-dark');
        if (!$('.split-left .split-section.active').hasClass('section-dark')) {
          body.addClass('transparent-dark');
          logoImg.attr('src', logoDark);
        } else {
          body.removeClass('transparent-dark');
          logoImg.attr('src', logoLight);
        }
        if (!$('.split-right .split-section.active').hasClass('section-dark')) {
          $('#multiscroll-nav').addClass('nav-dark');
        } else {
          $('#multiscroll-nav').removeClass('nav-dark');
        }
        if ($('html:not(.split-bordered) .split-left .split-section.active').hasClass('bg-primary')) {
          $('.split-screen #main-menu li.active a').attr('style', 'color:#000 !important');
        } else {
          $('.split-screen #main-menu li a').removeAttr('style');
        }
      }
    });
  }
}

// TOPBAR HIDE ON SCROLL
function handleTopbar() {
  if ($('#topbar').length && $(window).width() > 768 && !body.hasClass('header-no-sticky')) {
      if($('#header').hasClass('header-2')){
        var header2Height = $('.header-2 .main-nav-wrapper').height();
        var windowScrollTop = $(window).scrollTop();
        if (windowScrollTop >= topbarHeight + header2Height) {
          $('.header-2 .main-nav-wrapper').css('position', 'fixed').css('width', '100%').css('top',0);
        } else {
          $('.header-2 .main-nav-wrapper').attr('style', '');
        }
      }else if ($('html').hasClass('page-bordered')) {
          if (scrollPos > 0) {
              $('#topbar').css('margin-top', - topbarHeight + 20);
              $('#main-navigation').css('top', 20);
          } else {
              $('#topbar').css('margin-top', 20);
              $('#main-navigation').css('top', topbarHeight + 20);
          }
      }
      else{
          if (scrollPos > 0) {
              $('#topbar').css('margin-top', - topbarHeight);
              $('#main-navigation').css('top', 0);
          } else {
              $('#topbar').css('margin-top', 0);
              $('#main-navigation').css('top', topbarHeight);
          }
      }      
  }
}

// MENU BACKGROUND IMAGE
function menuBackgroundImg() {
  $('[data-menu-img]').each(function () {
    var dataImg = $(this).attr('data-menu-img');
    $(this).css('background-image', 'url(' + dataImg + ')');
  });
}