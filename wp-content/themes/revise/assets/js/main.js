(function($) {
    "use strict";

    jQuery(document).ready(function($) {

        // data - background
        $("[data-background]").each(function() {
            $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
        })       

        // Nice Select 
        $('select').niceSelect();
        
        // active menu class
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 900, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            scrollTarget: false, // Set a custom target element for scrolling to. Can be element or number
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });

         // One Page Nav
        $('#mainnavbar').onePageNav();

        // sticky
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll < 2) {
                $("#header_area").removeClass("sticky");
            } else {
                $("#header_area").addClass("sticky");
            }
        });

        // active menu class
        $(".navbar-toggler").click(function() {
            $(".header_area").toggleClass("active");
        });

        // cta area slider
        $(".lender-area-gallery-wrapper").owlCarousel({

            nav: true,
            dots: false,
            autoplay: false,
            margin: 30,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            mouseDrag: true,
            touchDrag: true,
            responsive: {
                1200: {
                    items: 5
                },
                992: {
                    items: 5
                },
                768: {
                    items: 3
                },
                320: {
                    items: 2
                },
                480: {
                    items: 2
                }
            }
        });


    });


    jQuery(window).load(function() {

     

    });


}(jQuery));