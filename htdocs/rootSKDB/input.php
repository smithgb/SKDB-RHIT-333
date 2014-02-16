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
</body>
</html>