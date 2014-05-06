<?php
include_once("config.php");
checkLoggedIn("yes");
flushMemberSession();
header("Location: login.php");
?>
