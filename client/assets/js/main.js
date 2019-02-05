// MAIN VARIABLES INITIALIZATION 
var $window             = $(window);
var body                = $('body');
var mainContent         = $('#main-content');
var toggleBtn           = $('.toggle-menu');
var topnav              = $('#main-navigation > div');
var topnavHeight        = topnav.height();
var sectionHeader       = $('.section-header');
var sectionHeaderHeight = $('.section-header').height();
var windowWidth         = $(window).width();
var windowHeight        = $(window).height();
var isOpera             = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
var isFirefox           = typeof InstallTrigger !== 'undefined';
var isSafari            = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
var isIE                = false || !!document.documentMode;
var isEdge              = !isIE && !!window.StyleMedia;
var isChrome            = !!window.chrome && !!window.chrome.webstore;
var isBlink             = (isChrome || isOpera) && !!window.CSS;

$(window).load(function() {

    'use strict';
    pageLoader();
    headerFading();
});

$(window).scroll(function() {

    'use strict';
    parallaxZoomOut();
    handleSticky();
    adjustSidebarHeight();
});

$(window).resize(function() {

    'use strict';
    handleSticky();
    fullHeight();
    handleVideo();
    footerReveal();
    halfSection();
    handleSelect();
    imgCoverSquare();
    adjustSidebarHeight();
    formGroup();
    forceHeight();
});

(function() {

    'use strict';

    // FIX GOOGLE MAP HUGE LOAD TIME
    if($('.map').length){
        setTimeout(function(){
            pageLoader();
        },100);
    }
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

    if(isMobile.any()) {
        body.addClass('is-mobile');
    }

    simpleSlider();
    fullHeight();
    demo();
    handlepopup();
    notification();
    parallaxZoomOut();
    handleSelect();
    rating();
    scrollTop();
    calendar();
    imgCoverSquare();
    handleModals();
    handleLinks();
    handleSticky();
    iconHover();
    handleQuantity();
    footerReveal();
    screenshotPreview();
    imageZoom();
    halfSection();
    adjustHeight();
    handleAccordion();
    tickersAnimation();
    tagsInput();
    formGroup();
    handleCountDown();
    handleCountUp();
    handleDatepicker();
    checkCategories();
    goNext();
    handleProgress();
    circleProgress();
    scrollEasing();
    faqCategories();
    colorBackground();
    handleTooltips();
    appearEffect();
    handleTabs();
    textAnimation();
    autosize();
    commentReply();
    if($('code.html').length){
        hljs.initHighlightingOnLoad();
    }
    setTimeout(function() {
        handleVideo();
        adjustSidebarHeight();
        forceHeight();
    }, 200);   
    setTimeout(function() {
        $(window).trigger('resize');
        if(!isMobile.any()) {
            skrollr.init({
                forceHeight: false
            });
        }
    }, 500);   
}());

// Slide comment textarea
function commentReply(){
    $('.comment-reply-form').slideUp();
    $('.comment-reply').click(function(){
        $(this).parents('.comment-inner').find('.comment-reply-form').slideToggle();
    });
}

// Autosize textarea
function autosize(){
    $("textarea").keyup(function (e) {
        autoheight(this);
    });
    function autoheight(a) {
        if (!$(a).prop('scrollTop')) {
            do {
                var b = $(a).prop('scrollHeight');
                var h = $(a).height();
                $(a).height(h - 5);
            }
            while (b && (b != $(a).prop('scrollHeight')));
        };
        $(a).height($(a).prop('scrollHeight') + 10);
        if(a.hasClass('comment-reply')) $(a).height($(a).prop('scrollHeight') + 10);
    }
    autoheight($("textarea"));
}

function textAnimation(){
    $('.blast-text').each(function(){
      $(this).blast(
        { 
        delimiter: $(this).data("text-animation") ? $(this).data("text-animation") : "letter"
        })
        // Slide the letters into view
        .velocity("transition.shrinkIn",
            { 
                display: null,
                stagger: 35,
                delay:1000,
                duration: 1000
            }
          );
    });
}


// FORCE HEIGHT
function forceHeight(){
    $('[data-force-height]').each(function() {
        $(this).children().height('');
        var forceHeight = $(this).children().height();
        $(this).children().height(forceHeight);
    });
}

// PAGE LOADER 
function pageLoader(){
    if($('.loader-wrapper').length){
        if($('.loader-wrapper').hasClass('loader-disabled')){
            $('.loader-wrapper').addClass('loaded');
        }else{
            if($('.section-portfolio').length){
                setTimeout(function() {
                    $('.loader-wrapper').addClass('loaded');
                },500);
            }else{
                setTimeout(function() {
                    $('.loader-wrapper').addClass('loaded');
                },200);
            }
        }
    }
}

// TABS
function handleTabs(){
    $('a[data-toggle="tab"]').on('shown.bs.tab', function() {
        if($('.map').length){
            $('.map').attr('style', '');
            googleMap(); 
        }  
    }); 
}

