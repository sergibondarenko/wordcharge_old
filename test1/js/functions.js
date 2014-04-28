$(document).ready(function(){

//
//
// Delete known words by clicking yes hyperlink
  $(function() {
    $('span.iKnowTheWord').live('click', function() {  
    //$('span.iKnowTheWord').click(function() {  
      
      //var aWord = $(this).html();
      //alert(aWord);
      $(this).closest('tr').find('td').fadeOut(1000, 
        function(){ 
  
          // Take values from a table and post it into iknowtheword.php
          // to fill the MySQL table of known words                    
          var aWord = $(this).closest('tr').find('span.tdWord').html();                    
          var aFreq = $(this).closest('tr').find('span.tdFreq').html();                    
          var aText = $(this).closest('tr').find('span.tdText').html();                    

          // Remove the known word from the html table
          $(this).parents('tr:first').remove();                    
         
          // Fill the MySQL table of known words
          $.post("php/iknowtheword.php",
          {
            word:aWord,
            freq:aFreq,
            text:aText
          },
          function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
            //alert(data);
            //$("#test1").html("<b>" + data + "</b>");
            $("#test1").html("<i>"+ data +"</i>");
          }); 
          
        
        });    
      
      return false;
    });

  });

//END of $(document).ready(function(){
});
