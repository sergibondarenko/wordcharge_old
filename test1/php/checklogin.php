<?php
require_once("vars.php");
require_once("functions.php");

//if(isset($_POST['myusername'] && isset($_POST['mypassword'])){
if(!empty($_POST['myusername']) && !empty($_POST['mypassword'])){
  // Connect to server and select databse.
  //mysql_connect("localhost", "$MysqlUser", "$MysqlUPass")or die("Error: Cannot connect to Mysql!!!"); 
  //mysql_select_db("$MysqlDB")or die("cannot select DB");
  $con = mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  // username and password sent from form 
  $myusername=$_POST['myusername']; 
  $mypassword=$_POST['mypassword']; 
  
  
  // To protect MySQL injection (more detail about MySQL injection)
  //$myusername = strip_tags(stripslashes($myusername));
  //$mypassword = strip_tags(stripslashes($mypassword));
  //$myusername = mysql_real_escape_string($myusername);
  //$mypassword = mysql_real_escape_string($mypassword);
  $myusername = sanitize_input($myusername);
  $mypassword = sanitize_input($mypassword);
  $myusername = preg_replace('/[^a-z0-9 ]/i', '', $myusername);
  $mypassword = preg_replace('/[^a-z0-9]/i', '', $mypassword);

  $myusername = mysqli_real_escape_string($con, $myusername);
  $mypassword = mysqli_real_escape_string($con, $mypassword);

  $mypassword = md5($mypassword);
  $sql="SELECT * FROM $MysqlUserDB WHERE username='$myusername' and password='$mypassword'";
  //$result=mysql_query($sql);
  $result=mysqli_query($con, $sql);
  if(!$result){
    die('Error: checkconfig.php ' . mysqli_error($conF));
  }
  
  // Mysql_num_row is counting table row
  //$count=mysql_num_rows($result);
  $count=mysqli_num_rows($result);
  mysqli_free_result($result);
  mysqli_close($con);
  //echo $count;
  
  // If result matched $myusername and $mypassword, table row must be 1 row
  if($count==1){
  
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    //session_register("myusername");
    //session_register("mypassword"); 
    session_start();
    $_SESSION["myusername"] = $myusername;
    header("location:index.php");
  } else {
    echo "Wrong Username or Password. Try again.";
  }
} 

?>