// ELEMENTS ANIMATION WHEN APPEAR ON SCREEN
function appearEffect(){
    // Element Animation when Visible
    if ($.fn.appear) {
        setTimeout(function() {
            $('.animated, .countup, progress').appear({
                force_process: true
            });
        }, 300);
        setTimeout(function() {
            $('.circular-bar, .dial').appear({
                force_process: true
            });
        }, 1000);
    }


    $('.animated').on('appear', function(event, $allAppearedElements) {
        var element = $(this),
            animation = element.data('animation'),
            animationDelay = element.data('animation-delay');
        if (animationDelay) {
            setTimeout(function() {
                element.addClass(animation + ' visible');
            }, animationDelay);
        } else {
            element.addClass(animation + ' visible');
        }
    }); 
}

// HEADER FADING EFFECT
function headerFading(){
    if ($('.header-fading').length) {
        var marginTop = 0;
        setTimeout(function() {
            $('.header-fading').addClass('header-has-fade');
        }, 200);
    }
}

// TOOLTIPS
function handleTooltips(){
    $('[data-toggle="tooltip"]').tooltip({
        'container': 'body'
    });
}

// HANDLE COLORS & BACKGROUND
function colorBackground(){
    // Background Color
    $('[data-bg-color]').each(function() {
        var bgColor = $(this).attr('data-bg-color');
        $(this).css('background-color', bgColor);
    });
    // Image Background 
    $('[data-bg-img]').each(function() {
        var dataImg = $(this).attr('data-bg-img');
        $(this).css('background-image', 'url(assets/img/' + dataImg + ')');
    });
    // Pattern Background
    $('[data-bg-pattern]').each(function() {
        var dataImg = $(this).attr('data-bg-pattern');
        $(this).css('background-image', 'url(assets/img/' + dataImg + ')');
    });
    // Font Color
    $('[data-color]').each(function() {
        var color = $(this).attr('data-color');
        $(this).css('color', color);
        if($(this).hasClass('icon-line')) {
            $(this).css('border-color', color);
        }
    });
}

// FAQ PAGE 
function faqCategories(){
    $('.categories-list a').click(function() {
        $(this).parents('.categories-list').find('a').removeClass(' current');
        $(this).addClass('current');
    });
    $('#tabs-all').click(function() {
        $(this).parents('.categories-list').find('a').each(function(i, t) {
            var tab = $('#faq-accordion').find('.tab-pane');
            tab.removeClass('in');
            setTimeout(function() {
                tab.addClass('active');
                setTimeout(function() {
                    tab.addClass('active in');
                }, 150);
            }, 150);
        });
    });
}    

// SCROLL EASING EFFECT
function scrollEasing(){
    if(!isFirefox){
        var scrollTime = 0.4; //Scroll time
        var scrollDistance = 600; //Distance. Use smaller value for shorter scroll and greater value for longer scroll
        if ($('body').hasClass('left-nav') || $('body').hasClass('right-nav')) {
            $('#main-content').on('mousewheel DOMMouseScroll', function(event) {
                event.preventDefault();
                var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
                var scrollTop = $window.scrollTop();
                var finalScroll = scrollTop - parseInt(delta * scrollDistance);
                TweenMax.to($window, scrollTime, {
                    scrollTo: {
                        y: finalScroll,
                        autoKill: true
                    },
                    ease: Power1.easeOut, //For more easing functions see http://api.greensock.com/js/com/greensock/easing/package-detail.html
                    autoKill: true,
                    overwrite: 5
                });
            });
        } else {
            if (body.hasClass('boxed')) {
                body.on('mousewheel DOMMouseScroll', function(event) {
                    event.preventDefault();
                    var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
                    var scrollTop = $window.scrollTop();
                    var finalScroll = scrollTop - parseInt(delta * scrollDistance);
                    TweenMax.to($window, scrollTime, {
                        scrollTo: {
                            y: finalScroll,
                            autoKill: true
                        },
                        ease: Power1.easeOut, 
                        autoKill: true,
                        overwrite: 5
                    });
                });
            } else {
                $('#wrapper').on('DOMMouseScroll mousewheel wheel', function(event) {  
                    event.preventDefault();
                    // var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
                    var delta = -event.originalEvent.deltaY / 65;
                    var scrollTop = $window.scrollTop();
                    var finalScroll = scrollTop - parseInt(delta * scrollDistance);
                    TweenMax.to($window, scrollTime, {
                        scrollTo: {
                            y: finalScroll,
                            autoKill: true
                        },
                        ease: Power1.easeOut,
                        autoKill: true,
                        overwrite: 5
                    });
                });
            }
        }
    }
}

// ADJUST SIDEBAR HEIGHT
function adjustSidebarHeight(){
    $('#sidebar-left, #sidebar-right, .sidebar-left, .sidebar-right').css('min-height', '');
    $('.section-blog, .section-page, .section-portfolio').each(function() {
        var blogHeight = $(this).height();
        $('#sidebar-left, #sidebar-right, .sidebar-left, .sidebar-right').css('min-height', blogHeight);
    });
}

// PROGRESS BAR & CIRCLE
function handleProgress(){
    // PROGRESS BAR ANIMATION
    $('progress').on('appear', function(event, $allAppearedElements) {
        var progressBar = $(this),
            animationDelay = progressBar.data('animation-delay');
        if (animationDelay) {
            setTimeout(function() {
                progressBar.css('width', progressBar.attr('value') + '%');
                progressBar.parent().find('.progress-value').css('opacity', 1);
            }, animationDelay);
        } else {
            progressBar.css('width', progressBar.attr('value') + '%');
            progressBar.parent().find('.progress-value').css('opacity', 1);
        }
    });
}

