<?php
//header('Content-type: text/plain; charset=utf-8');

//include ($_SERVER['DOCUMENT_ROOT'] . "/php/vars.php");
//include ($_SERVER['DOCUMENT_ROOT'] . "/php/func.php");
//include ("func.php");
//include ("vars.php");

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

// Display user dictinary in index.html via jQuery AJAX from dislaydict.js
echo "<br>";
//echo "Dictionary: " . $langId . "<br>";
echo "<table border='1'>
<tr>
<th>lang</th>
<th>freq</th>
<th>word</th>
<th>text</th>
</tr>";

while($row = mysqli_fetch_array($sqlSelect)) {
  echo "<tr>";
  echo "<td>" . $row['lang'] . "</td>";
  echo "<td>" . $row['freq'] . "</td>";
  echo "<td>" . $row['word'] . "</td>";
  echo "<td>" . $row['text'] . "</td>";
  echo "</tr>";
}

echo "</table><br>";

/*$charset = mysqli_character_set_name($con);
printf ("Current Mysql charset - %s\n",$charset);
echo "<br>";
*/
mysqli_close($con);

?>

