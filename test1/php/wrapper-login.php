<?php
if(!isset($_SESSION["myusername"])){
  echo '<a href="login.php">Login</a>&nbsp;|&nbsp;<a href="signup.php">Sign Up</a>';
} else {
  echo $_SESSION["myusername"].'&nbsp;|&nbsp;<a href="logout.php">Log Out</a>';
}
?>
