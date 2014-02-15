<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href="../stylesheets/bootstrap.css" />
	<script type="text/javascript" src='../javascript/jquery.js'></script>
	<script type= 'text/javascript' src="../javascript/bootstrap.js"></script>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		html { 
			height: 100%
		}
		
		body { 
			height: 100%;
			margin: 0;
			padding: 0
		}
		
		#map-canvas {
			height: 60%;
		}
	</style>
	<script type="text/javascript"
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf8SJaU3GZGZvFXxrf0sXJsGV-tlWM0N8&sensor=false">
</script>
<script>

	function init() {
	  var mapOptions = {
	    zoom: 10,
	    center: new google.maps.LatLng(-33.9, 151.2),
	    mapTypeId: google.maps.MapTypeId.HYBRID
	  };

	  var map = new google.maps.Map(document.getElementById('map-canvas'),
	                                mapOptions);

	  setMarkers(map, beaches);
	}

	var beaches = [
	  ['Bondi Beach', -33.890542, 151.274856, 4],
	  ['Coogee Beach', -33.923036, 151.259052, 5],
	  ['Cronulla Beach', -34.028249, 151.157507, 3],
	  ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
	  ['Maroubra Beach', -33.950198, 151.259302, 1]
	];

	function setMarkers(map, locations) {
	  // Add markers to the map

	  // Marker sizes are expressed as a Size of X,Y
	  // where the origin of the image (0,0) is located
	  // in the top left of the image.
	  for (var i = 0; i < locations.length; i++) {
	    var beach = locations[i];
	    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
	    var marker = new google.maps.Marker({
	        position: myLatLng,
	        map: map,
	        title: beach[0],
	        zIndex: beach[3]
	    });
	  }
	}

	google.maps.event.addDomListener(window, 'load', init);
</script>
</head>
<body>

	<?php require("navbar.html"); ?>

	<div id="map-canvas"/>
</body>
</html>