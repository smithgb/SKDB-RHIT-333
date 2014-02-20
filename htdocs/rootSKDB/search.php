<?php
//ESTABLISH DATABASE CONNECTION
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "skdb");

//Connect to mysql server
$link=@mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$link) {
 print("Failed to establish connection to mysql server!");
 exit();
}

if(isset($_POST['keyword'])){
 $keyword = trim($_POST['keyword']);
 $keyword = mysqli_real_escape_string($link, $keyword);
 $query = "select FName,LName,SID from serialkiller where LName like '$keyword%' OR FName like '$keyword%'"; //MUST BEGIN WITH $KEYWORD
//echo $query;
 $result = mysqli_query($link,$query);

 if($result){
 if(mysqli_affected_rows($link)!=0){
 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
 	$site = '<a class="meterRow" href="killer.php?SID=' . $row['SID'] .'">';
 echo '<span>'.$site.$row['FName'].' '.'<span>'.$row['LName'].'</a></span></span><br />';
 }
 }else {
 echo 'No Results for :"'.$_POST['keyword'].'"';
 }
 }
}else {
 echo 'Parameter Missing';
}
?>