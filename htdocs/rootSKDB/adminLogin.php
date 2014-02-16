<html>
<head>
	<?php require('partials/bootstrapTheme.html') ?>
	<script type="text/javascript" src='../javascript/sha512.js'></script>
	<script type="text/javascript" src='../javascript/utils.js'></script>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$pass = $_POST['password'];
			$hashedPass = hash('sha512', $pass);

			$conn = mysqli_connect('localhost','root','') or die(mysql_error());

			mysqli_select_db($conn, 'skdb') or die(mysql_error());

			$result = mysqli_query($conn, 'SELECT HashedPassword FROM adminpassword');
			if($result){
				header('Location: input.php');
			}
		}
	?>
</head>
<title></title>
<body>
	<?php require("partials/navbar.html"); ?>

	<br />
	<div class="col-md-2 col-md-offset-5">
		<form role='form' id='adminForm' action='' method='post'>
			<div class="form-group">
				<label for='adminPass'>Password</label>
				<input type="password" name='password' class="form-control" id="adminPass" placeholder='Enter password' />
			</div>
			<input type='submit' class="btn btn-default" />
		</form>
	</div>
</body>
</html>