// PROGRESS BAR
function progressBar() {
    $('progress').each(function() {
        var progressBar = $(this),
            animationDelay = progressBar.data('animation-delay');
        progressBar.css('width', '0%');
        progressBar.parent().find('.progress-value').css('opacity', 0);
        if (animationDelay) {
            setTimeout(function() {
                progressBar.css('width', progressBar.attr('value') + '%');
                progressBar.parent().find('.progress-value').css('opacity', 1);
            }, animationDelay);
        } else {
            progressBar.css('width', progressBar.attr('value') + '%');
            progressBar.parent().find('.progress-value').css('opacity', 1);

        }
    });
}

function circleProgress(){
    $('.circular-bar').on('appear', function(event, $allAppearedElements) {
        $(this).addClass('circular-visible');
    });


    $('.dial').on('appear', function(event, $allAppearedElements) {
        var elm = $(this);
        if(elm.parent().parent().hasClass('circular-visible')) return;
        var color = elm.attr("data-fgColor");
        var perc = elm.attr("value");
        var thin = elm.attr("data-thin");
        elm.knob({
            "readOnly": true,
            "thickness": elm.data("thin") || .2,
            "displayInput": elm.data("animated-number") || false,
            "width": elm.data("width") || 180,
            "height": elm.data("width") || 180,
            "bgColor":elm.data("bg-color") || "rgba(0,0,0,0.06)",
        });
        $({
            value: 0
        }).animate({
            value: perc
        }, {
            duration: 1000,
            easing: 'swing',
            progress: function() {
                elm.val(Math.ceil(this.value)).trigger('change');
            }
        });
        //circular progress bar color
        $(this).append(function() {
            elm.parent().parent().find('.circular-bar-content label').css('color', color);
            elm.parent().parent().find('.circular-bar-content label').text(perc + '%');
        });
    });  
}

// GO TO NEXT ELEMENT
function goNext(){
    $('.go-next, [data-go-to]').on('click', function(e) {
        e.preventDefault();
        var scrollToElement = $(this).closest('section, header').next();
        if ($(this).data('go-to')) {
            scrollToElement = $($(this).data('go-to'));
        }
        var animatedHeaderHeight = 0;
        if ($('body').hasClass('topnav-top')) animatedHeaderHeight = 60;
        if ($('html').hasClass('page-bordered') && $('body').hasClass('topnav-top'))  animatedHeaderHeight = $('#main-navigation').height() - 11;
        if ($('body').hasClass('left-nav') || $('body').hasClass('offmenu'))  animatedHeaderHeight = 0;
        if ($('body').hasClass('overview'))  animatedHeaderHeight = 30;
        if ($('#topbar').length) animatedHeaderHeight = $('#main-navigation').height() + 10;
        if ($('#topbar').length && $('body').hasClass('topnav-top')) animatedHeaderHeight = $('#main-navigation').height() + 40;
        if ($('body').hasClass('header-transparent') && $('body').hasClass('header-scroll-transparent')) animatedHeaderHeight = 30;
        $('html, body').animate({
            scrollTop: scrollToElement.offset().top - animatedHeaderHeight
        }, 1000);
    });
}

// PAGE TRANSITION FADE OUT EFFECT
function handleLinks(){
   $('a[href=\'#\']').click(function(e) {
        e.preventDefault();
    });
    $('body:not(.one-page):not(.split-screen)').on('click', '#main-menu li a, #main-aside-menu li a, .main-menu li a, figure a:not(.ajax-modal), .flexslider > a, .tools-btn, .fade-link', function(e) {
        if (!$('body').hasClass('tour') && !$('html').hasClass('one-page') && !$(this).attr('target') && !$(this).hasClass('email-link')) {
            e.preventDefault();
            var targetLink = $(this).attr('href');
            if (targetLink === '#' || targetLink === '' || $(this).hasClass('magnific')) {
                return;
            }
            $('body').fadeOut(350, function() {
                window.location.href = targetLink;
            });
        }
    });
    $('[data-link]').click(function() {
        var targetLink = $(this).data('link');
        if (targetLink !== undefined && targetLink !== '#') {
            $('body').fadeOut(350, function() {
               window.location.href = targetLink;
            });
        }
    });
}

// CHECK MENU CATEGORIES
function checkCategories(){
    $('.checklist a').each(function(i, el) {
        $(el).append('<span><span class="x"></span><span class="y"></span></span>');
        $(el).parent().on('click', function() {
            if ($(this).hasClass('checked')) {
                $(el).find('.y').removeClass('animate');
                setTimeout(function() {
                    $(el).find('.x').removeClass('animate');
                }, 50);
                $(this).removeClass('checked');
                return false;
            }
            $(el).find('.x').addClass('animate');
            setTimeout(function() {
                $(el).find('.y').addClass('animate');
            }, 100);
            $(this).addClass('checked');
            return false;
        });
        if ($(this).parent().hasClass('checked')) {
            $(el).find('.x').addClass('animate');
            setTimeout(function() {
                $(el).find('.y').addClass('animate');
            }, 100);
        }
    });
}

