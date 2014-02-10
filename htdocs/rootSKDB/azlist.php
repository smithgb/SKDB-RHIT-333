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

	<div>


	</body>
	</html>

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