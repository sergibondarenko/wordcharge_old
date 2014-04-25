<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/test/php/vars.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/test/php/func.php");

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
$words = preg_split('/\P{L}+/u', $textArea, 0, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
$words = array_map('strtolower', $words);

// Delete all dublicate words in the array and sort in descending order
$words = array_count_values($words);
arsort($words);

echo "<br>"."Total: " . count($words) . " unique words;" ."<br>";

// Mysql query to insert new values into user table
foreach($words as $word => $freq){
    
    // Get translation from Yandex Translate API
    $jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text=".$word;
    $jsonTr = json_decode(remote_get_contents($jsonurlTr), true);
    //$sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (freq, word, text) VALUES ('$value', '$key', '$jsonTr')");
    $sqlInsert = mysqli_query($con, "INSERT INTO $UserNW (freq, word) VALUES ('$freq', '$word')");
    $dataTr = array();
    $nTr = 0;
    foreach($jsonTr["text"] as $keyTr=>$wordTr){
       //$sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$wordTr' WHERE word='$word' AND freq='$freq'");
       // $dataTransl=$wordTr;
        $dataTr[$nTr] = $wordTr;
        $nTr++;
    }
    //$sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$dataTransl' WHERE word='$word' AND freq='$freq'");

    // Get translation from Yandex Dict API
    $jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text=".$word;
    $jsonDict = json_decode(remote_get_contents($jsonurlDict), true);

    $dataDict = array();
    foreach($jsonDict["def"] as $def){
        $nDict = 0;
        foreach($def["tr"] as $text){
            $dataDict = array($text["text"]);
            foreach($text["syn"] as $syn){
                $nDict++;
                $dataDict[$nDict] = $syn["text"];    
            }
        }
    }
    
    $mergedTrDict = array_merge($dataTr, $dataDict);
    //$strDict = implode(", ", $dataDict);
    $strDict = implode(", ", $mergedTrDict);
    $sqlUpdate = mysqli_query($con, "UPDATE $UserNW SET text='$strDict' WHERE word='$word' AND freq='$freq'");
    
}

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

print_r($dataTr);
//$jsonurlTr = $trnsl_api."?key=".$trnsl_key."&lang=".$langId."&format=html&text="."cosa";
//$jsonTr = json_decode(remote_get_contents($jsonurlTr), true);
//$jsonurlDict = $dict_api."?key=".$dict_key."&lang=".$langId."&format=html&text="."cosa";
//$jsonDict = json_decode(remote_get_contents($jsonurlDict), true);
//$jsonDict = json_decode(remote_get_contents($jsonurlDict));
//print_r($jsonTr);
//echo "<br>";
//foreach($jsonTr as $key=>$value){
//    echo "Key= ".$key."; Value= ".$value.";";
//    echo "<br>";
//}
//foreach($jsonTr[text] as $key=>$value){
//    echo "Key= ".$key."; Value= ".$value.";";
//    echo "<br>";
//}
//echo implode(",", $jsonTr[text]);
//echo "<br>"."---"."<br>";
//print_r($jsonDict);
//echo "<br>";
//$dataDict = array();
//foreach($jsonDict["def"] as $def){
//    $nDict = 0;
//    foreach($def["tr"] as $text){
//        $dataDict = array($text["text"]);
//        foreach($text["syn"] as $syn){
//            $nDict++;
//            $dataDict[$nDict] = $syn["text"];    
//        }
//    }
//}
//echo "<br>";
////print_r($dataDict);
////echo "<br>";
////foreach($dataDict as $element){
////    echo $element ."<br>";
////}
//echo implode(", ", $dataDict);

mysqli_close($con);

?>

