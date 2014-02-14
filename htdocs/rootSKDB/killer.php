<?php
$SID = $_GET['SID'];

$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

mysql_select_db('skdb') or die(mysql_error());

$result = mysql_query("SELECT * FROM serialkiller WHERE SID=".$SID."" );

$row = mysql_fetch_array($result);

$birthplace = mysql_query("SELECT * FROM location WHERE Zipcode=".$row['Birthplace']."" );

$bp = mysql_fetch_array($birthplace);

$lived = mysql_query("SELECT * FROM location WHERE Zipcode=".$row['Lived']."" );

$live = mysql_fetch_array($lived);

$category = mysql_fetch_array(mysql_query("SELECT * FROM category WHERE CID=".$row['Category']."" ));

$motive = mysql_fetch_array(mysql_query("SELECT * FROM motive WHERE MID=".$row['Motive']."" ));

$disorders = mysql_query("SELECT * FROM disorder, hasdisorder WHERE hasdisorder.DID = disorder.DID AND hasdisorder.SID=".$row['SID']."" );

$victims = mysql_query("SELECT * FROM victim, kills WHERE victim.VID = kills.VID AND kills.SID=".$row['SID']."" );

$picture = $row['ImagePath'];

if($row['Gender'] == "M"){
	$gender = "Male";
}else{
	$gender = "Female";
}

?>


<html>
<head>
	<link type = "text/css" rel = "stylesheet" href="../stylesheets/bootstrap.css" />
	<script type="text/javascript" src='../javascript/jquery.js'></script>
	<script type= 'text/javascript' src="../javascript/bootstrap.js"></script>
	<title>SKDB</title>
</head>
<body>
	
	<?php require("navbar.html"); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php

				echo "<img src= ".$picture." height = 400px><br />";

				echo "<h1>" . $row['FName'] . " " . $row['MName'] . " " . $row['LName'] . "</h1>";

				echo "<h2>Alias(es): " . $row['Aliases'] . "</h2>";

				echo "<h3>Number of Victims: " . $row['NumVictims'] . "</h3>";
				
				echo "<h4>Category: <a href = '/rootSKDB/category.php?CID=" . $category['CID'] . "'>" . $category['Name'] . "</a></h4>";

				echo "<h4>Motive: <a href = '/rootSKDB/motive.php?MID=" . $motive['MID'] . "'>" . $motive['Name'] . "</h4> </a><br />";

				echo "<h4>Disorders and Factors:</h4>\n";

				//TODO ADD DISORDERS
				while($disorder = mysql_fetch_array($disorders)){
					echo "<h4><a href = '/rootSKDB/disorder.php?DID=" . $disorder['DID'] . "'>" . $disorder['Name'] . "</a></h4>\n";
				}
				echo "<br />";


				echo "<h4>Gender: " . $gender . "</h4>";

				echo "<h4>Born: " . $row['Birthday'] . "</h4>";

				//TODO find name of birthplace and lived (if null for birthplace say Unknown for Lived say No Permanent Residence)
				echo "<h4>Birthplace: " . $bp['City'] . ', ' . $bp['State'] . ', '. $bp['Country'] . '</h4>';

				echo "<h4>Lived: " . $live['City'] . ', ' . $live['State'] . ', '. $live['Country'] . '</h4>';

				echo "<h4>Years of Activity: " . $row['YearsofActivity'] . "</h4>";

				//if not arrested say Never Apprehended

				echo "<h4>Date Arrested: " . $row['DateofArrest'] . "</h4>";

				echo "<h4>Punishment: " . $row['Punishment'] . "</h4>";

				//if not dead say Alive

				echo "<h4>Died: " . $row['Died'] . "</h4><br />";

				

				?>
			</div>  
			<div class="col-md-8">
				<?php

				echo "<p>" . $row['Biography'] . "<p>";



				?>
			</div>
		</div>  
		<div id = 'row'>
			<?php

			echo "<h3>List of Victims<h3>";

			while($victim = mysql_fetch_array($victims)){
				echo "<a href = '/rootSKDB/victim.php?VID=" . $victim['VID'] . "'><h4>" . $victim['FName'] . " " . $victim['MName'] . " " . $victim['LName'] . "</a></h4>\n";
			}

			?>
			<br />
			<br />
			<br />
		</div>
	</div>

</body>
</html>


	









	<?php

	mysql_close($conn);

	?>