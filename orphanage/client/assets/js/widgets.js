// MAIN VARIABLES INITIALIZATION
var dribbbleToken = '74808afcb3f22b88a936c8791eb12050f53df2a2cd74e97b79f6c9c8d07cb5c2';

(function () {

  'use strict';
  widgetTwitter();
  widgetPinterest();
  widgetFlickr();
  widgetDribbble();
  widgetGoogle();
}());

// TWITTER WIDGET 
function widgetTwitter() {
  $('.widget-twitter').each(function () {
    $.ajax({
      dataType: 'html',
      url: 'include/twitter/twitterBot.php',
      success: function (returnHTML) {
        $('.tweets-list ul').html(returnHTML);
        $('.tweets-list').easyTicker({
          direction: 'down',
          easing: 'swing',
          speed: 'slow',
          interval: 6000,
          height: 'auto',
          visible: 2,
          mousePause: 1,
          controls: {
            up: '.btnUp',
            down: '.btnDown',
            toggle: '.btnToggle'
          }
        });
        footerReveal();
      },
      error: function (data) {
        console.log(data);
      }
    });
  });
}

// PINTEREST WIDGET
function widgetPinterest() {
  $('.widget-pinterest').each(function () {
    var element = $(this);
  });
}

// FLICKR WIDGET: http://www.newmediacampaigns.com/blog/a-jquery-flickr-feed-plugin
function widgetFlickr() {
  $('.widget-flickr:not(.flickr-demo)').each(function () {
    var element = $(this);
    $(this).find('ul').jflickrfeed({
      limit: element.data('count') ? element.data('count') : 12,
      qstrings: { id: element.data('user') ? element.data('user') : '44802888@N04' },
      itemTemplate: '<li><img width="100" height="100" alt="{{title}}" src="{{image_s}}" /></li>'
    });
  });
}

// DRIBBBLE WIDGET: https://github.com/tylergaw/jribbble
function widgetDribbble() {
  $('.widget-dribbble').each(function () {
    var element = $(this);
    $.jribbble.setToken(dribbbleToken);
    $.jribbble.shots('teams').then(function (shots) {
      var html = [];
      shots.forEach(function (shot) {
        // See the Dribbble docs for all available shot properties.
        html.push('<li class="shots--shot">');
        html.push('<a href="' + shot.html_url + '">');
        html.push('<img src="' + shot.images.normal + '">');
        html.push('</a></li>');
      });
      element.find('.dribbble-list').html(html.join(''));
    });
  });
}

// GOOGLE PLUS WIDGET
function widgetGoogle() {
  $('.widget-google-plus').each(function () {
    document.getElementsByClassName('g-page')[0].setAttribute('data-width', $('.google-plus-wrapper').width());
    var po = document.createElement('script');
    po.type = 'text/javascript';
    po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
  });
}