// SELECT INPUT
function handleSelect() {
    if ($.fn.select2) {
        setTimeout(function(){
            $('select:not(.select-picker)').each(function() {
                $(this).select2({
                    placeholder: $(this).data('placeholder') ? $(this).data('placeholder') : '',
                    allowClear: $(this).data('allowclear') ? $(this).data('allowclear') : false,
                    minimumInputLength: $(this).data('minimumInputLength') ? $(this).data('minimumInputLength') : -1,
                    minimumResultsForSearch: $(this).data('search') ? 1 : -1,
                    dropdownCssClass: $(this).data('style') ? $(this).data('style') : '',
                    containerCssClass: $(this).data('container-class') ? $(this).data('container-class') : ''
                });
            });
        },200);
    }
    if ($('.select-picker').length && $.fn.selectpicker) {
        $('.select-picker').selectpicker({
            selectAllText: 'Select All',
            deselectAllText: 'Deselect All',
            iconBase: '',
            tickIcon: ''
        });
    }
}

// DATEPICKER
function handleDatepicker(){
    if ($.fn.datepicker) {
        $('.datepicker').each(function() {
            $(this).datepicker({
                startView: $(this).data('view') ? $(this).data('view') : 0, // 0: month view , 1: year view, 2: multiple year view
                language: $(this).data('lang') ? $(this).data('lang') : 'en',
                forceParse: $(this).data('parse') ? $(this).data('parse') : false,
                daysOfWeekDisabled: $(this).data('day-disabled') ? $(this).data('day-disabled') : '', // Disable 1 or various day. For monday and thursday: 1,3
                calendarWeeks: $(this).data('calendar-week') ? $(this).data('calendar-week') : false,// Display week number 
                autoclose: $(this).data('autoclose') ? $(this).data('autoclose') : false,
                todayHighlight: $(this).data('today-highlight') ? $(this).data('today-highlight') : true,// Highlight today date
                toggleActive: $(this).data('toggle-active') ? $(this).data('toggle-active') : true,// Close other when open
                multidate: $(this).data('multidate') ? $(this).data('multidate') : false, // Allow to select various days
                orientation: $(this).data('orientation') ? $(this).data('orientation') : 'top',// Allow to select various days,
                rtl: $('html').hasClass('rtl') ? true : false
            }).on('changeDate', function(e) {
                var currentDate = $(this).datepicker('getFormattedDate');
                var currentDay = String(currentDate).split("/")[1];
                var currentMonth = String(currentDate).split("/")[0];
                var currentYear = String(currentDate).split("/")[2];
                console.log("day:" + currentDay + ", month:" + currentMonth + ", year:" + currentYear);
            });
        });
    }
}

// COUNT UP
function handleCountUp(){
    $('.countup').on('appear', function(event, $allAppearedElements) {
        var element = $(this);
        var animationDelay = element.data('animation-delay');
        if (!element.hasClass('is-animated')) {
            if (animationDelay) {
                setTimeout(function() {
                    element.countTo({
                        from: element.data('from') ? element.data('from') : 0,
                        to: element.data('to') ? element.data('to') : 100,
                        speed: element.data('speed') ? element.data('speed') : 1000,
                        refreshInterval: element.data('refresh') ? element.data('refresh') : 50
                    });
                }, animationDelay);
            } else {
                element.countTo({
                    from: element.data('from') ? element.data('from') : 0,
                    to: element.data('to') ? element.data('to') : 100,
                    speed: element.data('speed') ? element.data('speed') : 1000,
                    refreshInterval: element.data('refresh') ? element.data('refresh') : 50
                });
            }
        }
        element.addClass('is-animated');
    });
}

// COUNT DOWN
function handleCountDown(){
    $('.countdown').each(function() {
        var countDownDate = $(this).data('date') ? $(this).data('date') : '2020/10/10';
        $(this).countdown(countDownDate).on('update.countdown', function(event) {
            if ($(this).hasClass('countdown-inline')) {
                var $this = $(this).html(event.strftime('' + '<span>%-w</span> week%!w ' + '<span>%-d</span> day%!d ' + '<span>%H</span> hr ' + '<span>%M</span> min ' + '<span>%S</span> sec'));
            } else {
                var $this = $(this).html(event.strftime('' + '<div class="countdown-block"><span>%-w</span> week%!w </div>' + '<div class="countdown-block"><span>%-d</span> day%!d </div>' + '<div class="countdown-block"><span>%H</span> hours </div>' + '<div class="countdown-block"><span>%M</span> min </div>' + '<div class="countdown-block"><span>%S</span> sec</div>'));
            }
        });
    });
}

// FORM GROUPED LAYOUT
function formGroup(){
    $('.form-group.form-grouped').click(function() {
        $(this).find('input, select').focus();
        if($(this).hasClass('form-grouped-select-2')) $(this).find("select").data('select2').open();
        $(this).addClass('focused');
    });
    $('body').on('focus', '.form-group.form-grouped :input', function() {
        $(this).parents('.form-group').addClass('focused');
    });
    $('body').on('blur', '.form-grouped', function(e) {
        if(!$(e.target).is('.select2-hidden-accessible')){
            $(this).removeClass('focused');
        }
    });

    setTimeout(function() {
        $('.form-grouped.form-grouped-select-2').each(function() {
            $(this).width('');
            $(this).width($(this).width());
        });
        $('.form-grouped .select2-container').each(function() {
            $(this).width('');
            $(this).width($(this).parent().width() + 4);
        });
    }, 1000);
}

