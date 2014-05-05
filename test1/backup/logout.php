<?php
include_once("php/config_login.php");
checkLoggedIn("yes");
flushMemberSession();
header("Location: login.php");
?>
