//    google.maps.event.addDomListener(window, 'load', function() {
function initMap(){
        var myLatlng = new google.maps.LatLng(-27.4697707, 153.0251235);
       
        var infowindow = new google.maps.InfoWindow();
        var mapOptions = {
            center: myLatlng,
            zoom: 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
 
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

      
        console.log(localStorage.getItem("lat"));
        console.log(localStorage.getItem("lng"));
        map.setCenter(new google.maps.LatLng(localStorage.getItem("lat"),localStorage.getItem("lng")));
        var myLocation = new google.maps.Marker({
            position: new google.maps.LatLng(localStorage.getItem("lat"),localStorage.getItem("lng")),
            map: map,
            title: "My Location"
        });
      
       
}