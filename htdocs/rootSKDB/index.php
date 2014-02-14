<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href="../stylesheets/bootstrap.css" />
	<script type="text/javascript" src='../javascript/jquery.js'></script>
	<script type= 'text/javascript' src="../javascript/bootstrap.js"></script>
	<title>SKDB</title>
</head>
<body>

	<?php require("navbar.html"); ?>

	<?php

	$minRand = 0;
	$maxRand = 11;

	$skotdIndex = 7;

	while($skotdIndex == 7){
		srand(date("ymd"));
		$skotdIndex = rand($minRand, $maxRand);
	}
	
	?>

</body>
</html>