$(document).ready(function () {
    var window_height = $(document).height();
    var nav_height = $('#site-header').height();
    var slider_height = window_height - nav_height;

    $('#site-body, .home-slider').css({height: slider_height});
    
    $('#home-slider-logo').hover(function() {
        console.log('this');
        $(this).attr('src', 'bundles/frontend/images/neve.png');
    }, function() {
        console.log('that');
        $(this).attr('src', 'bundles/frontend/images/neve_white.png');
    });

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