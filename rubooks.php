<?php
session_start();
include("php/setsitelanguage.php");
$langId="ru"."-".$myLang;
?>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <script src="js/functions.js"></script>

<script>
/*$(document).ready(function(){
  $(".makeDict").click(function(){
    var linkBook = $(this).siblings("a").attr("href");
    $("#myUrl").val(linkBook);
  });
});*/
</script>

</head>
<body id="bodyBooks">
  <div id="wrapper-langs">
    <?php include_once("php/wrapper-languages.php"); ?>
  </div>

  <?php include("php/header.php"); ?>
  <div id="wrapper-main">
    <div id="wrapper-login">
      <?php include_once("php/wrapper-login.php");?>
    </div>

    <h2>WordCharge</h2>
    <div id="wrapper-content">

    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/idiot.html">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/ru/idiot.txt">
        <img src="bookscovers/ru_idiot.jpg" alt="Идиот" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">"Идиoт" — роман Фёдора Михайловича Достоевского, впервые опубликован с января 1868 года.
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/igrok.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/ru/igrok.txt">
        <img src="bookscovers/ru_igrok.jpg" alt="Игрок" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">"Игрок" — роман русского писателя Фёдора Михайловича Достоевского, впервые опубликованный в 1866 году.
    </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/karams.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/ru/karams.txt">
        <img src="bookscovers/ru_bratya_karamazovi.jpg" alt="Братья Карамазовы" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">"Братья Карамазовы" — последний роман Ф. М. Достоевского, который автор писал два года. Роман был окончен в ноябре 1880 года.
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/ru/prestup.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/ru/prestup.txt">
        <img src="bookscovers/ru_prestuplenie_i_nakazanie.jpg" alt="Преступление и наказание" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">"Преступление и наказание" — роман Фёдора Михайловича Достоевского, впервые опубликованный в 1866 году. 
      </div>
    </div>
    </div>

    <h3 class="text_line"></h3>

    <?php include("php/footer.php"); ?>
  </div>



</body>
</html>
