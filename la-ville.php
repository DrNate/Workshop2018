<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="mystyle.css">

    <title>La ville</title>

</head>
<body>
<?php
include ('navbar.html')
?>
<div class="container content">
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
    <h3>Localisation du campus</h3>
    <div id="map"></div>
    <script>
        function initMap() {
            var sContent = 'Campus EPSI';
            var sContent2 = 
            "<p style='float:left'>Tramway ligne <img src='tramB.png' alt='tramB' height='30' width='30'></p>"+
            "<br />"+
            "<p style='float:left'>Tramway ligne <img src='tramC.png' alt='tramC' height='30' width='30'></p>"+
            "<br />"+
            "<br />"+
            "<br />"+
            "<br />"+
            "<br />"+
            "<br />"+
            "<a href='https://www.tag.fr/' style='block'>Toutes les informations TAG</a>"
            ;

            var titre = "Oui";
            var titreTram = "Arrêt de tram Condillac Université";

            var campus = {lat: 45.187427, lng: 5.778362};
            var tram = {lat: 45.188992, lng: 5.774448};
            var centrerPoint = {lat: 45.188209, lng: 5.776405};
            var map = new google.maps.Map(
                document.getElementById('map'), {
                    zoom: 15.5, 
                    center: centrerPoint
                });

            infowindow = new google.maps.InfoWindow({ content: sContent });
            infowindow2 = new google.maps.InfoWindow({ content: sContent2 });

            var marker = new google.maps.Marker({
                position: campus, 
                map: map, 
                title: titre, 
                info: sContent
            });

            var markerTram = new google.maps.Marker({
                position: tram, 
                map: map,
                title: titre, 
                info: sContent2
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });
            google.maps.event.addListener( marker, 'click', function() {
                infowindow.setContent( this.info );
                infowindow.open( map, this );
            });

            google.maps.event.addListener(markerTram, 'click', function() {
                infowindow.open(map,markerTram);
            });
            google.maps.event.addListener( markerTram, 'click', function() {
                infowindow.setContent( this.info );
                infowindow.open( map, this );
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=Key&callback=initMap">
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>