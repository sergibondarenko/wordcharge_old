$(document).ready(function(){

// Delete known words by clicking yes hyperlink
  $(function() {
    $('span.iKnowTheWord').live('click', function() {  
      $(this).closest('tr').find('td').fadeOut(1000, 
        function(){ 
          // alert($(this).text());
          $(this).parents('tr:first').remove();                    
        });    
      
      return false;
    });
  });

//END of $(document).ready(function(){
});
