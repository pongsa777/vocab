<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "toeic";
// Create connection
$con = new mysqli($servername, $username, $password,$db);
$con->set_charset("utf8");
if ($con == FALSE ) {
    die("Error : Connection failed: " . mysql_error());
}else{
  //echo "Connect success";
}
?>