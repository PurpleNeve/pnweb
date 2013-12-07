$(document).ready(function () {
    var mapOptions = {
        center: new google.maps.LatLng(43.639580, -79.394169),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var image = "/bundles/frontend/images/marker.png";
    var marker = new google.maps.Marker({
        position: mapOptions.center,
        map: map,
        icon: image
    });

    var styles = [{
        "featureType": "landscape",
        "stylers": [{
            "saturation": -100
        }]
    }, {
        "featureType": "poi",
        "stylers": [{
            "saturation": -100
        }]
    }, {
        "featureType": "road",
        "stylers": [{
            "saturation": -100
        }]
    }, {
        "featureType": "transit",
        "stylers": [{
            "saturation": -100
        }]
    }, {
        "featureType": "water",
        "stylers": [{
            "saturation": -100
        }]
    }, {
        "featureType": "administrative",
        "stylers": [{
            "saturation": -100
        }]
    }]

    var styledMap = new google.maps.StyledMapType(styles, {
        name: "map_style"
    });

    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');
});