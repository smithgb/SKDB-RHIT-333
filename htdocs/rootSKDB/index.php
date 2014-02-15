<!DOCTYPE html>
<html>
<head>
	<link type = "text/css" rel = "stylesheet" href="../stylesheets/bootstrap.css" />
	<script type="text/javascript" src='../javascript/jquery.js'></script>
	<script type= 'text/javascript' src="../javascript/bootstrap.js"></script>
	<title>SKDB</title>
	<?php

	$minRand = 0;
	$maxRand = 11;

	$skotdID = 7;

	while($skotdID == 7){
		srand(date("ymd"));
		$skotdID = rand($minRand, $maxRand);
	}

	$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

	mysql_select_db('skdb') or die(mysql_error());

	$skotdResult = mysql_query("SELECT SID, FName, MName, LName, NumVictims, ImagePath FROM serialkiller WHERE SID = " . $skotdID);

	$row = mysql_fetch_array($skotdResult);

	$picture = $row['ImagePath'];
	
	mysql_close($conn);
	
	?>
</head>
<body>

	<?php require("navbar.html"); ?>

	<?php
		echo '<div style="margin-left: 1%; margin-right: auto;">';

		echo '<h2>Serial Killer of the Day</h2>';

		echo '<a href="killer.php?SID=' . $row['SID'] . '" >';
		echo '<img src = ' . $picture . ' class="img-circle img-thumbnail" /></a><br />';
	
		echo '<h3>' . $row['FName'] . ' ' . $row['MName'] . ' ' . $row['LName'] . '</h3>';
	
		echo '<h4>Number of Victims: ' . $row['NumVictims'] . '</h4>';

		echo '</div>';
	?>

</body>
</html>