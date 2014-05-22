<?php
session_start();
include("php/setsitelanguage.php");
$langId="it"."-".$myLang;
?>

<html>
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <script src="js/functions.js"></script>

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
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/decamerone.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/it/decamerone.txt">
        <img src="bookscovers/ildecameron.jpg" alt="Il Decamerone" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">Il Decamerone o Decameron è una raccolta di cento novelle scritta nel XIV secolo, probabilmente tra il 1349 da Giovanni Boccaccio. 
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/ladivinacommedia.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/it/ladivinacommedia.txt">
        <img src="bookscovers/ladivinacommedia.jpg" alt="La Comedìa" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">La Comedìa è un poema di Dante Alighieri, scritto in terzine incatenate di versi endecasillabi, in lingua volgare fiorentina. Composta secondo i critici tra il 1304 e il 1321.
    </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/ilnomedellarosa.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/it/ilnomedellarosa.txt">
        <img src="bookscovers/ilnomedellarosa.jpg" alt="l nome della rosa" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">l nome della rosa è un romanzo scritto da Umberto Eco ed edito per la prima volta da Bompiani nel 1980.
      </div>
    </div>
    <div class="bookCover">
      <form action="getuniversaldict.php?myLang=<?php echo $myLang;?>" method='post' target='_blank'>
      <input type="hidden" name="myUrl" id="myUrl" value="http://wordcharge.com/books/it/i_viaggi_e_la_carta_dei_fratelli_zeno_veneziani.txt">
      <input type="hidden" name="langId" value="<?php echo $langId;?>">
      <input type="submit" name="makeDict" class="makeDict" value="<?php echo $langArray["textButtonMakeDict"];?>">
      </br>
      <a target="_blank" href="http://wordcharge.com/books/it/i_viaggi_e_la_carta_dei_fratelli_zeno_veneziani.txt">
        <img src="bookscovers/i_viaggi_e_la_carta_dei_fratelli_zeno_veneziani.jpg" alt="I fratelli Nicolò Zeno" width="100" height="140">
      </a>
      </form>
      <div class="bookDesc">I fratelli Nicolò Zeno furono due navigatori veneziani del XIV secolo, impegnati nell'esplorazione dell'Atlantico del nord e dei mari artici attorno al 1390.
      </div>
    </div>

    </div>

    <h3 class="text_line"></h3>

    <?php include("php/footer.php"); ?>
  </div>



</body>
</html>
