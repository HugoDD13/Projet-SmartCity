
// INITIALISATION DE LA MAP + PLACEMENT DES MARKERS

function initialize() {

    // initialisation de la map
    var latlng = new google.maps.LatLng(47.322047,5.04148);
     var map = new google.maps.Map(document.getElementById('map'), {
       center: latlng,
       zoom: 14
     });

     // initialisation du marker
     var marker = new google.maps.Marker({
       map: map,
       position: latlng,
       draggable: true,
       anchorPoint: new google.maps.Point(0, -29)
    });

    // la barre des inputs
     var input = document.getElementById('searchInput');
     var inputcoord = document.getElementById('searchInputCoord');

     // Incorporation des inputs
     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
     map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputcoord);
     map.controls[google.maps.ControlPosition.TOP_LEFT].push(btnValidationCoord);

    // initialisation des variables
     var geocoder = new google.maps.Geocoder();
     var autocomplete = new google.maps.places.Autocomplete(input);
     autocomplete.bindTo('bounds', map);
     var infowindow = new google.maps.InfoWindow();
     document.getElementById("btnValidationCoord").addEventListener("click", () => {
        geocodeLatLng(geocoder, map, infowindow, marker);
      });

     // Fonction qui permet de placer le marker a l'aide de l'adresse
     autocomplete.addListener('place_changed', function() {
         infowindow.close();
         marker.setVisible(false);
         var place = autocomplete.getPlace();
         if (!place.geometry) {
             window.alert("Autocomplete's returned place contains no geometry");
             return;
         }
         if (place.geometry.viewport) {
             map.fitBounds(place.geometry.viewport);
         } else {
             map.setCenter(place.geometry.location);
             map.setZoom(15);
         }
         marker.setPosition(place.geometry.location);
         marker.setVisible(true);
         bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
         infowindow.setContent(place.formatted_address);
         infowindow.open(map, marker);
     });

     // Fonction qui place le marker en cliquant
     google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
     });
     function placeMarker(latlng){
     geocoder.geocode({ location: latlng }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            map.setZoom(15);
            map.setCenter(latlng);
            marker.setPosition(latlng);
            bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          } else {
            window.alert("Aucun resultat trouvé");
          }
        } else {
          window.alert("Reverse Geocode marche pas car : " + status);
        }
      });
     };

     // Fonction qui permet de placer un marker a l'aide des coordonnées
     function geocodeLatLng(geocoder, map, infowindow, marker) {
        var input = document.getElementById("searchInputCoord").value;
        var latlngStr = input.split(",", 2);
        var latlng = {
          lat: parseFloat(latlngStr[0]),
          lng: parseFloat(latlngStr[1]),
        };
        geocoder.geocode({ location: latlng }, (results, status) => {
          if (status === "OK") {
            if (results[0]) {
              map.setZoom(15);
              map.setCenter(latlng);
              marker.setPosition(latlng);
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              window.alert("Aucun resultat trouvé");
            }
          } else {
            window.alert("Reverse Geocode marche pas car : " + status);
          }
        });
      }

     // Fonction qui permet de bouger le marker
     google.maps.event.addListener(marker, 'dragend', function() {
         geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
           if (results[0]) {
               bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
               infowindow.setContent(results[0].formatted_address);
               infowindow.open(map, marker);
           }
         }
         });
     });
 }

 // Fonction qui remplie les inputs en récupérant les informations de localisation du marker
 function bindDataToForm(address,lat,lng){
    document.getElementById('inpLocation').value = address;
    document.getElementById('inpLatitude').value = lat;
    document.getElementById('inpLongitude').value = lng;

    document.getElementById('inpLocation2').value = address;
    document.getElementById('inpLatitude2').value = lat;
    document.getElementById('inpLongitude2').value = lng;
 }
 google.maps.event.addDomListener(window, 'load', initialize);
