<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <title>WordCharge</title>
    <meta charset="utf-8">
    <link href="css/site.css" rel="stylesheet">
</head>
<body>
    <?php include("php/header.php"); ?>
    <div id="wrapper-main">
        <h2>WordCharge</h2>

        <!-- Progress bar holder -->
        <div id="progress" style="width:500px;border:1px solid #ccc;"></div>
        <!-- Progress information -->
        <div id="information" style="width"></div>
        
        <?php
            include("php/vars.php");
            
            $textArea = $_POST['textArea'];
            $langId = $_POST['langId'];
            
            // 1.=====
            // Get data from html form textrArea field, remove all special characters
            // and make an array ($words), convert all words to lowercase 
            $words = preg_split('/\P{L}+/u', $textArea, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
            $words = array_map('strtolower', $words);
            
            // Delete all dublicate words in the array and sort in descending order
            $words = array_count_values($words);
            arsort($words);

            // Count unique words in the array
            $total = count($words);
            echo "Unique words: ".$total;
            
            // 2.=====
            // Set MySQL connection and fill the database with new words
            $con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
            
            // Check connection
            if (mysqli_connect_errno()) {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            // Mysql query to delete old data from UserNW table
            $sqlDelete = "TRUNCATE TABLE $UserNW";
            if (!mysqli_query($con,$sqlDelete)) {
              die('Error after Delete: ' . mysqli_error($con));
            }
            
            // change character set to utf8
            if (!mysqli_set_charset($con, "utf8")) {
                printf("Error loading character set utf8: %s\n", mysqli_error($con));
            }
            
            // Loop through the words in $words array and run the Progress Bar
            for($i=0; $i<$total; $i++){

                // Progress Bar: Calculate the percentation
                $percent = intval($i/$total * 100)."%";
                
                // Progress Bar: Javascript for updating the progress bar and information
                echo '<script language="javascript">
                document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
                document.getElementById("information").innerHTML="'.$i.' word(s) processed.";
                </script>';
                
            
                // Progress Bar: This is for the buffer achieve the minimum size in order to flush data
                echo str_repeat(' ',1024*64);
                
            
                // Progress Bar: Send output to browser immediately
                flush();
                
            
                // Get keys and values from $words and separate them
                $onlyWords = array_keys($words);
                $onlyFreq = array_values($words);
                
                // Insert word and its frequency into database
                $sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (freq, word) VALUES ('$onlyFreq[$i]', '$onlyWords[$i]')");
                // Get word translation from Yandex Translate API
                    $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".$onlyWords[$i];
                    $jsonTr = json_decode(file_get_contents($jsonurlTr), true);
                
                    $dataTr = array();
                    $nTr = 0;
                    foreach($jsonTr["text"] as $keyTr=>$wordTr){
                        $dataTr[$nTr] = $wordTr;
                        $nTr++;
                    }
                
                //Implode the merged third array into string of values separated by coma
                $strDict = implode(", ", $dataTr);
                
                // Sql query to update translation for the word
                $sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$strDict' WHERE word='$onlyWords[$i]' AND freq='$onlyFreq[$i]'");
                
                
            }
            // Progress Bar: Tell user that the process is completed
            echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
            
            // Mysql query to display the table content 
            $sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW");
            
            // Display user dictinary in form of the html table
            echo "<br>";
            echo "Dictionary: " . $langId . "<br>";
            echo "<table border='1'>
            <tr>
            <th>freq</th>
            <th>word</th>
            <th>text</th>
            </tr>";
            
            while($row = mysqli_fetch_array($sqlSelect)) {
              echo "<tr>";
              echo "<td>" . $row['freq'] . "</td>";
              echo "<td>" . $row['word'] . "</td>";
              echo "<td>" . $row['text'] . "</td>";
              echo "</tr>";
            }
            
            echo "</table><br>";
            
            // To check MySQL charset
            /*$charset = mysqli_character_set_name($con);
            printf ("Current Mysql charset - %s\n",$charset);
            echo "<br>";*/
            
            // Close MySQL connection
            mysqli_close($con);
        
        ?>
        <?php include("php/footer.php"); ?>
    </div>
</body>
</html>
