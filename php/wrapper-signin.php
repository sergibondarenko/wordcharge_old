<?php
if(!isset($_SESSION["myusername"])){
  echo '<a href="login-1.php?myLang='.$myLang.'">'.$langArray["textLogin"].'</a>';
} else {
  setcookie("user", $_SESSION["myusername"], time()+60*60*24*30);
  echo "<span style='color:white'>" . $_SESSION["myusername"] . "</span>";
  $theSessionUser = $_SESSION["myusername"]; 
}
?>
