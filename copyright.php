<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body id="bodyAbout">
<div id="super-main">
  <?php include("php/setsitelanguage.php"); ?>
    <div id="wrapper-langs">
      <?php include_once("php/wrapper-languages.php"); ?>
    </div>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>

    <h2>WordCharge</h2>

    <h3>&copy; Copyright</h3>
    
    <ol> 
    <li>No part of this website or any of its contents may be reproduced, copied, modified or adapted, without the prior written consent of the author, unless otherwise indicated for stand-alone materials.</li>
    <li>Commercial use and distribution of the contents of the website is not allowed without express and prior written consent of the author.</li>
    <li>For any mode of commercial use, please contact the author at the email below.</li>
    </ol>

    <a href="mailto:sergibondarenko@gmail.com">sergibondarenko@gmail.com</a>

    <h3>&copy; Авторское право</h3>
    <ol>
    <li>Никакая часть данного веб-сайта (сервиса) или его содержание не может быть воспроизведена, копирована, модифицирована или адаптированы, без предварительного письменного согласия автора.</li>
    <li>Коммерческое использование и распространение содержимого сервиса не допускается без специального и письменного согласия автора.</li>
    <li>Для любого вида коммерческого использования, пожалуйста, свяжитесь с автором по адресу электронной почты ниже.</li>
    </ol>
    <a href="mailto:sergibondarenko@gmail.com">sergibondarenko@gmail.com</a>
    
    <?php include("php/footer.php"); ?>
  </div>
</div>

</body>
</html>
