$(document).ready(function(){
	
	//var langid;
	//
	//$('.ddlink').click(function () {
    //	var langid = $(this).attr('id');
	//	//alert(langid);
	
	$("#makeDict").click(function(){
        	//$('#waitDict').html('Click words to translate');
		var text = $("#textArea").val();
		//var lang = $("#langSelect option:selected").val();
		//var lang = langid;
		//alert(lang);
		var request = $.ajax({
    			url: 'php/insert.php',
			    type: 'POST',
			    dataType: 'text',
			    data: {text:text},
			    //data: {text:text, lang:lang},
    			//success: function(data){
        		//	$('#VocCont').html(data); // Load data into a <div> as HTML
    			//}
		//});
		});
		request.done(function( data ) {
    			$('#main').html(data);
  		});
		request.fail(function( jqXHR, textStatus ) {
    			$('#main').html( "Request failed: " + textStatus );
  		});

	});
});
//});
