$(document).ready(function(){

  var wordIndex = 2;
  var wordsTotal = <?php echo $numRows ?>;
  document.getElementById("wordsTotal").innerHTML = "<small><?php echo $langArray["WordsTestTotal"];?>" + wordsTotal + "</small>";
  var flashWordsJS = <?php echo json_encode($flashWordsPHP, JSON_PRETTY_PRINT) ?>;
  document.getElementById("wordField").innerHTML = flashWordsJS[wordIndex].word;
  document.getElementById("textField").innerHTML = "<?php echo $langArray["WordsTestText"]; ?>";

  $("#showText").click(function(){
    $("#textField").html(flashWordsJS[wordIndex].text);
  });
  $("#showNext").click(function(){
    if(wordIndex <= wordsTotal){
      wordIndex++;
    } else {
      wordIndex = 2;
    }

    //if(flashWordsJS[wordIndex].word === "undefined"){
    //    wordIndex++;
    //    console.log("Undefined flashWordsJS!!!");
    //} 

    $("#wordField").html(flashWordsJS[wordIndex].word);
    $("#textField").html("<br>");
    console.log(wordIndex);
    
  });
});
