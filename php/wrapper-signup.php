<?php
if(!isset($_SESSION["myusername"])){
  echo '<a href="signup-1.php?myLang='.$myLang.'">'.$langArray["textSignup"].'</a>';
} else {
  //setcookie("user", $_SESSION["myusername"], time()+60*60*24*30);
  echo '<a href="logout-1.php?myLang='.$myLang.'">'.$langArray["textLogout"].'</a>';
  $theSessionUser = $_SESSION["myusername"]; 
}
?>
