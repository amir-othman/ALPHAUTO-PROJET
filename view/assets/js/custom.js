/*==========

Theme Name: SuperCars - Car Rental HTML Template
Theme Version: 1.0

==========*/

/*==========
----- JS INDEX -----
1.Whole Script Strict Mode Syntax
2.Loader JS
3.Wow Animation JS
4.Datepicker JS
5.Smooth Scrolling JS
6.Scroll To Top JS
7.Sticky Header JS
8.Toogle Menu Mobile JS
9.Cars Slider JS
10.Reviews Slider JS
11.Driver Slider JS
12.Interior Exterior Slider JS
13.Submenu For Mobile JS
==========*/

$(document).ready(function($) {

    // Whole Script Strict Mode Syntax
    "use strict";


    $(window).ready(function() {
        // Loader JS Start
        $('.loader-box').fadeOut();
        // Loader JS End
        $('body').removeClass('fixed');
        // Wow Animation JS Start
        new WOW().init();
        // Wow Animation JS Start
    });

    // Datepicker JS Start
    $(function() {
        $('.date').datepicker({
            format: 'dd/mm/yyyy'
        }).datepicker("setDate", 'now');
    });
    // Datepicker JS End

    // Smooth Scrolling JS Start
    if (window.location.hash) {
        // smooth scroll to the anchor id
        $('html,body').animate({
            scrollTop: $(window.location.hash).offset().top - 100
        }, 0, 'swing');
    } else {
        setTimeout(function() { scroll(0, 0); }, 1);
    }
    // Smooth Scrolling JS End

    // Scroll To Top JS Start
    var $scrolltop = $('.scroll-to-top');

    $scrolltop.on('click', function() {
        $('html,body').animate({
            scrollTop: 0
        }, 0);
        $(this).addClass("car-run");
        setTimeout(function() { $scrolltop.removeClass('car-run'); }, 1000);
        return false;
    });
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 200) {
            $scrolltop.addClass("show");
            $scrolltop.addClass("car-down");
        } else {
            $scrolltop.removeClass("show");
            setTimeout(function() { $scrolltop.removeClass('car-down'); }, 300);
        }
    });
    // Scroll To Top JS End

    // Sticky Header JS Start
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= 100) {
            $('.site-header').addClass('sticky-header');
        } else {
            $('.site-header').removeClass('sticky-header');
        }
    });
    // Sticky Header JS End

    // Toogle Menu Mobile JS Start
    $(".toggle-button").on('click', function() {
        $(".main-navigation").toggleClass('toggle-menu');
        $(".header-menu .black-shadow").fadeToggle();
    });
    $(".main-navigation ul li a").on('click', function() {
        $(".main-navigation").removeClass('toggle-menu');
        $(".header-menu .black-shadow").fadeOut();
    });
    $(".main-navigation ul li.sub-items>a").on('click', function() {
        $(".main-navigation").addClass('toggle-menu');
        $(".header-menu .black-shadow").stop();
    });
    $(".header-menu .black-shadow").on('click', function() {
        $(this).fadeOut();
        $(".main-navigation").removeClass('toggle-menu');
    });
    // Toogle Menu Mobile JS End

    // Cars Slider JS Start
    const cars_slider = new Swiper('.cars-slider', {
        slidesPerView: 2,
        loop: true,
        parallax: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1500,
        direction: 'horizontal',
        effect: 'slide',
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            }
        },
    });
    $('.cars-slider').hover(function() {
        cars_slider.autoplay.stop();
    }, function() {
        cars_slider.autoplay.start();
    });
    // Cars Slider JS End

    // Reviews Slider JS Start
    const reviews_slider = new Swiper('.reviews-slider', {
        slidesPerView: 2,
        loop: true,
        parallax: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1500,
        direction: 'horizontal',
        effect: 'slide',
        spaceBetween: 30,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            }
        },
    });
    $('.reviews-slider').hover(function() {
        reviews_slider.autoplay.stop();
    }, function() {
        reviews_slider.autoplay.start();
    });
    // Reviews Slider JS End

    // Driver Slider JS Start
    const driver_slider = new Swiper('.driver-slider', {
        slidesPerView: 3,
        loop: true,
        parallax: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1500,
        direction: 'horizontal',
        effect: 'slide',
        spaceBetween: 30,
        navigation: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            }
        },
    });
    $('.driver-slider').hover(function() {
        driver_slider.autoplay.stop();
    }, function() {
        driver_slider.autoplay.start();
    });
    // Driver Slider JS End

	// Interior Exterior Slider JS Start
    const interior_exterior_slider = new Swiper('.interior-exterior-slider', {
        slidesPerView: 1,
        loop: true,
        parallax: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        direction: 'horizontal',
        effect: 'fade',
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            }
        },
    });
    $('.interior-exterior-slider').hover(function() {
        interior_exterior_slider.autoplay.stop();
    }, function() {
        interior_exterior_slider.autoplay.start();
    });
    // Interior Exterior Slider JS End

    if ($(window).width() < 992) {
        // Submenu For Mobile JS Start
		$('body').on('click', '.main-navigation ul li.sub-items>a', function() {
            if (($(this).parent().hasClass('active-sub-menu'))) {
            $(this).parent().removeClass('active-sub-menu');
            $(this).parent().find('ul').slideUp();
            } else {
                $(this).parent().addClass('active-sub-menu');
                $(this).parent().find('ul').slideDown();
            }
        });
		// Submenu For Mobile JS End
    }
});