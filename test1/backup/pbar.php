<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
    <title>Progress Bar</title>
    <meta charset="utf-8">
</head>
<body>
<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
<?php
include("php/vars.php");

$textArea = $_POST['textArea'];
$langId = $_POST['langId'];

// Get data from html form textrArea field, remove all special characters
// and make an array ($words), convert all words to lowercase 
$words = preg_split('/\P{L}+/u', $textArea, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
$words = array_map('strtolower', $words);

// Delete all dublicate words in the array and sort in descending order
$words = array_count_values($words);
arsort($words);
// Total processes
$total = count($words);
echo $total;

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

/* change character set to utf8 */
if (!mysqli_set_charset($con, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($con));
}
//mysqli_close($con);


// Loop through process
for($i=0; $i<$total; $i++){
    // Calculate the percentation
    $percent = intval($i/$total * 100)."%";
    
    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.' word(s) processed.";
    </script>';
    

// This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
    

// Send output to browser immediately
    flush();
    

// Sleep one second so we can see the delay
//    sleep(1);
//echo "word: ".$words['$i'];
$onlyWords = array_keys($words);
$onlyFreq = array_values($words);
//$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);


$sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (freq, word) VALUES ('$onlyFreq[$i]', '$onlyWords[$i]')");
// Get translation from Yandex Translate API
    $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".$onlyWords[$i];
    $jsonTr = json_decode(file_get_contents($jsonurlTr), true);

    $dataTr = array();
    $nTr = 0;
    foreach($jsonTr["text"] as $keyTr=>$wordTr){
        $dataTr[$nTr] = $wordTr;
        $nTr++;
    }

$strDict = implode(", ", $dataTr);

$sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$strDict' WHERE word='$onlyWords[$i]' AND freq='$onlyFreq[$i]'");

//mysqli_close($con);


}
// Tell user that the process is completed
echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';

//$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
// Mysql query to display the table content 
$sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW");

// Display user dictinary in index.html via jQuery AJAX from dislaydict.js
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

$charset = mysqli_character_set_name($con);
printf ("Current Mysql charset - %s\n",$charset);
echo "<br>";

mysqli_close($con);

?>
</body>
</html>