// TAGS INPUT 
function tagsInput(){
    if ($.fn.tagsinput) {
        $('.select-tags').each(function() {
            $(this).tagsinput({
                tagClass: 'label label-primary'
            });
        });
    }
    if($('.bootstrap-tagsinput').length){
        $('.bootstrap-tagsinput').click(function() {
            $(this).find('input').focus();
        });
        $('body').on('focus', '.bootstrap-tagsinput :input', function() {
            $('.form-group.form-grouped').removeClass('focused');
            $(this).parents('.form-group').addClass('focused');
        });
        $('body').on('blur', '.bootstrap-tagsinput :input', function() {
            $(this).parents('.form-group').removeClass('focused');
        });
    }
}

// TICKERS ANIMATION
function tickersAnimation(){
    if ($.fn.easyTicker) {
        $('.news-list').each(function() {
            $(this).easyTicker({
                direction: 'up',
                easing: 'swing',
                speed: 'slow',
                interval: 4000,
                height: 'auto',
                visible: 1,
                mousePause: 1,
                controls: {
                    up: '.btnUp',
                    down: '.btnDown',
                    toggle: '.btnToggle'
                }
            });
        });
    }
}

// ACCORDION
function handleAccordion(){
    if($('.panel-accordion').length){
        $('.panel-accordion').on('show.bs.collapse', function(e) {
            if ($(e.target).find('.progress').length) {
                progressBar();
            }
            if ($(e.target).find('.countup').length) {
                $(e.target).find('.countup').each(function() {
                    $(this).countTo({
                        from: $(this).data('from') ? $(this).data('from') : 0,
                        to: $(this).data('to') ? $(this).data('to') : 100,
                        speed: $(this).data('speed') ? $(this).data('speed') : 1000,
                        refreshInterval: $(this).data('refresh') ? $(this).data('refresh') : 50
                    });
                });
            }
        });
        $('.panel-accordion').on('shown.bs.collapse', function(e) {
            if ($(e.target).find('.map').length) {
                googleMap();
            }
        });
    }
}

// HALF SECTION 
function halfSection() {
    $('.half-section .text-element-wrapper').css('min-height', '');
    $('.half-section .img-cover').css('height', '');
    if ($(window).width() > 992) {
        $('.half-section').removeClass('half-section-fullwidth');
        $('.half-section').each(function() {
            $(this).find('.text-element-wrapper').css('min-height', $(this).height() - 40);
            if ($(this).hasClass('half-section-first') || $(this).hasClass('half-section-last')) {
                $(this).find('.text-element-wrapper').css('min-height', $(this).height() - 20);
            }
            if ($(this).hasClass('half-section-alone')) {
                $(this).find('.text-element-wrapper').css('min-height', $(this).height());
            }
        });
    } else {
        $('.half-section').addClass('half-section-fullwidth');
        $('.half-section').find('.img-cover').height($('.img-cover').width());
    }
}

function adjustHeight(){
    $('.same-height').each(function() {
        var sectionHeight = $(this).height();
        $(this).next().height(sectionHeight);
    });  
}

// SHOP IMAGE ZOOM EFFECT
function imageZoom() {
    if($('.easyzoom').length){
        var $easyzoom = $('.easyzoom').easyZoom();
    }
    
}

// SOCIAL ICONS HOVER EFFECT 
function iconHover() {
    $('.icon-hover a').each(function() {
        var icon = $(this).html();
        $(this).append(icon);
    });
}

// QUANTITY INPUT
function handleQuantity() {
    $('body').on('click', '.quantity .plus', function() {
        var currentVal = parseInt($(this).parent().find('input').val());
        $(this).parent().find('input').val(currentVal + 1);
    });
    $('body').on('click', '.quantity .minus', function() {
        var currentVal = parseInt($(this).parent().find('input').val());
        if (currentVal > 1) {
            $(this).parent().find('input').val(currentVal - 1);
        }
    });
}

// STICKY ELEMENT
function handleSticky() {
    if ($('.sticky').length) {
        var stickyElement = $('.sticky');
        var topScroll = $(document).scrollTop();
        var stickyHeight = stickyElement.height();
        var secondColumnHeight = stickyElement.prev().height();
        if (secondColumnHeight === null) {
            secondColumnHeight = stickyElement.next().height();
        }
        var differenceHeight = secondColumnHeight - stickyHeight;
        if (topScroll < differenceHeight) {
            stickyElement.css('margin-top', topScroll);
        }
    }
}

// MODAL WINDOWS 
function handleModals() {
    if ($.fn.slickModals) {
        $('.slickModal').each(function() {
            var $modalSlick = $(this),
                opts = null,
                pluginOptions = $modalSlick.data('plugin-options'),
                defaults = {
                    'popupType': '',
                    'delayTime': 2500,
                    'exitTopDistance': 40,
                    'scrollTopDistance': 400,
                    'setCookie': false,
                    'cookieDays': 0,
                    'cookieTriggerClass': 'setCookie-1',
                    'cookieName': 'slickModal-1',
                    'overlayBg': true,
                    'overlayBgColor': 'rgba(0,0,0,0.9)',
                    'overlayTransition': 'ease',
                    'overlayTransitionSpeed': '0.4',
                    'bgEffect': null,
                    'blurBgRadius': '2px',
                    'scaleBgValue': '0.9',
                    'windowWidth': '500px',
                    'windowHeight': '500px',
                    'windowLocation': 'center',
                    'windowTransition': 'ease',
                    'windowTransitionSpeed': '0.4',
                    'windowTransitionEffect': 'slideLeft',
                    'windowShadowOffsetX': '0',
                    'windowShadowOffsetY': '0',
                    'windowShadowBlurRadius': '0',
                    'windowShadowSpreadRadius': '0',
                    'windowShadowColor': 'rgba(0,0,0,0)',
                    'windowBackground': 'rgba(255,255,255,0)',
                    'windowRadius': '0',
                    'windowMargin': 'auto',
                    'windowPadding': '0',
                    'closeButton': 'labeled', 
                    'reopenClass': 'slick-modal'
                };
            opts = $.extend({}, defaults, pluginOptions);
            $modalSlick.slickModals(opts);
        });
    }
}

