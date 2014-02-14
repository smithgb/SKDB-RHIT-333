<?php
$CID = $_GET['CID'];

$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

mysql_select_db('skdb') or die(mysql_error());

$result = mysql_query("SELECT * FROM category WHERE CID=".$CID."" );

$row = mysql_fetch_array($result);

?>


<html>
<head>
	<link type = "text/css" rel = "stylesheet" href="../stylesheets/bootstrap.css" />
	<script type="text/javascript" src='../javascript/jquery.js'></script>
	<script type= 'text/javascript' src="../javascript/bootstrap.js"></script>
	<title>SKDB</title>
</head>
<body>
	
	<script type="text/javascript">$('#navbar').load('navbar.html');</script>

	<div id = 'navbar'>

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
					<a class="navbar-brand" href="/rootSKDB/index.html">SKDB</a>
				</div>


				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Killers <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/rootSKDB/azlist.php">A-Z List</a></li>
							</ul>
						</li>
						<li><a href="/rootSKDB/map.html">Map</a></li>
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

	<div class = 'container'>
	<?php
	echo "<h1>" . $row['Name'] . "</h1><br />";

	echo $row['Description'];



	mysql_close($conn);
	?>
	</div>

</body>
</html>


