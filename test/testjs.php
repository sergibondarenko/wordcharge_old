<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>

    <button id="btn">Click</button>
    <p>The result is below:<p>
    <p id="res"></p>
    <p id="resBtn"></p>

    <script>
        //Shuffle (randomize) elements in an array
    
        var arr = [1,2,3,4,5];
        var text = "";
        
        function shuffle(array) {
          var currentIndex = array.length, temporaryValue, randomIndex;
        
          // While there remain elements to shuffle...
          while (0 !== currentIndex) {
        
            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;
        
            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
          }
          return array;
        }
        
        arr = shuffle(arr);
        
        for(var i = 0; i < arr.length; i++){
            text += arr[i] + " ";
        }
        text += "<br>";
        
        document.getElementById("res").innerHTML = text;
    </script>

    <script>
        document.getElementById("btn").addEventListener("click", displayDate);
        
        function displayDate() {
            document.getElementById("resBtn").innerHTML = Date();
        }  
    
    </script>

	</body>
</html>
