<html>
<head>
	<?php require('partials/bootstrapTheme.html') ?>
	<title>SKDB</title>
</head>
<body>
	
	<?php require("partials/navbar.html"); ?>

	<div class="container">
		<div class="row vertical-center-row">
			<div class="col-lg-40">
				<div class="row ">
					<div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4">
						<?php

						$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

						mysql_select_db('skdb') or die(mysql_error());

						$result = mysql_query("SELECT * FROM serialkiller GROUP BY LName ASC");

						$previous = null;
						while ($row = mysql_fetch_array($result))
						{
							$firstLetter = substr($row['LName'], 0, 1);
							if(strtoupper($previous) !== strtoupper($firstLetter)){
								echo "<br />";
								echo "<u><h2>".$firstLetter."</h2></u></br>";
							} 
							$previous = $firstLetter;
							echo "<a href = '/rootSKDB/killer.php?SID=" . $row['SID'] . "'><h4>" . $row['LName']. ", " . $row['FName'] . "</h4></a>";
						} 

						mysql_close($conn);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</br>
</br>

</body>
</html>
