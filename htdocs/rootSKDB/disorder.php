<?php
$DID = $_GET['DID'];

$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

mysql_select_db('skdb') or die(mysql_error());

$result = mysql_query("SELECT * FROM disorder WHERE DID=".$DID."" );

$row = mysql_fetch_array($result);

?>




<html>
<head>
	<?php require('bootstrapTheme.html') ?>
	<title>SKDB</title>
</head>
<body>
	
	<?php require("navbar.html"); ?>

	<div class = 'container'>
	<?php
	echo "<h1>" . $row['Name'] . "</h1><br />";

	echo $row['Description'];



	mysql_close($conn);
	?>
	</div>


</body>
</html>



