<?php
include_once("config.php");
checkLoggedIn("yes");
print("<b>".$_SESSION["login"]."</b>! Добро пожаловать<br>\n");
print("Ваш пароль: <b>".$_SESSION["password"]."</b><br>\n");
print("<a href=\"logout.php"."\">Выход</a>");
?>
