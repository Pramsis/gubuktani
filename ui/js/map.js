function myMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
        center: new google.maps.LatLng(-7.2613094, 112.6653623,19),
        zoom: 10
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
}
