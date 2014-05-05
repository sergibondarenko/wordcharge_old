<?php 
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
header("location:index.php");
?>
<!--<html>
<head>
</head>
<body>
<h2>Loged Out</h2>
<a href="index.php">Home</a>
</body>
</html>-->
