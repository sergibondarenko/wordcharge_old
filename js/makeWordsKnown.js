$(document).ready(function(){
  $("span.iKnowTheWord").on("click", function() {
      // Take values from a table and post it into iknowtheword.php
      // to fill the MySQL table of known words                    
      var aWord = $(this).closest('tr').find('span.tdWord').html();                    
      var aFreq = $(this).closest('tr').find('span.tdFreq').html();                    
      var aText = $(this).closest('tr').find('span.tdText').html();                    

      // Fill the MySQL table of known words
      $.post("php/iknowtheword.php",
      {
        word:aWord,
        freq:aFreq,
        text:aText,
        langId:langId,
        myLang:myLang,
        theSessionUser:theSessionUser
      },
      function(data,status){
        $("#wordSaveStatus").html(data);
      }); 

      $(this).closest('tr').find('td').fadeOut(1000, function(){ 
          // Remove the known word from the html table
          $(this).parents('tr:first').remove();                    
      });    
      return false;
    });
});
