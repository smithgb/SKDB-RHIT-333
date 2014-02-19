<!DOCTYPE html>
<html>
<head>
	<?php require('partials/bootstrapTheme.html') ?>

	<title></title>
</head>
<body>
	<?php require("partials/navbar.html"); ?>

	<?php
	if(!(substr($_SERVER['HTTP_REFERER'], -14) === 'adminLogin.php')){
		header('Location: index.php');
	}
	?>

	<!-- Nav pills -->
	<ul class="nav nav-pills">
		<li class="active">
			<a href="#skpane" data-toggle="pill">Serial Killer</a>
		</li>
		<li>
			<a href="#vpane" data-toggle="pill">Victim</a>
		</li>
		<li>
			<a href="#locpane" data-toggle="pill">Location</a>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'>
				Edit <b class='caret'></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="#editsk" data-toggle='pill'>Serial Killer</a>
				</li>
				<li>
					<a href="#editv" data-toggle='pill'>Victim</a>
				</li>
				<li>
					<a href="#editloc" data-toggle='pill'>Location</a>
				</li>
			</ul>
		</li>
	</ul>

	<!-- pill panes -->
	<div class="tab-content">
		<!-- add data panes -->
		<div class="tab-pane fade in active" id="skpane">
			<?php require 'partials/contribute/addSerialKiller.html' ?>
		</div>
		<div class="tab-pane fade" id="vpane">
			<?php require 'partials/contribute/addVictim.html' ?>
		</div>
		<div class="tab-pane fade" id='locpane'>
			<?php require 'partials/contribute/addLocation.html' ?>
		</div>
		<!-- edit data panes -->
		<div class="tab-pane fade" id='editsk'>editsk</div>
		<div class="tab-pane fade" id='editv'>editv</div>
		<div class="tab-pane fade" id='editloc'>editloc</div>
	</div>
</body>
</html>