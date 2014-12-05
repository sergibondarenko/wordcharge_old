<?php

//Login for mobile app
//

include_once("php/vars.php");
include_once("php/functions.php");

$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
    
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$myusername = sanitize_input($_POST['username']);
$mypassword = sanitize_input($_POST['password']);

$result = mysqli_query($con,"SELECT * FROM $MysqlUserDB WHERE username='$myusername' and password='$mypassword'");

$row = mysqli_fetch_array($result);

$data = $row[0];
if($data){
    echo $data;
}

mysqli_close($con);

?>