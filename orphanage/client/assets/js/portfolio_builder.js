// MAIN VARIABLES INITIALIZATION 
var sectionPortfolio = $('.section-portfolio');
var portfolioList = $('.section-portfolio .masonry');

(function () {
  
  'use strict';
  portfolioBuilder();
}());

// MANAGE PORTFOLIO BUILDER
function portfolioBuilder() {
  $('.portfolio-builder .switcher').on('click', ':radio', function () {
    var layout = $(this).val();
    $('.portfolio-builder .switcher :radio').removeClass('is-checked');
    $(this).addClass('is-checked');
    sectionPortfolio.animate({ opacity: 0 }, 350, function () {
      if (layout === 'wide') {
        sectionPortfolio.children().removeClass('container').addClass('container-fluid');
      }
      if (layout === 'boxed') {
        sectionPortfolio.children().removeClass('container-fluid').addClass('container');
      }
      if (layout === 'with-space') {
        portfolioList.removeClass('no-space');
      }
      if (layout === 'no-space') {
        portfolioList.addClass('no-space');
      }
      if (layout === 'with-caption') {
        addCaption();
      }
      if (layout === 'no-caption') {
        removeCaption();
      }
      setTimeout(function () {
        $('body').trigger('resize');
      }, 400);
      setTimeout(function () {
        sectionPortfolio.animate({ opacity: 1 }, 350);
        handlepopup();
      }, 450);
    });
  });
}
// ADD CAPTION TO ITEM
function addCaption() {
  portfolioList.addClass('with-caption');
  portfolioList.find('figure').removeClass('he-1').addClass('he-2 caption-visible caption-center');
  portfolioList.find('figure').each(function () {
    var imageSrc = $(this).find('img').attr('src');
    var hoverIcons = '<div class="hover-icons">\n' + '  <div class="hover-icons-wrapper">\n' + '    <a href="' + imageSrc + '" class="magnific">\n' + '      <i class="nc-icon-outline ui-1_zoom"></i>\n' + '    </a>\n' + '    <a href="portfolio-single-extended">\n' + '      <i class="nc-icon-outline ui-2_menu-dots"></i>\n' + '    </a>\n' + '  </div>\n' + '</div>\n';
    $(this).find('img').after(hoverIcons);
    if ($(this).attr('data-link')) {
      var itemLink = $(this).attr('data-link');
      $(this).find('h4').wrapInner('<a href="' + itemLink + '"></a>');
      $(this).removeAttr('data-link');
    }
  });
}
// REMOVE CAPTION TO ITEM
function removeCaption() {
  portfolioList.removeClass('with-caption');
  portfolioList.find('figure').addClass('he-1').removeClass('he-2 caption-visible caption-center');
  portfolioList.find('figure > a').addClass('magnific').removeClass('disabled');
  portfolioList.find('.hover-icons').remove();
  portfolioList.find('figure').each(function () {
    var imageSrc = $(this).find('img').attr('src');
    var itemLink = $(this).find('h4 a').attr('href');
    $(this).attr('data-link', itemLink);
  });
}