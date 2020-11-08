/*
* ----------------------------------------------------------------------------------------
Author       : Aazztech
Template Name: Devent - Html template
Version      : 1.0
* ----------------------------------------------------------------------------------------
*/

(function($) {
        jQuery(document).ready(function() {
                /*
                 * ----------------------------------------------------------------------------------------
                 *  HEADER SEARCH
                 * ----------------------------------------------------------------------------------------
                 */
                $('.search_trigger').on('click', function() {
                        $(this).toggleClass('la-close icon-magnifier');
                        $(this).toggleClass('la-search');
                        $(this)
                                .parent('.search_module')
                                .children('.search_area_inner')
                                .toggleClass('active');
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  STICKY MENU
                 * ----------------------------------------------------------------------------------------
                 */
                // Headroom JS
                const myElement = document.querySelector('.menu-area-sticky');
                if (myElement !== null) {
                        const headroom = new Headroom(myElement);
                        headroom.init();
                }

                /*
                 * ----------------------------------------------------------------------------------------
                 *  SLIDE MENU
                 * ----------------------------------------------------------------------------------------
                 */
                function slideMenu() {
                        const activeState = $('#menu-container .menu-list').hasClass('active');
                        $('#menu-container .menu-list').animate(
                                {
                                        left: activeState ? '0%' : '-100%',
                                },
                                400
                        );
                }
                $('#menu-wrapper').click(function(event) {
                        event.stopPropagation();
                        $('#hamburger-menu').toggleClass('open');
                        $('#menu-container .menu-list').toggleClass('active');
                        slideMenu();

                        $('body').toggleClass('overflow-hidden');
                });

                $('.menu-list')
                        .find('.accordion-toggle')
                        .click(function() {
                                $(this)
                                        .next()
                                        .toggleClass('open')
                                        .slideToggle('fast');
                                $(this)
                                        .toggleClass('active-tab')
                                        .find('.menu-link')
                                        .toggleClass('active');

                                $('.menu-list .accordion-content')
                                        .not($(this).next())
                                        .slideUp('fast')
                                        .removeClass('open');
                                $('.menu-list .accordion-toggle')
                                        .not(jQuery(this))
                                        .removeClass('active-tab')
                                        .find('.menu-link')
                                        .removeClass('active');
                        });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  SEARCH CATEGORIES
                 * ----------------------------------------------------------------------------------------
                 */
                const search_field = $('.top-search-field');
                search_field.on('click', function(e) {
                        $(this)
                                .parents('.search_module')
                                .addClass('active');
                        e.stopPropagation();
                });
                $(document).on('click', function() {
                        $('.search_module').removeClass('active');
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  RANGES SLIDER
                 * ----------------------------------------------------------------------------------------
                 */
                // $( "#slider-range" ).slider({
                //     range: true,
                //     min: 25,
                //     max: 500,
                //     values: [ 25, 250 ],
                //     slide: function( event, ui ) {
                //       $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                //     }
                //   });
                //   $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                //     " - $" + $( "#slider-range" ).slider( "values", 1 ) );

                /*
                 * ----------------------------------------------------------------------------------------
                 *  SELECT
                 * ----------------------------------------------------------------------------------------
                 */
                // $("#event-option").select2({
                //     minimumResultsForSearch: Infinity,
                //     dropdownCssClass: "event-option",
                //     allowClear: true,
                // });

                // $("#adv-looking-field,#adv-search-field").select2({
                //     minimumResultsForSearch: Infinity,
                //     dropdownCssClass: "banner-filed",
                //     allowClear: true,
                // });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  MENU DROPDOWN
                 * ----------------------------------------------------------------------------------------
                 */

                // $(".menu-item-has-children").on("click", function (e) {
                //     e.preventDefault();
                //     $(this).toggleClass("active");
                // });
                $('#menu-primary-menu').addClass('navbar-nav');

                const windows = $(window);
                const screenSize = windows.width();

                /* responsive mobile menu */
                function mobileMenu(dropDownTrigger, dropDown) {
                        $(`.navbar-nav ${dropDown}`).slideUp();
                        $(dropDownTrigger).removeAttr('data-toggle');

                        $(`.navbar-nav ${dropDownTrigger}`).on('click', function(e) {
                                if (
                                        $(this)
                                                .parent()
                                                .hasClass('menu-item-has-children')
                                ) {
                                        e.preventDefault();
                                }
                                $(this)
                                        .toggleClass('active')
                                        .siblings(dropDown)
                                        .slideToggle()
                                        .parent()
                                        .siblings('.dropdown')
                                        .children(dropDown)
                                        .slideUp('fast')
                                        .siblings(dropDownTrigger)
                                        .removeClass('active');
                        });
                }

                if (screenSize < 992) {
                        // mobileMenu('.dropdown-toggle', '');
                        mobileMenu('.menu-item.menu-item-has-children a', '.sub-menu');
                }

                /*
                 * ----------------------------------------------------------------------------------------
                 *  TOGGLE DIV
                 * ----------------------------------------------------------------------------------------
                 */
                $('.recover-pass-form').hide();
                $('.recover-pass-link').on('click', function(e) {
                        e.preventDefault();
                        $('.recover-pass-form')
                                .slideToggle()
                                .show();
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  PRELOADER JS
                 * ----------------------------------------------------------------------------------------
                 */
                const prealoaderOption = $(window);
                prealoaderOption.on('load', function() {
                        const preloader = jQuery('.spinner');
                        const preloaderArea = jQuery('.preloader-area');
                        preloader.fadeOut();
                        preloaderArea.delay(350).fadeOut('slow');
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  CHANGE MENU BACKGROUND JS
                 * ----------------------------------------------------------------------------------------
                 */
                const headertopoption = $(window);
                const headTop = $('.header-top-area');

                headertopoption.on('scroll', function() {
                        if (headertopoption.scrollTop() > 200) {
                                headTop.addClass('menu-bg');
                        } else {
                                headTop.removeClass('menu-bg');
                        }
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  SMOTH SCROOL JS
                 * ----------------------------------------------------------------------------------------
                 */

                $('a.smoth-scroll').on('click', function(e) {
                        const anchor = $(this);
                        $('html, body')
                                .stop()
                                .animate(
                                        {
                                                scrollTop: $(anchor.attr('href')).offset().top - 50,
                                        },
                                        1000
                                );
                        e.preventDefault();
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  SCROLL TO UP JS
                 * ----------------------------------------------------------------------------------------
                 */
                $(window).on('scroll', function() {
                        if ($(this).scrollTop() > 250) {
                                $('.scrollup').fadeIn();
                        } else {
                                $('.scrollup').fadeOut();
                        }
                });
                $('.scrollup').on('click', function() {
                        $('html, body').animate(
                                {
                                        scrollTop: 0,
                                },
                                800
                        );
                        return false;
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  OFFCANVAS
                 * ----------------------------------------------------------------------------------------
                 */
                $('#left').offcanvas({
                        modifiers: 'right,overlay',
                        triggerButton: '.js-offcanvas-trigger',
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  testimonial-carousel
                 * ----------------------------------------------------------------------------------------
                 */
                $('.testimonial-carousel').owlCarousel({
                        items: 1,
                        dots: false,
                        nav: true,
                        navText: [
                                '<span class="i la la-long-arrow-left"></span>',
                                '<span class="i la la-long-arrow-right"></span>',
                        ],
                });

                /* Brand logo carousel */
                $('.brand-logo-wrapper').owlCarousel({
                        items: 5,
                        margin: 20,
                        dots: false,
                        nav: true,
                        navText: [
                                '<span class="i la la-long-arrow-left"></span>',
                                '<span class="i la la-long-arrow-right"></span>',
                        ],
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  listing-carousel
                 * ----------------------------------------------------------------------------------------
                 */
                $('.listing-carousel').owlCarousel({
                        items: 5,
                        nav: true,
                        navText: [
                                '<span class="la la-long-arrow-left"></span>',
                                '<span class="la la-long-arrow-right"></span>',
                        ],
                        dots: true,
                        margin: 30,
                        responsive: {
                                0: {
                                        items: 1,
                                },
                                400: {
                                        items: 1,
                                },
                                575: {
                                        items: 2,
                                },
                                767: {
                                        items: 3,
                                },
                                991: {
                                        items: 4,
                                },
                                1191: {
                                        items: 5,
                                },
                        },
                });

                /*
                 * ----------------------------------------------------------------------------------------
                 *  listing-carousel
                 * ----------------------------------------------------------------------------------------
                 */
                // logo carousel
                $('.logo-carousel').owlCarousel({
                        items: 5,
                        nav: false,
                        dots: false,
                        margin: 100,
                        responsive: {
                                0: {
                                        items: 1,
                                },
                                400: {
                                        items: 2,
                                },
                                575: {
                                        items: 3,
                                },
                                767: {
                                        items: 3,
                                },
                                991: {
                                        items: 5,
                                },
                        },
                });
        });
})(jQuery);

(function($) {
        // Header Search
        // //Video Popup
        // $('.video-iframe').magnificPopup({
        //     type: 'iframe',
        //     mainClass: 'mfp-fade',
        //     preloader: true,
        // });
        //
        //
        // $("#datepicker").datepicker();
        // search categories
        /* ----------------------------
     10: Menu Dropdown
     ------------------------------ */
        // Perform AJAX login on form submit
        // jQuery(".categories-carousel").owlCarousel({
        //     nav: true,
        //     dots: false,
        //     margin: 20,
        //     loop: false,
        //     navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"],
        //     responsiveClass: true,
        //     autoplay: false,
        //     responsive: {
        //         0: {
        //             items: 1,
        //             nav: true
        //         },
        //         480: {
        //             items: 2,
        //             nav: true
        //         },
        //         767: {
        //             items: 2,
        //             nav: true
        //         },
        //         768: {
        //             items: 3,
        //             nav: true
        //         },
        //         992: {
        //             items: 5,
        //             nav: true
        //         },
        //     },
        // });
        // jQuery(".partner-carousel").owlCarousel({
        //     nav: false,
        //     dots: false,
        //     margin: 100,
        //     loop: true,
        //     responsiveClass: true,
        //     autoplay: false,
        //     responsive: {
        //         0: {
        //             items: 1,
        //             nav: true
        //         },
        //         480: {
        //             items: 2,
        //             nav: true
        //         },
        //         767: {
        //             items: 3,
        //             nav: true
        //         },
        //         768: {
        //             items: 3,
        //             nav: true
        //         },
        //         992: {
        //             items: 5,
        //             nav: true
        //         },
        //     },
        // });
        // jQuery(".reviews-carousel").owlCarousel({
        //     nav: false,
        //     dots: true,
        //     loop: true,
        //     responsiveClass: true,
        //     autoplay: false,
        //     responsive: {
        //         0: {
        //             items: 1,
        //             nav: true
        //         },
        //         480: {
        //             items: 1,
        //             nav: true
        //         },
        //         767: {
        //             items: 1,
        //             nav: true
        //         },
        //         768: {
        //             items: 2,
        //             nav: true
        //         },
        //         992: {
        //             items: 3,
        //             nav: true
        //         },
        //     },
        // });
        // jQuery(".hospital-carousel").owlCarousel({
        //     nav: true,
        //     dots: false,
        //     margin: 20,
        //     loop: true,
        //     navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"],
        //     responsiveClass: true,
        //     autoplay: false,
        //     responsive: {
        //         0: {
        //             items: 1,
        //             nav: true
        //         },
        //         480: {
        //             items: 1,
        //             nav: true
        //         },
        //         768: {
        //             items: 2,
        //             nav: true
        //         },
        //         992: {
        //             items: 2,
        //             nav: true
        //         },
        //     },
        // });
        // jQuery(".hospital-photos-carousel").owlCarousel({
        //     nav: true,
        //     dots: false,
        //     margin: 20,
        //     loop: true,
        //     navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"],
        //     responsiveClass: true,
        //     autoplay: false,
        //     responsive: {
        //         0: {
        //             items: 1,
        //             nav: true
        //         },
        //         480: {
        //             items: 1,
        //             nav: true
        //         },
        //         768: {
        //             items: 2,
        //             nav: true
        //         },
        //         992: {
        //             items: 3,
        //             nav: true
        //         },
        //     },
        // });
        // // testimonial-carousel
        // $(".testimonial-carousel").owlCarousel({
        //     items: 1,
        //     dots: false,
        //     nav: true,
        //     navText: ['<span class="i la la-long-arrow-left"></span>', '<span class="i la la-long-arrow-right"></span>']
        // });
        // // Progress_Bar-Count_Up
        // $('.count_up').counterUp({
        //     delay: 10,
        //     time: 1000
        // });
        // // Portfolio Filter
        // $('.filters ul li').click(function () {
        //     $('.filters ul li').removeClass('active');
        //     $(this).addClass('active');
        //     var data = $(this).attr('data-filter');
        //     $grid.isotope({
        //         filter: data
        //     })
        // });
        // var $grid = $(".grid").isotope({
        //     itemSelector: ".all",
        //     percentPosition: true,
        //     masonry: {
        //         columnWidth: ".all"
        //     }
        // });
        // $(".caption").on('click', function () {
        //     var $body = $(this).closest(".module").find(".body");
        //     var $icon = $body.siblings('.caption').find('.icon-roll');
        //     $body.slideToggle(500);
        //     if ($body.css("display") === 'block' && !($icon.hasClass("rotate"))) {
        //         $icon.removeClass('rev-rotate').addClass('rotate').addClass('text-dark').removeClass('text-primary');
        //     } else {
        //         $icon.removeClass('rotate').addClass('rev-rotate').addClass('text-primary').removeClass('text-dark');
        //     }
        // });
        // $(".caption").each((ind, el) => {
        //     $(el).on('click', () => {
        //         $(el).closest('.module').find('.body').each((ind2, el2) => {
        //             if (el2.classList.toggle('active')) {
        //                 $(el).find('.icon-roll').html('More +')
        //             } else {
        //                 $(el).find('.icon-roll').html('More -')
        //             }
        //         })
        //     })
        // });
        // Price Range Slider
        // var slider_range = $(".slider-range");
        // slider_range.each(function () {
        //     $(this).slider({
        //         range: true,
        //         min: 0,
        //         max: 1000,
        //         values: [0, 200],
        //         slide: function (event, ui) {
        //             $(".amount").text("$" + ui.values[0] + " - $" + ui.values[1]);
        //         }
        //     });
        // });
        // $(".amount").text("$" + slider_range.slider("values", 0) + " - $" + slider_range.slider("values", 1));
        // // Doctor Details Progress Bar
        // $(document).ready(function () {
        //     $('.staff').animate({
        //         width: '70%'
        //     }, 2000);
        //     $('.punctuality').animate({
        //         width: '85%'
        //     }, 2000);
        //     $('.helpfulness').animate({
        //         width: '90%'
        //     }, 2000);
        //     $('.knowledge').animate({
        //         width: '95%'
        //     }, 2000);
        // });
        // // Doctor Details Onclick
        // $('.onclick-one li span').click(function () {
        //     $('li span').removeClass("active-one");
        //     $(this).addClass("active-one");
        // });
        // $('.onclick-two li span').click(function () {
        //     $('li span').removeClass("active-two");
        //     $(this).addClass("active-two");
        // });
        // $('.onclick-three li span').click(function () {
        //     $('li span').removeClass("active-three");
        //     $(this).addClass("active-three");
        // });
        // $('.onclick-four li span').click(function () {
        //     $('li span').removeClass("active-four");
        //     $(this).addClass("active-four");
        // });
        // $('.onclick-five li span').click(function () {
        //     $('li span').removeClass("active-five");
        //     $(this).addClass("active-five");
        // });
})(jQuery);

// function openNav() {
//     document.getElementById("mySidenav").style.width = "250px";
//     document.getElementById("main").style.marginLeft = "250px";
// }

// function closeNav() {
//     document.getElementById("mySidenav").style.width = "0";
//     document.getElementById("main").style.marginLeft = "0";
// }

(function($) {
        $(document).bind('beforecreate.offcanvas', function(e) {
                const dataOffcanvas = $(e.target).data('offcanvas-component');

                dataOffcanvas.onInit = function() {
                        console.log(this);
                };
        });

        $(document).bind('create.offcanvas', function(e) {
                const dataOffcanvas = $(e.target).data('offcanvas-component');
                console.log(dataOffcanvas);
                dataOffcanvas.onOpen = function() {
                        console.log('Callback onOpen');
                };
                dataOffcanvas.onClose = function() {
                        console.log('Callback onClose');
                };
        });

        $(document).bind('clicked.offcanvas-trigger clicked.offcanvas', function(e) {
                const dataBtnText = $(e.target).text();
                console.log(`${e.type}.${e.namespace}: ${dataBtnText}`);
        });

        $(document).bind('open.offcanvas', function(e) {
                const dataOffcanvasID = $(e.target).attr('id');
                console.log(`${e.type}: #${dataOffcanvasID}`);
        });

        $(document).bind('resizing.offcanvas', function(e) {
                const dataOffcanvasID = $(e.target).attr('id');
                console.log(`${e.type}: #${dataOffcanvasID}`);
        });

        $(document).bind('close.offcanvas', function(e) {
                const dataOffcanvasID = $(e.target).attr('id');
                console.log(`${e.type}: #${dataOffcanvasID}`);
        });

        $('.js-open').bind('create.offcanvas', function(e) {
                const dataOffcanvas = $(this).data('offcanvas-component');
                setTimeout(function() {
                        // dataOffcanvas.open();
                }, 200);
        });

        $(document).bind('beforecreate.offcanvas', function(e) {
                const $offcanvas = $(e.target);
                const api = $offcanvas.data('offcanvas-component');

                function onFocusIn() {
                        console.log('onFocusIn');
                        api.options.resize = false;
                        console.log(api.options.resize);
                        $(window).off('resize.offcanvas orientationchange.offcanvas');
                }

                function onFocusOut() {
                        console.log('onFocusOut');
                        api.options.resize = true;
                        console.log(api.options.resize);
                        $(window).on('resize.offcanvas orientationchange.offcanvas');
                        api.resize();
                }

                $offcanvas.on('focusin', 'input,textarea', onFocusIn).on('focusout', 'input,textarea', onFocusOut);
        });

        // Trigger Enhance
        $('.js-enhance').on('click', function() {
                $(document).trigger('enhance');
        });
        $(document).trigger('enhance');
})(jQuery);
