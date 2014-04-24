<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/php/vars.php");

$con=mysqli_connect("localhost",$MysqlUser,$MysqlUPass,$MysqlDB);
//$con=mysqli_connect("localhost","wordcharge","zef1rv1ter","wordcharge");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM $GuestNW");

//while($row = mysqli_fetch_array($result)) {
//  echo $row['freq'] . " " . $row['word'];
//  echo "<br>";
//}

echo "<table border='1'>
<tr>
<th>freq</th>
<th>word</th>
<th>text</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['freq'] . "</td>";
  echo "<td>" . $row['word'] . "</td>";
  echo "<td>" . $row['text'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>

