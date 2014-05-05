<?php
require_once("vars.php");

if(!empty($_POST['myusername']) && !empty($_POST['mypassword'])){
  // Connect to server and select databse.
  $con = mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  // username and password sent from form 
  $myusername=$_POST['myusername']; 
  $mypassword=$_POST['mypassword']; 
  $myemail=$_POST['myemail']; 
  
  // To protect MySQL injection (more detail about MySQL injection)
  $myusername = stripslashes($myusername);
  $mypassword = stripslashes($mypassword);
  $myemail = stripslashes($myemail);
  $myusername = mysqli_real_escape_string($con, $myusername);
  $mypassword = mysqli_real_escape_string($con, $mypassword);
  $myemail = mysqli_real_escape_string($con, $myemail);
  $sql="INSERT INTO $MysqlUserDB (username, password, email) VALUES ('$myusername', '$mypassword', '$myemail')";
  $result=mysqli_query($con, $sql);
  if(!$result){
    die('Error: makesignup.php!!! ' . mysqli_error($conF));
  }
  
  $sql="SELECT * FROM $MysqlUserDB WHERE username='$myusername' and password='$mypassword'";
  $result=mysqli_query($con, $sql);
  if(!$result){
    die('Error: makesignup.php!!! ' . mysqli_error($conF));
  }
  
  // Mysql_num_row is counting table row
  $count=mysqli_num_rows($result);

  mysqli_free_result($result);
  mysqli_close($con);
  
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count==1){
  
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    session_start();
    $_SESSION["myusername"] = $myusername;
    header("location:index.php");
  } else {
    echo "Wrong Username or Password or E-mail. Try again.";
  }
} 

?>
