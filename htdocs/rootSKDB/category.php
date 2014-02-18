<?php
$CID = $_GET['CID'];

$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

mysql_select_db('skdb') or die(mysql_error());

$result = mysql_query("SELECT * FROM category WHERE CID=".$CID."" );

$row = mysql_fetch_array($result);

?>


<html>
<head>
	<?php require('partials/bootstrapTheme.html') ?>
	<title>SKDB</title>
</head>
<body>
	
	<?php require("partials/navbar.html"); ?>

	<div class = 'container'>
	<?php
	echo "<h1>" . $row['Name'] . "</h1><br />";

	echo $row['Description'];



	mysql_close($conn);
	?>
	</div>

</body>
</html>


