<?php
$VID = $_GET['VID'];

$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

mysql_select_db('skdb') or die(mysql_error());

$result = mysql_query("SELECT * FROM victim WHERE VID=".$VID."" );

$row = mysql_fetch_array($result);

if ($row['ImagePath'] == null){
	$picture = 'images/default.jpg';
}else{
	$picture = $row['ImagePath'];
}

$location = mysql_fetch_array(mysql_query("SELECT * FROM location WHERE Zipcode=".$row['LocationofMurder']."" ));

?>


<html>
<head>
	<?php require('partials/bootstrapTheme.html') ?>
	<title>SKDB</title>
</head>
<body>

	<?php require("partials/navbar.html"); ?>
	

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php

				echo "<img src= ".$picture." height = 400px><br />";
				

				?>
			</div>  
			<div class="col-md-8">
				<?php

				echo "<h1>" . $row['FName'] . " " . $row['MName'] . " " . $row['LName'] . "</h1><br />";

				echo "<h4>Age: " . $row['Age'] . "</h3>";

				echo "<h4>Gender: " . $row['Gender'] . "</h3><br />";

				echo "<h4>Date of Death: " . $row['DateofDeath'] . "</h3>";

				echo "<h4>Location of Murder: " . $location['City'] . ', ' . $location['State'] . ', '. $location['Country'] . "</h3><br />";

				echo "<h3>Cause of Death: " . $row['CauseOfDeath'] . "</h3>";

				echo "<h3>Relation to Killer: " . $row['RelationToKiller'] . "</h3>";

				?>
			</div>
		</div>  


</body>
</html>