if ($('#shop').length > 0 || $('body').data('page-type') == 'ecommerce') {
    $(window).resize(function() {
        'use strict';
        extendedProduct();
    });

    (function() {
        'use strict';

        $('.colors-filter').on('mouseover', 'li', function() {
            $('.colors-filter li').removeClass('grayscale');
            $(this).siblings().addClass('grayscale');
        });
        $('.colors-filter').on('mouseout', 'li', function() {
            $('.colors-filter li').removeClass('grayscale');
        });
        priceRange();
        addToCart();
        removeFromCart();
        updateAmountCart();
        shipping();
        quickView();
        productVariable();
        extendedProduct();
        snowEffect();
        wishlist();

        var productItems = $('.product');
        productItems.each(function() {
            var container = $(this),
                sliderDots = createSliderDots(container);
            updatePrice(container, 0);
            // update slider when user clicks one of the dots
            sliderDots.on('click', function(e) {
                e.preventDefault();
                var selectedDot = $(this);
                if (!selectedDot.hasClass('selected')) {
                    var selectedPosition = selectedDot.index(),
                        activePosition = container.find('.product-wrapper .selected').index();
                    if (activePosition < selectedPosition) {
                        nextSlide(container, sliderDots, selectedPosition);
                    } else {
                        prevSlide(container, sliderDots, selectedPosition);
                    }
                    updatePrice(container, selectedPosition);
                }
            });
            // update slider on swipeleft
            container.find('.product-wrapper').on('swipeleft', function() {
                var wrapper = $(this);
                if (!wrapper.find('.selected').is(':last-child')) {
                    var selectedPosition = container.find('.product-wrapper .selected').index() + 1;
                    nextSlide(container, sliderDots);
                    updatePrice(container, selectedPosition);
                }
            });
            // update slider on swiperight
            container.find('.product-wrapper').on('swiperight', function() {
                var wrapper = $(this);
                if (!wrapper.find('.selected').is(':first-child')) {
                    var selectedPosition = container.find('.product-wrapper .selected').index() - 1;
                    prevSlide(container, sliderDots);
                    updatePrice(container, selectedPosition);
                }
            });
            // preview image hover effect - desktop only
            container.on('mouseover', '.move-right, .move-left', function(event) {
                hoverItem($(this), true);
            });
            container.on('mouseleave', '.move-right, .move-left', function(event) {
                hoverItem($(this), false);
            });
            // update slider when user clicks on the preview images
            container.on('click', '.move-right, .move-left', function(event) {
                event.preventDefault();
                if ($(this).hasClass('move-right')) {
                    var selectedPosition = container.find('.product-wrapper .selected').index() + 1;
                    nextSlide(container, sliderDots);
                } else {
                    var selectedPosition = container.find('.product-wrapper .selected').index() - 1;
                    prevSlide(container, sliderDots);
                }
                updatePrice(container, selectedPosition);
            });
        });

        function createSliderDots(container) {
            var dotsWrapper = $('<ol class="dots"></ol>').insertAfter(container.children('.product-img'));
            container.find('.product-wrapper li').each(function(index) {
                var dotWrapper = index === 0 ? $('<li class="selected"></li>') : $('<li></li>'),
                    dot = $('<a href="#"></a>').appendTo(dotWrapper);
                dotWrapper.appendTo(dotsWrapper);
                dot.text(index + 1);
            });
            return dotsWrapper.children('li');
        }

        function hoverItem(item, bool) {
            item.hasClass('move-right') ? item.toggleClass('hover', bool).siblings('.selected, .move-left').toggleClass('focus-on-right', bool) : item.toggleClass('hover', bool).siblings('.selected, .move-right').toggleClass('focus-on-left', bool);
        }

        function nextSlide(container, dots, n) {
            var visibleSlide = container.find('.product-wrapper .selected'),
                navigationDot = container.find('.dots .selected');
            if (typeof n === 'undefined') {
                n = visibleSlide.index() + 1;
            }
            visibleSlide.removeClass('selected');
            container.find('.product-wrapper li').eq(n).addClass('selected').removeClass('move-right hover').prevAll().removeClass('move-right move-left focus-on-right').addClass('hide-left').end().prev().removeClass('hide-left').addClass('move-left').end().next().addClass('move-right');
            navigationDot.removeClass('selected');
            dots.eq(n).addClass('selected');
        }

        function prevSlide(container, dots, n) {
            var visibleSlide = container.find('.product-wrapper .selected'),
                navigationDot = container.find('.dots .selected');
            if (typeof n === 'undefined') {
                n = visibleSlide.index() - 1;
            }
            visibleSlide.removeClass('selected focus-on-left');
            container.find('.product-wrapper li').eq(n).addClass('selected').removeClass('move-left hide-left hover').nextAll().removeClass('hide-left move-right move-left focus-on-left').end().next().addClass('move-right').end().prev().removeClass('hide-left').addClass('move-left');
            navigationDot.removeClass('selected');
            dots.eq(n).addClass('selected');
        }

        function updatePrice(container, n) {
            var priceTag = container.find('.product-price'),
                selectedItem = container.find('.product-wrapper li').eq(n);
            if (selectedItem.data('sale')) {
                // if item is on sale - cross old price and add new one
                priceTag.addClass('on-sale');
                var newPriceTag = priceTag.next('.product-new-price').length > 0 ? priceTag.next('.product-new-price') : $('<p class="product-new-price"></p>').insertAfter(priceTag);
                newPriceTag.text(selectedItem.data('price'));
                setTimeout(function() {
                    newPriceTag.addClass('is-visible');
                }, 100);
            } else {
                // if item is not on sale - remove cross on old price and sale price
                priceTag.removeClass('on-sale').next('.product-new-price').removeClass('is-visible').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                    priceTag.next('.product-new-price').remove();
                });
            }
        }

        function quickView() {
            $('.product-quickview a').click(function(e) {
                e.preventDefault();
            });
            if ($.fn.magnificPopup) {
                $('.product-quickview a').magnificPopup({
                    type: 'ajax',
                    removalDelay: 500,
                    closeBtnInside: true,
                    closeOnBgClick: false,
                    closeMarkup: '<span class="mfp-close">x</span>',
                    callbacks: {
                        beforeOpen: function() {
                            this.st.mainClass = 'mfp-move-horizontal';
                        },
                        ajaxContentAdded: function() {
                            this.content.find('.icon-hover a').each(function() {
                                var icon = $(this).html();
                                $(this).append(icon);
                            });
                            flexslider();
                        }
                    }
                });
            }
        }

        function priceRange() {
            if ($('.price-slider').length) {
                $('.price-slider').slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [
                        75,
                        300
                    ],
                    slide: function(event, ui) {
                        $('#amount').text('$' + ui.values[0] + ' - $' + ui.values[1]);
                    }
                });
                $('#amount').text('$' + $('.price-slider').slider('values', 0) + ' - $' + $('.price-slider').slider('values', 1));
            }
        }

        if ($.fn.flexslider) {
            $('#product-slider-thumbnails').flexslider({
                animation: 'slide',
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemMargin: 10,
                itemWidth: 132,
                'prevText': '',
                'nextText': '',
                asNavFor: '#product-slider'
            });
            $('#product-slider').flexslider({
                animation: 'fade',
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: false,
                'prevText': '',
                'nextText': ''
            });
        }
        $('#ship-different-address input').click(function() {
            $('#different-address-info').slideToggle(300).toggleClass('ship-visible');
            handleSelect();
        });
        $('#toggle-coupon a').click(function(e) {
            e.preventDefault();
            $('.coupon-wrapper form').slideToggle(300).toggleClass('coupon-visible');
        });
        $('#toggle-login a').click(function(e) {
            e.preventDefault();
            $('.login-wrapper form').slideToggle(300).toggleClass('login-visible');
        });
        $('.go-reviews').click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $('.product-info').offset().top
            }, 1000);
        });
        // categoriesIsotope();
        setTimeout(function() {}, 200);
    }());


    /* Add / Remove from Wishlist */
    function wishlist() {
        $('.product-wishlist').click(function(e) {
            e.preventDefault();
            if ($(this).find('i').hasClass('fa-heart-o')) {
                var numWishlist = parseInt($('#main-navigation .wishlist_items_number').text());
                $('.wishlist_items_number').text('').text(numWishlist + 1);
                if (!$(this).parents('.product-single').length) {
                    $(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
                    $(this).find('i').attr('title', '<p>Remove from Wishlist</p>').tooltip('dispose').tooltip('show');
                }
                if ($(this).parents('.product-single').length) {
                    $(this).fadeOut(300, function() {
                        $(this).html('<i class="fa fa-heart"></i> Remove from Wishlist').fadeIn(300);
                    });
                }
            } else {
                var numWishlist = parseInt($('#main-navigation .wishlist_items_number').text());
                if (numWishlist > 0) {
                    $('.wishlist_items_number').text('').text(numWishlist - 1);
                }
                if (!$(this).parents('.product-single').length) {
                    $(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
                    $(this).find('i').attr('title', '<p>Add to Wishlist</p>').tooltip('dispose').tooltip('show');
                }
                if ($(this).parents('.product-single').length) {
                    $(this).fadeOut(300, function() {
                        $(this).html('<i class="fa fa-heart-o"></i> Add from Wishlist').fadeIn(300);
                    });
                }
            }
        });
    }

    /* Add to Cart */
    function addToCart() {
        $('.product, .product-single, .wishlist').on('click', '.add-to-cart, .view-cart', function(e) {
            var numCart = 0;
            if ($(this).hasClass('view-cart')) {
                window.location.href = 'shopping-cart';
            }
            e.preventDefault();
            $(this).fadeOut(300, function() {
                if ($('.products-list').length) {
                    $(this).html('View Cart').removeClass('add-to-cart').addClass('view-cart').attr('href', 'cart').fadeIn(300);
                    $(this).find('i').attr('title', '<p>Add to Wishlist</p>').tooltip('dispose').tooltip('show');
                } else {
                    if ($(this).parents('.product-single').length) {
                        $(this).html('<i class="nc-icon-outline shopping_bag-16"></i><span>View Cart</span>').removeClass('add-to-cart').removeClass('btn-primary').addClass('view-cart').addClass('btn-dark').attr('href', 'shopping-cart').fadeIn(300);
                    } else if ($(this).parents('.product-info').length) {
                        $(this).html('<span>View Cart</span>').removeClass('add-to-cart').addClass('view-cart').attr('href', 'shopping-cart').fadeIn(300);
                        $(this).attr('data-original-title', '<p>View Cart</p>').tooltip('dispose').tooltip('show');
                    } else {
                        $(this).html('<i class="nc-icon-outline shopping_bag-16"></i><span>View Cart</span>').removeClass('add-to-cart').removeClass('btn-primary').addClass('view-cart btn-dark').attr('href', 'shopping-cart').fadeIn(300);
                    }
                }
                numCart = parseInt($('#main-navigation .cart_items_number').text()) + 1;
                $('.cart_items_number').text(numCart);

            });
        });
        $('body').on('click', '.add-to-cart', function() {
            if($('.magnific').length){
                var magnificPopup = $.magnificPopup.instance;
                magnificPopup.close();
            }   
            toastr.options = {
                positionClass: 'toast-bottom-right'
            };
            if ($('.wishlist').length) {
                var itemName = $(this).parents('.cart-item').find('.product-name').text();
                var itemImg = $(this).parents('.cart-item').find('img').attr('src');
                var itemPrice = $(this).parents('.cart-item').find('.product-price').text();
                toastr.info('<div class="notif-cart"><div class="img-wrapper"><img src="' + itemImg + '" alt="jacket 1" draggable="false"></div><div class="text-wrapper">' + itemName + ' added to cart<div class="notif-price">' + itemPrice + '</div></div></div>');
            } else if ($(this).parents('.product-single').length) {
                var itemName = $(this).parents('.product-single').find('.product-name').text();
                var itemImg = $(this).parents('.product-single').find('img').attr('src');
                var itemPrice = $(this).parents('.product-single').find('.product-price').text();
                toastr.info('<div class="notif-cart"><div class="img-wrapper"><img src="' + itemImg + '" alt="cart image" draggable="false"></div><div class="text-wrapper">' + itemName + ' added to cart<div class="notif-price">' + itemPrice + '</div></div></div>');
            } else if ($('.product-list').length) {
                var itemName = $(this).parents('.product-single').find('.product-name').text();
                var itemImg = $(this).parents('.product-single').find('img').attr('src');
                var itemPrice = $(this).parents('.product-single').find('.product-price').text();
                toastr.info('<div class="notif-cart"><div class="img-wrapper"><img src="' + itemImg + '" alt="jacket 1" draggable="false"></div><div class="text-wrapper">' + itemName + ' added to cart<div class="notif-price">' + itemPrice + '</div></div></div>');
            } else {
                toastr.info('<div class="notif-cart"><div class="img-wrapper"><img src="assets/img/ecommerce/jacket-1.jpg" alt="jacket 1" draggable="false"></div><div class="text-wrapper">Item added to your cart<div class="notif-price">$59.95</div></div></div>');
            }
        });
    }

    /* Remove from Cart */
    function removeFromCart() {
        $('.product-remove a').on('click', function(e) {
            e.preventDefault();
            var numCart = parseInt($('#main-navigation .cart_items_number').text());
            if ($(this).parents('#cart-quickview').length > 0) {
                var itemQuantity = $(this).parents('.cart-item').find('.product-qty').data('qty');
                console.log(itemQuantity);
                $('.cart_items_number').text(numCart - itemQuantity);
                if ($(this).parents('#cart-quickview').find('.cart-item').length == 1) {
                    $('#cart-quickview .table-cart, #cart-quickview .cart-total, #cart-quickview .btn').fadeOut();
                    $('#cart-quickview').append('<p class="cart-empty">Your cart is empty</p>');
                }
            } else {
                $('.cart_items_number').text(numCart - $(this).parents('.cart-item').find('.quantity input').val());
            }
            var itemName = $(this).parents('.cart-item').find('.product-name').text();
            var itemImg = $(this).parents('.cart-item').find('img').attr('src');
            var itemPrice = $(this).parents('.cart-item').find('.product-price').text();
            $(this).parents('.cart-item').fadeOut(300, function() {
                $('.tooltip').remove();
                $(this).remove();
                calculTotal();
            });



            toastr.options = {
                positionClass: 'toast-bottom-right'
            };
            toastr.info('<div class="notif-cart"><div class="img-wrapper"><img src="' + itemImg + '" alt="removed item" draggable="false"></div><div class="text-wrapper">' + itemName + ' removed<div class="notif-price">' + itemPrice + '</div></div></div>');
        });
    }

    /* Checkout: update total value */
    function updateAmountCart() {
        var numCart = 0;
        $('.quantity input').each(function() {
            numCart = numCart + parseFloat($(this).val());
        });
        // $('#main-navigation .cart_items_number').text(numCart);
        $('.cart-item').on('click', '.quantity .plus', function() {
            var numCart = parseInt($('#main-navigation .cart_items_number').text());
            $('.cart_items_number').text(numCart + 1);
            var itemPrice = $(this).parents('.cart-item').find('.product-price span').text();
            var currentVal = parseInt($(this).parent().find('input').val()) + 1;
            var itemTotal = itemPrice * currentVal;
            $(this).parents('.cart-item').find('.product-total').html('$<span>' + itemTotal.toFixed(2) + '</span>');
            calculTotal();
        });
        $('.cart-item').on('click', '.quantity .minus', function() {
            var itemPrice = $(this).parents('.cart-item').find('.product-price span').text();
            var currentVal = parseInt($(this).parent().find('input').val()) - 1;
            var itemTotal = itemPrice * currentVal;
            if (currentVal > 0) {
                var numCart = parseInt($('#main-navigation .cart_items_number').text());
                if (numCart > 0) {
                    $('.cart_items_number').text('').text(numCart - 1);
                }
                $(this).parents('.cart-item').find('.product-total').html('$<span>' + itemTotal.toFixed(2) + '</span>');
                calculTotal();
            }
        });
    }

    /* Checkout: update total value */
    function calculTotal() {
        var subtotal = 0;
        var total = 0;
        var shippingCost = parseFloat($('input[name=shipping-cost]:checked').val());
        $('.product-total span').each(function() {
            subtotal = subtotal + parseFloat($(this).text());
        });
        total = subtotal + shippingCost;
        $('.cart-subtotal-val span').text(total.toFixed(2));
        $('.cart-total-val span').text(total.toFixed(2));
    }

    /* Checkout: update shipping cost */
    function shipping() {
        $('input[name=shipping-cost]').click(function() {
            var subtotal = 0;
            var total = 0;
            var shippingCost = parseFloat($('input[name=shipping-cost]:checked').val());
            if ($('.checkout-form').length) {
                subtotal = parseFloat($('.cart-subtotal-val span').text());
            } else {
                $('.product-total span').each(function() {
                    subtotal = subtotal + parseFloat($(this).text());
                });
            }
            total = subtotal + shippingCost;
            $('.cart-total-val span').text(total.toFixed(2));
        });
    }

    /* Manage Sizes / Colors variations */
    function productVariable() {
        if ($('.select-color').length || $('.select-size').length) {
            $('#clear-selection').hide();
            var colorData = sizeData = 'null';
            $('.select-color').on('change', function() {
                $('#clear-selection').fadeIn();
                colorData = $(this).val();
                if (colorData !== undefined) {
                    $('#clear-selection').show();
                    if (colorData === 'orange') {
                        $('#product-slider').flexslider(0);
                        $('#product-slider-thumbnails').flexslider(0);
                    }
                    if (colorData === 'blue') {
                        $('#product-slider').flexslider(3);
                        $('#product-slider-thumbnails').flexslider(3);
                    }
                    if (colorData === 'brown') {
                        $('#product-slider').flexslider(6);
                        $('#product-slider-thumbnails').flexslider(6);
                    }
                }
                if (colorData !== 'null' && sizeData !== 'null') {
                    $('.quantity-cart').fadeIn();
                } else {
                    // $('.quantity-cart').fadeOut(); /* To hide "Add to Cart" button when user not have selected size / color
                }

            });
            $('.select-size').on('change', function() {
                $('#clear-selection').fadeIn();
                sizeData = $(this).val();
                if (colorData !== 'null' && sizeData !== 'null') {
                    $('.quantity-cart').fadeIn();
                } else {
                    // $('.quantity-cart').fadeOut(); /* To hide "Add to Cart" button when user not have selected size / color;
                }
            });
        }
        $('#clear-selection').click(function(e) {
            e.preventDefault();
            $('.select-color').val('null').trigger("change");
            $('.select-size').val('null').trigger("change");
            $('#clear-selection').fadeOut();
        });
    }
}

function extendedProduct() {
    $('.product-single, .extended-product-img-wrapper').css('min-height', '');

    $('.extended-product:not(.extended-third)').each(function() {
        var extendedProduct = $(this);
        extendedImg = extendedProduct.find('.extended-product-img');
        extendedImgHeight = extendedImg.height();
        extendedDesc = extendedProduct.find('.extended-product-desc');
        extendedDescHeight = extendedDesc.height();
        if (extendedImgHeight > extendedDescHeight) {
            if (extendedProduct.hasClass('extended-product-first') || extendedProduct.hasClass('extended-product-last')) {
                extendedProduct.find('.product-single').css('min-height', extendedImgHeight - 30);
            } else {

                extendedProduct.find('.product-single').css('min-height', extendedImgHeight - 60);
            }
        } else {
            if (extendedProduct.hasClass('extended-alone')) {
                extendedImg.find('.extended-product-img-wrapper').css('min-height', extendedDescHeight - 60);
            } else {
                extendedImg.find('.extended-product-img-wrapper').css('min-height', extendedDescHeight);
            }

        }
    });
    $('.extended-product.extended-third').each(function() {
        var extendedProduct = $(this);
        extendedProductHeight = extendedProduct.height();
        extendedProduct.find('.extended-product-desc .product-single, .extended-product-img-wrapper').css('min-height', extendedProductHeight);
    });

}

function snowEffect() {
    // Main
    if ($('#demo-canvas').length) {
        var width, height, largeHeader, canvas, ctx, circles, target, animateHeader = true;
        initHeader();
        addListeners();
    }

    function initHeader() {
        width = window.innerWidth;
        height = window.innerHeight;
        target = {
            x: 0,
            y: height
        };
        largeHeader = document.getElementById('rev_slider');
        largeHeader.style.height = height + 'px';
        canvas = document.getElementById('demo-canvas');
        canvas.width = width;
        canvas.height = height;
        ctx = canvas.getContext('2d');
        // create particles
        circles = [];
        for (var x = 0; x < width * 0.5; x++) {
            var c = new Circle();
            circles.push(c);
        }
        animate();
    }

    // Event handling
    function addListeners() {
        window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

    function scrollCheck() {
        if (document.body.scrollTop > height) animateHeader = false;
        else animateHeader = true;
    }

    function resize() {
        width = window.innerWidth;
        height = window.innerHeight;
        largeHeader.style.height = height + 'px';
        canvas.width = width;
        canvas.height = height;
    }

    function animate() {
        if (animateHeader) {
            ctx.clearRect(0, 0, width, height);
            for (var i in circles) {
                circles[i].draw();
            }
        }
        requestAnimationFrame(animate);
    }

    function Circle() {
        var _this = this;
        (function() {
            _this.pos = {};
            init();
        })();

        function init() {
            _this.pos.x = Math.random() * width;
            _this.pos.y = height + Math.random() * 300;
            _this.alpha = 0.1 + Math.random() * 0.6;
            _this.scale = 0.1 + Math.random() * 0.5;
            _this.velocity = Math.random();
        }
        this.draw = function() {
            if (_this.alpha <= 0) {
                init();
            }
            _this.pos.y -= _this.velocity;
            _this.alpha -= 0.0005;
            ctx.beginPath();
            ctx.arc(_this.pos.x, _this.pos.y, _this.scale * 10, 0, 2 * Math.PI, false);
            ctx.fillStyle = 'rgba(255,255,255,' + _this.alpha + ')';
            ctx.fill();
        };
    }
}