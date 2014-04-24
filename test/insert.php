<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/php/vars.php");

$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Mysql query to delete old data from GuestNW table
$sqlDelete = "TRUNCATE TABLE $GuestNW";
if (!mysqli_query($con,$sqlDelete)) {
  die('Error after Delete: ' . mysqli_error($con));
}

// escape variables for security
// Get data from html form 
$freq = mysqli_real_escape_string($con, $_POST['freq']);
$word = mysqli_real_escape_string($con, $_POST['word']);
$text = mysqli_real_escape_string($con, $_POST['text']);

// Mysql query to insert new values
$sqlInsert="INSERT INTO $GuestNW (freq, word, text)
VALUES ('$freq', '$word', '$text')";
if (!mysqli_query($con,$sqlInsert)) {
  die('Error after Insert: ' . mysqli_error($con));
}
//echo "1 record added";

// Mysql query to display table content 
$sqlSelect = mysqli_query($con,"SELECT * FROM $GuestNW");

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

echo "</table>";

mysqli_close($con);

?>

