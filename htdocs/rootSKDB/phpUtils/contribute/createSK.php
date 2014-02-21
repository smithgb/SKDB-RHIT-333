<?php
	function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$conn = mysqli_connect('localhost','root','') or die(mysql_error());

		if(is_numeric($_POST['fname']) or is_numeric($_POST['mname']) or is_numeric($_POST['lname'])
		or is_numeric($_POST['aliases']) or is_numeric($_POST['gender']) or is_numeric($_POST['bio']))
			header('Location: index.php');
		else{
			$fname = mysqli_real_escape_string($conn, $_POST['fname']);
			$mname = mysqli_real_escape_string($conn, $_POST['mname']);
			$lname = mysqli_real_escape_string($conn, $_POST['lname']);
			$aliases = mysqli_real_escape_string($conn, $_POST['aliases']);
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$bio = mysqli_real_escape_string($conn, $_POST['bio']);
		}
		if(!is_numeric($_POST['numV']) or !is_numeric($_POST['birthzip']) or !is_numeric($_POST['livezip'])
		or !is_numeric($_POST['yrsactive']) or !is_numeric($_POST['cat']) or !is_numeric($_POST['motive']))
			header('Location: index.php');
		else
			$numV = mysqli_real_escape_string($conn, $_POST['numV']);
			$birthzip = mysqli_real_escape_string($conn, $_POST['birthzip']);
			$livezip = mysqli_real_escape_string($conn, $_POST['livezip']);
			$yrsactive = mysqli_real_escape_string($conn, $_POST['yrsactive']);
			$cat = mysqli_real_escape_string($conn, $_POST['cat']);
			$motive = mysqli_real_escape_string($conn, $_POST['motive']);
		
		if(!validateDate($_POST['birthdate']) or !validateDate($_POST['arrestdate']) or !validateDate($_POST['deathdate']))
			header('Location: index.php');
		else
			$birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
			$arrestdate = mysqli_real_escape_string($conn, $_POST['arrestdate']);
			$deathdate = mysqli_real_escape_string($conn, $_POST['deathdate']);
			
		$img = mysqli_real_escape_string($conn, $_POST['img']);

		mysql_select_db('skdb') or die(mysql_error());

		mysqli_query($conn, "CALL insertSerialKiller('" . $fname . "','" . $mname . "','" . $lname . "','" . $aliases . "','" . $gender . "','" . $birthdate . "','" . $birthzip . "','" . $livezip . "','" . $numV . "','" . $yrsactive . "','" . $deathdate . "','" . $arrestdate . "','" . $punishment . "','" . $cat . "','" . $motive . "','" . $bio . "','" . $img . "')");
	}

	mysqli_close($conn);
	header('Location: ../../index.php');
?>