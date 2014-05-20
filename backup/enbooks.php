<?php
session_start();
?>
<?php include("php/setsitelanguage.php"); 
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
  <?php 
    //echo "var langId='{$langId}';";
    //echo "var myLang='{$myLang}';";
  ?>
  $(".makeDict").click(function(){
    var linkBook = $(this).siblings("a").attr("href");
    $("#myUrl").val(linkBook);
    //$("#wrapper-content").html(linkBook);
    //$.post("getbooksdict.php",
    //{
    //  langId:langId,
    //  myLang:myLang,
    //  myUrl:linkBook  
    //},
    //function(data,status){
    //  $("#wrapper-content").html(data); 
    //});
    //alert(linkBook);
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
<!--    <button class="makeDict"><?php //echo $langArray["textButtonMakeDict"];?></button></br>-->
      <form action="getbooksdict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="text" name="myUrl" id="myUrl" value="wrongValue">
      <input type="text" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="mmakeDict" class="mmakeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </form>
      </br>

      <a target="_blank" href="http://wordcharge.com/books/en/hamlet.txt">
        <img src="bookscovers/hamlet.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140">
      </a>
      <div class="bookDesc">The Tragedy of Hamlet, Prince of Denmark. Written by William Shakespeare at an uncertain date between 1599 and 1602.
      </div>
    </div>
    <div class="bookCover">
      <button class="makeDict"><?php echo $langArray["textButtonMakeDict"];?></button><br>
      <a target="_blank" href="http://wordcharge.com/books/en/kinglear.txt">
        <img src="bookscovers/kinglear.jpg" alt="The Tragedy of Hamlet, Prince of Denmark" width="100" height="140">
      </a>
      <div class="bookDesc">King Lear. The Tragedy written by William Shakespeare at an uncertain date between 1603 and 1606.
    </div>
    </div>

    </div>

    <h3 class="text_line"></h3>

    <?php include("php/footer.php"); ?>
  </div>



</body>
</html>
