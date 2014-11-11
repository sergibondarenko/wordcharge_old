<!DOCTYPE html>
<html lang="en">
<head>
<title>WordCharge</title>
<meta charset="UTF-8">
<!--<link href="../css/site.css" rel="stylesheet">-->
</head>
<body>
<?php
//header('Content-type: text/plain; charset=utf-8');
header("Content-type: application/json; charset=utf-8");

//include ($_SERVER['DOCUMENT_ROOT'] . "/php/vars.php");
//include ($_SERVER['DOCUMENT_ROOT'] . "/php/func.php");
//include ("func.php");
//include ("vars.php");

//$wordId = intval($_GET['wordId']);

$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/* change character set to utf8 */
if (!mysqli_set_charset($con, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($con));
}

$UserNW = $theSessionUser."_NW";
// Mysql query to display the table content 
$sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW");
//$sqlAllSelect = mysqli_query($con,"SELECT * FROM $UserNW");

//$wordId = 1;
//$sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW WHERE id = '".$wordId."'");

$numRows = mysqli_num_rows($sqlSelect);
//echo "Total number of new words: $numRows";

//$wordIndex = 0;
//$row = mysqli_fetch_array($sqlSelect);
//print_r($row);

//$flashWords = array();

if (mysqli_num_rows($sqlSelect) > 0) {
  while($row = mysqli_fetch_assoc($sqlSelect)){
    //$flashWords[$row['id']]['id'] = $row['id']; 
    $flashWordsPHP[$row['id']] = array('id'=>$row['id'], 'word'=>$row['word'], 'text'=>$row['text']);
    
  }
} else {
  echo "0 results";
}
//echo "<br>";
//
//print_r($flashWords[1]);
//echo "<br>";
//print_r($flashWords[2]);
//
//echo "<br><br>";
//print_r($flashWords);
//echo "<br>$flashWords<br>";

//if (mysqli_num_rows($sqlSelect) > 0) {
//  while($row = mysqli_fetch_array($sqlSelect)){
//    echo "<p id='aWord'>". $row["word"] . "</p><br>";
//    echo "<p id='aText'></p><br>";
//  }
//
//  echo "<br>";
//  echo "<span class='showFlashWord'><a href='#'>Show translation</a></span>";
//  //echo "&nbsp;|&nbsp;";
//  //echo "<a href='#'>Repeat later</a> <br>";
//  
//} else {
//  echo "0 results";
//}



echo "<br><br><br>";

//if (mysqli_num_rows($sqlSelect) > 0) {
//    // output data of each row
//    while($row = mysqli_fetch_array($sqlSelect)) {
//        echo " " . $row["freq"]. " " . $row["word"]. " " . $row["text"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}

//// Display user dictinary in index.html via jQuery AJAX from dislaydict.js
//echo "<br>";
////echo "Dictionary: " . $langId . "<br>";
////echo "<table id=\"tableDict\"> //Old design
//echo "<table class='table table-striped table-hover'>  
//<tr>
//<th>".$langArray["textTableLang"]."</th>
//<th>".$langArray["textTableFreq"]."</th>
//<th>".$langArray["textTableWord"]."</th>
//<th>".$langArray["textTableText"]."</th>
//</tr>";
//
//while($row = mysqli_fetch_array($sqlSelect)) {
//  echo "<tr class='active'>";
//  echo "<td>" . $row['lang'] . "</td>";
//  echo "<td>" . $row['freq'] . "</td>";
//  echo "<td>" . $row['word'] . "</td>";
//  echo "<td>" . $row['text'] . "</td>";
//  echo "</tr>";
//}
//
//echo "</table><br>";

/*$charset = mysqli_character_set_name($con);
printf ("Current Mysql charset - %s\n",$charset);
echo "<br>";
*/
mysqli_close($con);

?>
</body>
</html>
