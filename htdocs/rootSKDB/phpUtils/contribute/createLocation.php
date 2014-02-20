<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$conn = mysqli_connect('localhost','root','') or die(mysql_error());

		if(is_numeric($_POST['city']) or is_numeric($_POST['state']) or is_numeric($_POST['country']))
			header('Location: index.php');
		else{
			$city = mysqli_real_escape_string($conn, $_POST['city']);
			$state = mysqli_real_escape_string($conn, $_POST['state']);
			$country = mysqli_real_escape_string($conn, $_POST['country']);
		}
		if(!is_numeric($_POST['zip']))
			header('Location: index.php');
		else
			$zip = mysqli_real_escape_string($conn, $_POST['zip']);

		$latitude = (empty($_POST['lat']) == true ? 0 : (is_float($_POST['lat']) == true ? $_POST['lat'] : 0));
		$longitude = (empty($_POST['long']) == true ? 0 : (is_float($_POST['long']) == true ? $_POST['long'] : 0));

		mysql_select_db('skdb') or die(mysql_error());

		mysqli_query($conn, "CALL createLocation('" . $country . "','" . $state . "','" . $city . "','" . $zip . "','" . $latitude . "','" . $longitude . "')");

	}

	header('Location: ../../index.php');
?>