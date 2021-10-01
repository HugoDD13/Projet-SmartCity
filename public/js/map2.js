var waypoints = [];
// INITIALISATION DE LA MAP + PLACEMENT DES MARKERS

function initialize2(nb) {
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const map = new google.maps.Map(document.getElementById("mapItinerary"), {
        zoom: 14,
        center: { lat: 47.322047, lng: 5.04148 },
     });
     directionsRenderer.setMap(map);

     //code Event

     const geocoder = new google.maps.Geocoder();
     document.getElementById("submit").addEventListener("click", () => {
       geocodeAddress(geocoder, map);
     });

     function geocodeAddress(geocoder, resultsMap) {

        var address = document.getElementById("event0").value;

        geocoder.geocode({ address: address}, (results, status) => {
          if (status === "OK") {
            resultsMap.setCenter(results[0].geometry.location);
            new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
            });
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });

        var address1 = document.getElementById("event1").value;

        geocoder.geocode({ address: address1}, (results, status) => {
            if (status === "OK") {
              resultsMap.setCenter(results[0].geometry.location);
              new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location,
              });
            } else {
              alert("Geocode was not successful for the following reason: " + status);
            }
          });

          var address2 = document.getElementById("event2").value;

          geocoder.geocode({ address: address2}, (results, status) => {
              if (status === "OK") {
                resultsMap.setCenter(results[0].geometry.location);
                new google.maps.Marker({
                  map: resultsMap,
                  position: results[0].geometry.location,
                });
              } else {
                alert("Geocode was not successful for the following reason: " + status);
              }
            });
      }

     const onChangeHandler = function () {
        for(var i=0; i<nb; i++)
        {
            waypoints.push({location: document.getElementById("step"+i).value, stopover: true})
        }
       calculateAndDisplayRoute(directionsService, directionsRenderer, waypoints);
       waypoints = [];
     };

     document.getElementById("start").addEventListener("change", onChangeHandler);
     for(var i=0; i<nb; i++)
     {
        document.getElementById("step"+i).addEventListener("change", onChangeHandler);
     }
     document.getElementById("end").addEventListener("change", onChangeHandler);

   }

   function calculateAndDisplayRoute(directionsService, directionsRenderer, waypoints) {
     directionsService.route(
       {
         origin: {
           query: document.getElementById("start").value,
         },

         waypoints: waypoints,

         destination: {
           query: document.getElementById("end").value,
         },

         travelMode: google.maps.TravelMode.DRIVING,
       },
       (response, status) => {
         if (status === "OK") {
           directionsRenderer.setDirections(response);
         } else {
           window.alert("Directions request failed due to " + status);
         }
       }
     );
}
