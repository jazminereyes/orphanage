(function () {
  'use strict';
  $('.menu-restaurant li').each(function () {
    var menuTitleWidth = $(this).find('.menu-title').width();
    var menuPriceWidth = $(this).find('.menu-price').width();
    $(this).find('.menu-line').css('left', menuTitleWidth).css('right', menuPriceWidth);
  });
  $('.menu-restaurant li a').click(function (e) {
    e.preventDefault();
    var menuImg = $(this).data('meal-img');
    var imgCover = $(this).parents('section').find('.img-cover');
    imgCover.animate({ opacity: 0 }, 200, function () {
      imgCover.css('background-image', 'url(' + menuImg + ')');
      imgCover.animate({ opacity: 1 }, 200);
    });
  });
}());