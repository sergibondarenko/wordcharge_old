<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/test/php/vars.php");

$textArea = $_POST['text'];
$langId = $_POST['lang'];
$countWords = 0;

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

// Get data from html form textrArea field, remove all special characters
// and make an array ($words), convert all words to lowercase 
$textArea = mysqli_real_escape_string($con, $textArea);
$words = preg_split('/\P{L}+/u', $textArea);
$words = array_map('strtolower', $words);

// Delete all dublicate words in the array and sort in descending order
$words = array_count_values($words);
arsort($words);

echo "<br>"."Total: " . count($words) . "<br>";

// Mysql query to insert new values into user table
foreach($words as $key => $value){
    $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".$key;
    $jsonTr = file_get_contents($jsonurlTr);
    //var_dump(json_decode($json));
    $sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (freq, word, text) VALUES ('$value', '$key', '$jsonTr')");
    echo "Translated: ".$countWords++;
    flush();
}
/*for($i=0; $i<sizeof($words)-1; $i++){
    //echo $words[$i];
    //echo "<br>";
    $sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (word) VALUES ('$words[$i]')");
}*/

// Mysql query to display the table content 
$sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW");

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

//$jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text="."cosa";
//$jsonTr = file_get_contents($jsonurlTr);
//echo $jsonTr;
//var_dump(json_decode($json));

mysqli_close($con);

?>

