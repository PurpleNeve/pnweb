$(document).ready(function () {
    var window_height = $(window).height();
    var nav_height = $('#site-header').height();
    var slider_height = window_height - nav_height;

    $('#home-slider').css({height: slider_height});

    $('#home-slider.flexslider').flexslider({                        
        animation: "swing",
        direction: "vertical", 
        slideshow: true,
        slideshowSpeed: 3500,
        animationDuration: 1000,
        directionNav: false,
        controlNav: true,
        smootheHeight:true,
        after: function(slider) {
            slider.removeClass('loading');
        }    
    });
});