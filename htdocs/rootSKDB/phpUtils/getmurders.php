<?php

$returnObject = array();

$conn = mysql_connect('localhost', 'root', '')or die(mysql_error());

mysql_select_db('skdb') or die(mysql_error());

$result = mysql_query('SELECT Latitude, Longitude FROM murderlocations');

if($result == False){
	mysql_close();
	echo false;
}else{
	while($row = mysql_fetch_array($result)){
		$returnObject[] = $row;
	}

	mysql_close();

	echo json_encode($returnObject);
}

?>