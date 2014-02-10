<?php
$VID = $_GET['VID'];

$conn = mysql_connect('localhost', 'skdb333x_grant', 'pyhml249213')or die(mysql_error());

mysql_select_db('skdb333x_skdb') or die(mysql_error());

$result = mysql_query("SELECT * FROM victim WHERE VID=".$VID."" );

$row = mysql_fetch_array($result);

$picture = $row['ImagePath'];

$location = mysql_fetch_array(mysql_query("SELECT * FROM location WHERE Zipcode=".$row['LocationofMurder']."" ));

?>


<html>
<head>
	<link type = "text/css" rel = "stylesheet" href="../stylesheets/bootstrap.css" />
	<script type="text/javascript" src='../javascript/jquery.js'></script>
	<script type= 'text/javascript' src="../javascript/bootstrap.js"></script>
	<title>SKDB</title>
</head>
<body>
	<div>
		<!-- website logo -->
		<img src="images/logo.jpg" alt="SKDB_logo">

		<!-- navbar -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- NAV HEAD -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">SKDB</a>
				</div>


				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Killers <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/rootSKDB/azlist.php">A-Z List</a></li>
								<li><a href="#">Year by Year</a></li>
							</ul>
						</li>
						<li><a href="#">Map</a></li>
					</ul>
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">
							Submit
						</button>
					</form>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>

<div class="container">
		<div class="row">
			<div class="col-md-4">
				<?php

				echo "<img src= ".$picture." height = 400px><br />";
				

				?>
			</div>  
			<div class="col-md-8">
				<?php

				echo "<h1>" . $row['FName'] . " " . $row['MName'] . " " . $row['LName'] . "</h1>";

				echo "<h4>Age: " . $row['Age'] . "</h3>";

				echo "<h4>Gender: " . $row['Gender'] . "</h3>";

				echo "<h4>Date of Death:" . $row['DateofDeath'] . "</h3>";

				echo "<h4>Location of Murder: " . $location . "</h3>";

				echo "<h3>Cause of Death" . $row['CauseOfDeath'] . "</h3>";

				echo "<h3>Relation to Killer" . $row['RelationToKiller'] . "</h3>";

				?>
			</div>
		</div>  


</body>
</html>