<!DOCTYPE html>
<html>
    <head>
        <title>Geolocation API test</title>
        <meta charset="utf8" />
        <style type="text/css">
            html, body {
                width: 100%;
                height: 100%;
            }
            body {
                margin: 0;
                position: relative;
            }
            #maps {
                width: 50%;
                height: 100%;
                text-align: right
                left: 0;
                top: 0;
            }
            </style>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript">
        if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(objPosition) {
        document.getElementById("latitude").innerHTML = objPosition.coords.latitude;
        document.getElementById("longitude").innerHTML = objPosition.coords.longitude;
        document.getElementById("accuracy").innerHTML = objPosition.coords.accuracy;
        document.getElementById("altitude").innerHTML = objPosition.coords.altitude;
        document.getElementById("altitudeaccuracy").innerHTML = objPosition.coords.altitudeAccuracy;
        document.getElementById("heading").innerHTML = objPosition.coords.heading;
        document.getElementById("speed").innerHTML = objPosition.coords.speed;
    }, function(objErreur) {
        var strErreur = '';
        switch(objErreur.code) {
            case objErreur.PERMISSION_DENIED:
                strErreur = "Vous n'avez pas donné la permission de déterminer votre position."
                break;
            case objErreur.TIMEOUT:
            case objErreur.POSITION_UNAVAILABLE:
                strErreur = "Votre position n'a pas pu être déterminée."
                break;
            default:
                strErreur = "Erreur inconnue."
                break;
        };
        alert(strErreur);
    }, {
        timeout: 20,
        enableHighAccuracy: true,
        maximumAge: 0
    });
}
var objLocation, objMaps, objCurrentLocationMarker, objInfoWindow;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        objLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        objMaps = new google.maps.Map(document.querySelector("#maps"), {
            zoom: 16,
            center: objLocation,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            zoomControl: true,
            navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        objCurrentLocationMarker = new google.maps.Marker({
            position: objLocation,
            map: objMaps,
            title: "Vous êtes ici !"
        });
        google.maps.event.addListener(objCurrentLocationMarker, 'click', function() {
            objInfoWindow.setContent("Vous êtes ici !");
            objInfoWindow.open(objMaps, this);
        });

        objInfoWindow = new google.maps.InfoWindow();
    }, function(msg) {
        alert("Erreur : " + msg);
    });
}
        </script>


    </head>

    <body>
        Latitude : <span id="latitude"></span><br />
        Longitude : <span id="longitude"></span><br />
        Précision : <span id="accuracy"></span> mètres<br />
        Altitude : <span id="altitude"></span><br />
        Précision de l'altitude : <span id="altitudeaccuracy"></span> mètres<br />
        Direction : <span id="heading"></span> degrés<br />
        Vitesse : <span id="speed"></span> m/s<br />

        <div id="maps"></div>
    </body>
</html>
