<?php
session_start();
include("php/setsitelanguage.php");
$langId="en"."-".$myLang;
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
<body>
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
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/hamlet.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/en/hamlet.txt">
        <img src="bookscovers/hamlet.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">The Tragedy of Hamlet, Prince of Denmark. Written by William Shakespeare at an uncertain date between 1599 and 1602.
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/kinglear.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/en/kinglear.txt">
        <img src="bookscovers/kinglear.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">King Lear. The Tragedy written by William Shakespeare at an uncertain date between 1603 and 1606.
    </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/macbeth.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/en/macbeth.txt">
        <img src="bookscovers/macbeth.jpg" alt="The Tragedy of Macbeth" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">The Tragedy of Macbeth. Written by William Shakespeare at an uncertain date between 1599 and 1606.
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/merchantofvenice.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/en/merchantofvenice.txt">
        <img src="bookscovers/merchantofvenice.jpg" alt="The Merchant of Venice" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">The Merchant of Venice. Written by William Shakespeare at an uncertain date between 1596 and 1598.
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/en/midsummernightdream.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/en/midsummernightdream.txt">
        <img src="bookscovers/midsummernightdream.jpg" alt="A Midsummer Night's Dream" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">A Midsummer Night's Dream is a comedy written by William Shakespeare at an uncertain date between 1590 and 1596.
      </div>
    </div>

    </div>

    <h3 class="text_line"></h3>

    <?php include("php/footer.php"); ?>
  </div>



</body>
</html>
