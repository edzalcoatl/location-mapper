function initMap(latitude, longitude, leyend, pinColor) {
  if(latitude !='' && longitude !=''){
    var location = {lat: latitude, lng: longitude};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: location
    });
    //Symbols Paths http://map-icons.com/
    var symbol = {
        path: 'M0-48c-9.8 0-17.7 7.8-17.7 17.4 0 15.5 17.7 30.6 17.7 30.6s17.7-15.4 17.7-30.6c0-9.6-7.9-17.4-17.7-17.4z',
        scale: 1,
        fillColor: pinColor,
        fillOpacity: 0.8,
        strokeWeight: 1,
        strokeColor: pinColor
      };
    var marker = new google.maps.Marker({
            map: map,
            position: location,
            title: leyend,
            icon: symbol,
    });
  } 
}