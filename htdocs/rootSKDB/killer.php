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
	<?php echo '<title>' . $row['FName']. ' ' . $row['LName'] .'</title>'?>
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

	<div>


<!-- Not making columns like I wanted -->

	<div class="container">
		<div class="row">
			<div class="span4">
				<?php

				echo "<img src= ".$picture." height = 400px><br />";

				echo "<h1>" . $row['FName'] . " " . $row['MName'] . " " . $row['LName'] . "</12>";

				echo "<h2>Alias(es): " . $row['Aliases'] . "</h2>";

				echo "<h3>Number of Victims: " . $row['NumVictims'] . "</h3>";
				
				echo "<h4>Category: <a href = '/rootSKDB/category.php?CID=" . $category['CID'] . "'>" . $category['Name'] . "</a></h4>";

				echo "<h4>Motive: <a href = '/rootSKDB/motive.php?MID=" . $motive['MID'] . "'>" . $motive['Name'] . "</h4> </a><br />";

				//TODO ADD DISORDERS


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
			<div class="span6">
				<?php

				echo "<p>" . $row['Biography'] . "<p>";



				?>
			</div>
		</div>  
	</div>

</body>
</html>









	<?php

	mysql_close($conn);

	?>