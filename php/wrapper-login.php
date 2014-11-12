<?php
/*if(!isset($_SESSION["myusername"])){
  echo '<a href="login.php">Login</a>&nbsp;|&nbsp;<a href="signup.php">Sign Up</a>';
} else {
  echo $_SESSION["myusername"].'&nbsp;|&nbsp;<a href="logout.php">Log Out</a>';
  $theSessionUser = $_SESSION["myusername"]; 
}*/
if(!isset($_SESSION["myusername"])){
  echo '<a href="login.php?myLang='.$myLang.'">'.$langArray["textLogin"].'</a>&nbsp;|&nbsp;<a href="signup.php?myLang='.$myLang.'">'.$langArray["textSignup"].'</a>';
} else {
  setcookie("user", $_SESSION["myusername"], time()+60*60*24*30);
  echo $_SESSION["myusername"].'&nbsp;|&nbsp;<a href="logout.php?myLang='.$myLang.'">'.$langArray["textLogout"].'</a>';
  $theSessionUser = $_SESSION["myusername"]; 
}
?>