// IMAGE ZOOM
function handlepopup() {
    if ($.fn.magnificPopup) {
        // Inline popups
        $('.trigger-popup').magnificPopup({
            removalDelay: 500,
            closeBtnInside: true,
            closeOnBgClick: true,
            // Set to false to remove popup on close button only
            closeMarkup: '<span class="mfp-close">x</span>',
            callbacks: {
                beforeOpen: function() {
                    this.st.mainClass = this.st.el.attr('data-effect');
                },
                open: function() {
                    handleSelect();
                }
            },
            midClick: true
        });
        if($('.magnific').parents('.section-portfolio').length == 0 && $('.magnific').parents('.images-gallery').length == 0){
            $('.magnific').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: true,
                closeMarkup: '<span class="mfp-close">x</span>',
                fixedContentPos: true,
                midClick: true,
                removalDelay: 500,
                mainClass: 'mfp-fade',
                tLoading: '',
                image: {
                    verticalFit: true
                },
                zoom: {
                    enabled: false,
                    duration: 300 // don't forget to change the duration also in CSS
                },
                callbacks: {
                    imageLoadComplete: function() {
                        var self = this;
                        setTimeout(function() {
                            self.wrap.addClass('mfp-image-loaded');
                        }, 16);
                    },
                    close: function() {
                        this.wrap.removeClass('mfp-image-loaded');
                    },
                    beforeChange: function() {
                        this.items[0].src = this.items[0].src + '?=' + Math.random();
                    }
                }
            });
        }
        $('.images-gallery, .section-portfolio').magnificPopup({
            type: 'image',
            removalDelay: 300,
            delegate: '.magnific',
            gallery: {
                enabled: true
            },
            mainClass: 'mfp-fade'
        });
        
        $('.popup-video, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            preloader: true,
            removalDelay: 300
        });

        $('.ajax-modal').magnificPopup({
            type: 'ajax',
            overflowY: 'scroll',
            mainClass: 'mfp-fade',
            callbacks: {
                ajaxContentAdded: function() {
                    iconHover();
                    flexslider();
                    handleVideo();
                    handleIsotope();
                }
            }
        });


    }
}

// SCROLL TOP BUTTON
function scrollTop() {
    if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
}

// SIMPLE SLIDER BAR
function simpleSlider() {
    if ($('.simple-slider').length) {
        $('.simple-slider').slider({
            range: false,
            min: 0,
            max: 30,
            value: 3,
            slide: function(event, ui) {
                $('#value').text(ui.value + 'px');
            }
        });
        $('#value').text($('.simple-slider').slider('values', 3) + 'px');
    }
}

// FULL HEIGHT SECTION
function fullHeight() {
    $('.height-full').each(function() {
        $(this).height($(window).height());
    });
}

// PARALLLAX ZOOM OUT EFFECT
function parallaxZoomOut() {
    if($('.parallax-zoom-out').length){
        windowWidth = $(window).width();
        var scrollPos = $(window).scrollTop();
        var backgroundSize = windowWidth * (1.32 - scrollPos / 1500);
        $('.parallax-zoom-out').each(function() {
            if (backgroundSize > windowWidth) {
                $(this).css('background-size', backgroundSize);
            }
        });
    }
}

// VIDEO
function handleVideo() {
    $('.video-js').each(function() {
        var videoWidth = $(this).width();
        var videoHeight = videoWidth * 0.5625;
        var videoId = $(this).attr('id');
        if ($(this).parents('.post').length == 0) {
            $(this).css('height', '');
            $(this).parents('header').css('height', '');
        }else{
            $(this).css('height', videoHeight);
        }
        if ($(this).hasClass('full-video')) {
            $(this).css('height', videoHeight);
            $(this).parents('header').css('height', videoHeight);
        }
        if ($(this).parents('header').length) {
            if ($(this).parents('header').hasClass('section-audio')){
                //$(this).parents('header').css('height', videoHeight); 
            }else{
                $(this).parents('header').css('height', videoHeight); 
            }
                
        }
        if ($(this).data('poster')) {
            $(this).find('.vjs-poster').remove();
            var currentPoster = $(this).data('poster');
            $(this).append('<div class="vjs-poster" tabindex="-1" style="background-image: url(&quot;'+ currentPoster +'&quot;);"></div>'); 
        }
        var myPlayer = videojs(videoId);
        var videoPlaying = false;
        if($(this).parents('header').length == 0){
            $('#' + videoId).click(function() {
                if (videoPlaying) {
                    myPlayer.pause();
                    videoPlaying = false;
                } else {
                    myPlayer.play();
                    videoPlaying = true;
                }
            });
        }  
    });

        
    $('.video-embed').each(function() {
        $(this).fitVids({
            customSelector: "iframe[src^='//www.dailymotion.com'], iframe[src^='http:////www.dailymotion.com']"
        });
        if ($(this).hasClass('full-video')) {
            $(this).height($(window).height());
        }
        if($(this).parent().is('header') || $(this).parent().hasClass('page-coming-soon')){
            var videoId = $(this).find('iframe').attr('id');
            var iframe = $('#'+videoId)[0];
            var player = $f(iframe);
            var status = $('.status');
            $('.loader-wrapper').css('opacity', 1).css('visibility', 'visible').css('z-index', '2000');
            player.addEvent('ready', function() {
                player.addEvent('playProgress', onPlayProgress);
            });
            function onPlayProgress(data, id) {
                $('.loader-wrapper').attr('style', '');
            }
        }  
    });
}

