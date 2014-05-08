<?php
require_once("php/vars.php");

// Connect to server and select databse.
mysql_connect("localhost", "$MysqlUser", "$MysqlUPass")or die("Error: Cannot connect to Mysql!!!"); 
mysql_select_db("$MysqlDB")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

//echo $myusername."<br>";
//echo $mypassword."<br>";

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $MysqlUserDB WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
//echo $count;

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

  // Register $myusername, $mypassword and redirect to file "login_success.php"
  //session_register("myusername");
  //session_register("mypassword"); 
  //header("location:login_success.php");
  header("location:index.php");
} else {
  echo "Wrong Username or Password. Try again.";
}

?>
