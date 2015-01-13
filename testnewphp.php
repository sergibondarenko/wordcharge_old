<!DOCTYPE html>
<html>
	<head>
	
	  <script src="js/jquery.min.js"></script>
	  <script src="js/jquery-ui.min.js"></script>

    <script>
    $(document).ready(function(){
      $("button").click(function(){
        var myText = $("textArea").val();
        $.post("getdict.php",
        {
          text:myText
        },
        function(data){
          //alert("Data: " + data + "\nStatus: " + status);
          //console.log(data);
          document.getElementById("demo").innerHTML = data;
          
          /*  var node = document.createElement("P");
            var textnode = document.createTextNode(data);
            node.appendChild(textnode);
            document.getElementById("demo").appendChild(node);
            */
            
        });
      });
    });
    </script>
	</head>
	<!--<body onload="onloadJSDom();">-->
	<body>
	
	    <h3>Test a new approach to speed up creating of dictionary!</h3>
	    
	<form>
	    <textarea id="textArea" rows="9">neither this list nor its contents are final till
midnight of the last day of the month of any</textarea>
	    <br>
	    <button type="button">Click</button>
    	<!--<input type="button" value="Make Dictionary" onclick="getDict();" />-->
	</form>
	
	<h3>Demo:</h3>
	<p id="demo"></p>

    <script>
      
      function getDict(){
        return 0;
      }
      
    </script>
    
	</body>
</html>
