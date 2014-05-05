<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>

    <h2>WordCharge</h2>
    <p>The goal of the WordCharge project is to help learning new words in different foreign languages.</p>
    <?php include("php/footer.php"); ?>
  </div>

</body>
</html>
