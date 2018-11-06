function initMap() {
        var uluru = {lat: -15.843826, lng: -47.897821};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru
        });
        map.setCenter({lat: -15.843826, lng: -47.8908});
        
    
    
    
    
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
    
}