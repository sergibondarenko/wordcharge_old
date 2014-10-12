<?php
require_once("vars.php");
require_once("functions.php");

$signupErr = "";
$nameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST['myusername']) || empty($_POST['mypassword']) || empty($_POST['myemail'])){
    //$signupErr = "All fields are required!";
    $signupErr = $langArray["allFieldsReq"]."!!!";
  } elseif ($_POST['captcha'] != $_SESSION['digit']){
    //$signupErr = "You typed wrong digits in Turing test!";
    $signupErr = $langArray["wrongTuring"]."!!!";
  } else {
  //if(!empty($_POST['myusername']) && !empty($_POST['mypassword'] && !empty($_POST['myemail']))){
  //if(!empty($_POST['myusername']) && !empty($_POST['mypassword'])){

    // Connect to server and select databse.
    $con = mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // change character set to utf8
    if (!mysqli_set_charset($con, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($con));
    }
    
    // username and password sent from form 
    $myusername=$_POST['myusername']; 
    $mypassword=$_POST['mypassword']; 
    $myemail=$_POST['myemail']; 

    if(!preg_match("/^[a-zA-Z]*$/",$myusername)){
      $nameErr = $langArray["checkUsername"]."!!!";
    } else {
    
      // To protect MySQL injection (more detail about MySQL injection)
      $myusername = sanitize_input($myusername);
      $mypassword = sanitize_input($mypassword);
      $myemail = sanitize_input($myemail);
  
      $myusername = mysqli_real_escape_string($con, $myusername);
      $mypassword = mysqli_real_escape_string($con, $mypassword);
      $myemail = mysqli_real_escape_string($con, $myemail);
      
      $mypassword = md5($mypassword);
  
  
      $sql="SELECT * FROM $MysqlUserDB WHERE username='$myusername'";
      $result=mysqli_query($con, $sql);
      if(!$result){
        die('Error after select: makesignup.php!!! ' . mysqli_error($conF));
      }
      
      // Mysql_num_row is counting table row
      $count=mysqli_num_rows($result);
  
      if($count == 1){
        echo "<b>"."The username is already in use, please select another!"."</b>";
      } else {
  
        $sql="INSERT INTO $MysqlUserDB (username, password, email) VALUES ('$myusername', '$mypassword', '$myemail')";
        $result=mysqli_query($con, $sql);
        if(!$result){
          die('Error: The username is already in use, please select another! ' . mysqli_error($conF));
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
          header("location:index-1.php?myLang=$myLang");
        } else {
          echo "Wrong Username or Password or E-mail. Try again. Don't use special characters in username and password fields";
        }
      }
    }
  } 
}
?>
