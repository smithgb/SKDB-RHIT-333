<!DOCTYPE html>
<html>
<head>
	<?php require('partials/bootstrapTheme.html') ?>
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
	var murderLocations = new Array();

	function getMapData(){
		$.get('phpUtils/getmurders.php')
		.done(function(returnData){
			saveReturnData(JSON.parse(returnData));
			init();
		});
	}

	function saveReturnData(input){
		for(var i = 0; i < input.length; i++){
			murderLocations[i] = ['',input[i]['Latitude'],input[i]['Longitude'],i+1];
		}
	}

	function init() {
		var mapCenter = new google.maps.LatLng(39.390200,-97.539063);
		var mapOptions = {
		zoom: 4,
		center: mapCenter,
		mapTypeId: google.maps.MapTypeId.HYBRID
		};

		var map = new google.maps.Map(document.getElementById('map-canvas'),
		                            mapOptions);

		setTimeout(function(){
			setMarkers(map, murderLocations);
		}, 1000);
	}

	function setMarkers(map, locations) {
	  for (var i = 0; i < locations.length; i++) {
	    var coordinate = locations[i];
	    var myLatLng = new google.maps.LatLng(coordinate[1], coordinate[2]);
	    var marker = new google.maps.Marker({
	        position: myLatLng,
	        map: map,
	        animation: google.maps.Animation.DROP,
	        zIndex: coordinate[3]
	    });
	  }
	}

	google.maps.event.addDomListener(window, 'load', getMapData);
</script>
</head>
<body>

	<?php require("partials/navbar.html"); ?>

	<div id="map-canvas"/>
</body>
</html>