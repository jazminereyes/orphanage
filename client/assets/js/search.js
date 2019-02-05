(function () {
  
  'use strict';
  handlesearch();
}());

function handlesearch() {
  var wrapper = $('#wrapper'), toggleSearch = $('#toggle-search'), search = $('.search-overlay'), searchClose = $('.search-overlay-close'), searchStyle = $('#toggle-search').data('search-style');

  $("[data-toggle-search]").click(function(e) {
    e.preventDefault();
    var searchLayout = $(this).data('toggle-search');
    /* SEARCH ON TOP */
    if (searchLayout === 'top') {
      setTimeout(function () {
        $('#search.top-search, .search.top-search, body').toggleClass('search-open');
      }, 100);
      setTimeout(function () {
        $('.top-search input').focus();
      }, 200);
      $('body').on('click', function(e) {
        e.preventDefault();
        if ($(e.target).parents('.search-tool').length || $(e.target).parents('.toggle-search').length || $(e.target).parents('#search').length || $(e.target).parents('.search').length) {
          return;
        }
        if (body.hasClass('search-open') === true) {
          $('#search.top-search, .search.top-search, body').removeClass('search-open');
        }
      });
      $('.search-close a').on('click', function(e) {
        e.preventDefault();
        $('#search.top-search, .search.top-search, body').removeClass('search-open');
      });
      $('#search.top-search input').keypress(function(e) {
        if (e.which === 13) {
          $('#search.top-search, .search.top-search').submit();
          return false;
        }
      });
    }
    /* SEARCH NAVIGATION REPLACE */
    if (searchLayout === 'nav') {
      setTimeout(function () {
        $('.nav-search').toggleClass('search-open');
        $('body').toggleClass('search-nav-open');
      }, 100);
      setTimeout(function () {
        $('.nav-search input').focus();
      }, 200);
      $('body').on('click', function(e) {
        e.preventDefault();
        if ($(e.target).parents('.search-tool').length || $(e.target).parents('.toggle-search').length || $(e.target).parents('#search').length || $(e.target).parents('.search').length) {
          return;
        }
        $('#search.nav-search, .search.nav-search').removeClass('search-open');
        $('body').removeClass('search-nav-open');
      });
      $('.search-close a').on('click', function(e) {
        e.preventDefault();
        $('#search.nav-search, .search.nav-search').removeClass('search-open');
        $('body').removeClass('search-nav-open');
      });
      $('#search.nav-search input, .search.nav-search input').keypress(function (e) {
        if (e.which === 13) {
          $('#search.top-search, .search.top-search').submit();
          return false;
        }
      });
    }
    /* SEARCH FULLSCREEN */
    if (searchLayout === 'fullscreen') {

      search.addClass('open');
      wrapper.addClass('search-overlay-open');

      setTimeout(function () {
        $('.search-overlay input').focus();
      }, 200);
      $('.search-overlay-close').click(function(e) {
        e.preventDefault();
        search.removeClass('open');
        wrapper.removeClass('search-overlay-open');
      });
      document.addEventListener('keydown', function(ev) {
        var keyCode = ev.keyCode || ev.which;
        if (keyCode === 27 && search.hasClass('open')) {
          search.removeClass('open');
          wrapper.removeClass('search-overlay-open');
        }
      });
      $('body').on('click', function(e) {
        e.preventDefault();
    
        if ($(e.target).parents('.search-tool').length || $(e.target).parents('form').length || $(e.target).parents('.btn').length || $(e.target).is('a')) {
          return;
        }
        if (search.hasClass('open') === true) {
            search.removeClass('open');
            wrapper.removeClass('search-overlay-open');
        }
      });
    }
  });
}