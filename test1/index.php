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
    <!--<h1>Welcome to W3Schools</h1>--> 
    <h2>WordCharge</h2>
    <p>You can learn dictionary for a books.</p>
    <p>You can learn dictionary for a news.</p>
    <p></p>    
    <p>Or copy text and make a custom dictionary:</p>
    
   <form action="newdict.php" method="post">
<!--    <form action="pbar.php" method="post">-->
        <div id="wrapper-langSelect">
            Select a language:
            <select id="langId" name="langId">
                <option value="de-en">German</option>
                <option value="es-en">Spanish</option>
                <option value="it-en">Italian</option>
                <option value="fr-en">French</option>
                <!--<option value="ru-en">Russian</option>-->
                <option value="en-ru" selected>En-Ru</option>
            </select>
        </div>
        <div id="wrapper-textArea">
            <textarea rows="9" cols="70" placeholder="Copy your text in this field ..." 
                    name="textArea" id="textArea"></textarea>
        </div>
        <div id="wrapper-makeDict">
            <!--<a href="#" id="makeDict">Make Dict</a>-->
            <input type="submit" value="Make Dict">
        </div>
    </form>

    <?php include("php/footer.php"); ?>
  </div>

</body>
</html>