// FOOTER REVEAL
function footerReveal() {
    setTimeout(function() {
        if (body.hasClass('footer-reveal')) {
            var footerHeight = $('#footer').height();
            mainContent.css('margin-bottom', footerHeight);
        }
    }, 1000);
}

// RATING
function rating() {
    $('.rating').each(function() {
        $(this).raty({
            cancel: false,
            // Creates a cancel button to cancel the rating.
            cancelClass: 'raty-cancel',
            // Name of cancel's class.
            cancelHint: 'Cancel this rating!',
            // The cancel's button hint.
            cancelOff: 'cancel-off.png',
            // Icon used on active cancel.
            cancelOn: 'cancel-on.png',
            // Icon used inactive cancel.
            cancelPlace: 'left',
            // Cancel's button position.
            half: true,
            // Enables half star selection.
            halfShow: true,
            // Enables half star display.
            hints: [
                'bad',
                'poor',
                'regular',
                'good',
                'gorgeous'
            ],
            // Hints used on each star.
            noRatedMsg: 'Not rated yet!',
            // Hint for no rated elements when it's readOnly.
            number: 5,
            // Number of stars that will be presented.
            numberMax: 20,
            // Max of star the option number can creates.
            precision: false,
            // Enables the selection of a precision score.
            readOnly: $(this).data('read-only') ? $(this).data('read-only') : false,
            // Turns the rating read-only.
            round: {
                down: 0.25,
                full: 0.6,
                up: 0.76
            },
            // Included values attributes to do the score round math.
            score: $(this).data('value') ? $(this).data('value') : undefined,
            // Initial rating.
            scoreName: 'score',
            // Name of the hidden field that holds the score value.
            single: false,
            // Enables just a single star selection.
            space: true,
            // Puts space between the icons.
            starHalf: 'fa fa-star-half-o',
            // The name of the half star image.
            starOff: 'fa fa-star-o',
            // Name of the star image off.
            starOn: 'fa fa-star',
            // Name of the star image on.
            targetText: '',
            // Default text setted on target.
            targetType: 'hint',
            // Option to choose if target will receive hint o 'score' type.
            starType: 'i',
            click: function() {}
        });
    });
}

// NOTIFICATION
function notification() {
    if ($.fn.toastr) {
        toastr.options = {
            tapToDismiss: true,
            toastClass: 'toast',
            containerId: 'toast-container',
            debug: false,
            fadeIn: 300,
            fadeOut: 600,
            hideDuration: 500,
            iconClass: 'toast-info',
            positionClass: 'toast-top-right',
            timeOut: 4000, // Set timeOut to 0 to make it sticky
            titleClass: 'toast-title',
            messageClass: 'toast-message'
        };
    }
}

// SCROLL TOP BUTTON
function scrollTop() {
    if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
}

