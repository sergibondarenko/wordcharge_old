$(document).ready(function(){
	
	//var langid;
	//
	//$('.ddlink').click(function () {
    //	var langid = $(this).attr('id');
	//	//alert(langid);
	
	$("#makeDict").click(function(){
        	//$('#waitDict').html('Click words to translate');
		var text = $("#textArea").val();
		var lang = $("#langId option:selected").val();
		//var lang = langid;
		//alert(lang);
		var request = $.ajax({
    			url: 'php/insert.php',
			    type: 'POST',
			    dataType: 'text',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			    //data: {text:text},
			    data: {text:text, lang:lang},
    			//success: function(data){
        		//	$('#VocCont').html(data); // Load data into a <div> as HTML
    			//}
		//});
		});
		request.done(function( data ) {
    			$('#mainDict').html(data);
  		});
		request.fail(function( jqXHR, textStatus ) {
    			$('#mainDict').html( "displaydict.js request failed: " + textStatus );
  		});

	});
});
//});
