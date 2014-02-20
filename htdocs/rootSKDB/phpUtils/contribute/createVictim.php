<?php
	function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$conn = mysqli_connect('localhost','root','') or die(mysql_error());

		if(is_numeric($_POST['fname']) or is_numeric($_POST['mname']) or is_numeric($_POST['lname'])
		or is_numeric($_POST['gender']) or is_numeric($_POST['relation']) or is_numeric($_POST['cause']))
			header('Location: index.php');
		else{
			$fname = mysqli_real_escape_string($conn, $_POST['fname']);
			$mname = mysqli_real_escape_string($conn, $_POST['mname']);
			$lname = mysqli_real_escape_string($conn, $_POST['lname']);
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$relation = mysqli_real_escape_string($conn, $_POST['relation']);
			$cause = mysqli_real_escape_string($conn, $_POST['cause']);
			
		}
		if(!is_numeric($_POST['age']) or !is_numeric($_POST['serialkiller']) or !is_numeric($_POST['deathloc'])
		or !is_numeric($_POST['yrsactive']) or)
			header('Location: index.php');
		else
			$age = mysqli_real_escape_string($conn, $_POST['age']);
			$serialkiller = mysqli_real_escape_string($conn, $_POST['serialkiller']);
			$deathloc = mysqli_real_escape_string($conn, $_POST['deathloc']);
			$yrsactive = mysqli_real_escape_string($conn, $_POST['yrsactive']);

		$img = "images/default.jpg";
		if(validateDate($_POST['deathdate']))
			$deathdate = mysqli_real_escape_string($conn, $_POST['deathdate']);

		mysql_select_db('skdb') or die(mysql_error());

		mysqli_query($conn, "CALL insertVictim('" . $fname . "','" . $mname . "','" . $lname . "','" . $gender . "','" . $age . "','" . $deathdate . "','" . $deathloc . "','" . $relation . "','" . $cause . "','" . $img . "')");
	}

	header('Location: ../../index.php');
?>