// CALENDAR PLUGIN 
function calendar() {
    if ($.fn.fullCalendar && ($('#fitness-calendar').length || $('#yoga-calendar').length)) {
        var fitnessCalendar = $('#fitness-calendar').fullCalendar({
            minTime: '09:00:00',
            maxTime: '18:00:00',
            defaultView: 'agendaWeek',
            allDaySlot: false,
            columnFormat: 'dddd',
            slotDuration: '01:00:00',
            defaultDate: '2015-12-12',
            handleWindowResize: true,
            height: 'auto',
            defaultEventMinutes: 60,
            defaultTimedEventDuration: '01:00:00',
            header: {
                left: '',
                center: '',
                right: ''
            },
            hiddenDays: [0],
            events: [{
                title: 'Yoga Zen',
                start: '2015-12-07 09:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Crosspin',
                start: '2015-12-07 10:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Bike Spin',
                start: '2015-12-07 14:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-07 15:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Fight Cardio',
                start: '2015-12-07 16:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'WeighLifting',
                start: '2015-12-08 09:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Crosspin',
                start: '2015-12-08 10:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-08 11:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'WeighLifting',
                start: '2015-12-08 12:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-08 15:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Fight Cardio',
                start: '2015-12-08 17:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Crosspin',
                start: '2015-12-09 10:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Bike Spin',
                start: '2015-12-09 11:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-09 14:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-09 15:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Fight Cardio',
                start: '2015-12-09 17:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Bike Spin',
                start: '2015-12-10 09:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Fight Cardio',
                start: '2015-12-10 10:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-10 11:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Crosspin',
                start: '2015-12-10 14:00:00',
                className: 'orange accent-4'
            }, {
                title: 'WeighLifting',
                start: '2015-12-10 16:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Bike Spin',
                start: '2015-12-10 17:00:00',
                className: 'light-green darken-1'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-11 09:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Fight Cardio',
                start: '2015-12-11 10:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-11 11:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-11 14:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Bike Spin',
                start: '2015-12-11 16:00:00',
                className: 'light-green darken-1'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-12 10:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Bike Spin',
                start: '2015-12-12 11:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Crosspin',
                start: '2015-12-12 12:00:00',
                className: 'orange accent-4'
            }, {
                title: 'WeighLifting',
                start: '2015-12-12 15:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Zumba Dance',
                start: '2015-12-12 16:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-12 17:00:00',
                className: 'blue lighten-2'
            }],
            editable: false,
            droppable: false
        });
        var yogaCalendar = $('#yoga-calendar').fullCalendar({
            minTime: '09:00:00',
            maxTime: '18:00:00',
            defaultView: 'agendaWeek',
            allDaySlot: false,
            columnFormat: 'dddd',
            slotDuration: '01:00:00',
            defaultDate: '2015-12-12',
            handleWindowResize: true,
            height: 'auto',
            defaultEventMinutes: 60,
            defaultTimedEventDuration: '01:00:00',
            header: {
                left: '',
                center: '',
                right: ''
            },
            hiddenDays: [0],
            events: [{
                title: 'Yoga Zen',
                start: '2015-12-07 09:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Prenatal Exercices',
                start: '2015-12-07 10:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Vitality',
                start: '2015-12-07 14:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Yummy',
                start: '2015-12-07 15:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Stretches',
                start: '2015-12-07 16:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Rise & Shine',
                start: '2015-12-08 09:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Prenatal Exercices',
                start: '2015-12-08 10:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Yummy',
                start: '2015-12-08 11:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Rise & Shine',
                start: '2015-12-08 12:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-08 15:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Stretches',
                start: '2015-12-08 17:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Prenatal Exercices',
                start: '2015-12-09 10:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Vitality',
                start: '2015-12-09 11:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Yummy',
                start: '2015-12-09 14:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-09 15:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Stretches',
                start: '2015-12-09 17:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Vitality',
                start: '2015-12-10 09:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Stretches',
                start: '2015-12-10 10:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Yummy',
                start: '2015-12-10 11:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Prenatal Exercices',
                start: '2015-12-10 14:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Rise & Shine',
                start: '2015-12-10 16:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Vitality',
                start: '2015-12-10 17:00:00',
                className: 'light-green darken-1'
            }, {
                title: 'Yummy',
                start: '2015-12-11 09:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Stretches',
                start: '2015-12-11 10:00:00',
                className: 'indigo lighten-2'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-11 11:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Yummy',
                start: '2015-12-11 14:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Vitality',
                start: '2015-12-11 16:00:00',
                className: 'light-green darken-1'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-12 10:00:00',
                className: 'blue lighten-2'
            }, {
                title: 'Vitality',
                start: '2015-12-12 11:00:00',
                className: 'grey darken-4'
            }, {
                title: 'Prenatal Exercices',
                start: '2015-12-12 12:00:00',
                className: 'orange accent-4'
            }, {
                title: 'Rise & Shine',
                start: '2015-12-12 15:00:00',
                className: 'red lighten-1'
            }, {
                title: 'Yummy',
                start: '2015-12-12 16:00:00',
                className: 'teal lighten-2'
            }, {
                title: 'Yoga Zen',
                start: '2015-12-12 17:00:00',
                className: 'blue lighten-2'
            }],
            editable: false,
            droppable: false
        });
    }
}

// ADJUST IMAGE HEIGHT
function imgCoverSquare() {
    $('.img-cover-square').each(function() {
        $(this).parent().height('');
        $(this).parent().height($(this).width());
    });
    $('.section-square').each(function() {
        $(this).height('');
        $(this).height($(this).width());
    });
}

// DEMO FUNCTIONS ==> CAN BE REMOVED IN LIVE WEBSITE
function demo() {
    $('.shortcode-question').click(function() {
        $('.shortcode-answer').slideToggle();
    });
}

function screenshotPreview() {
    xOffset = 160;
    yOffset = -60;
    $('a.screenshot').hover(function(e) {
        var posLeft = $(this).offset().left;
        var posTop = $(this).offset().top;
        var builderClass = $(this).hasClass('screenshot-builder') ? 'screenshot-builder' : '';
        var title = $(this).attr('title') ? '<span class="screenshot-title">' + $(this).attr('title') + '</span>' : '';
        if (builderClass) {
            $(this).parent().append('<p id=\'screenshot\' class=' + builderClass + '><img src=\'' + $(this).attr('data-rel') + '\' alt=\'url preview\' />' + title + '</p>');
        } else {
            $('body').append('<p id=\'screenshot\'><img src=\'' + $(this).attr('data-rel') + '\' alt=\'url preview\' />' + title + '</p>');
        }
        $('#screenshot').css('top', posTop + yOffset + 'px').css('left', posLeft + xOffset).fadeIn('fast');
    }, function() {
        $('#screenshot').remove();
    });
}