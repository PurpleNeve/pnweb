$(document).ready(function () {
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