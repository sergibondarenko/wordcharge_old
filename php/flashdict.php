<!DOCTYPE html>
<html lang="en">
<head>
<title>WordCharge</title>
<meta charset="UTF-8">
</head>
<body>
<?php
header("Content-type: application/json; charset=utf-8");

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
$UserNW = preg_replace('/[^a-zA-Z0-9_]/', '_', $UserNW);
//$UserKNW = preg_replace('/[^a-zA-Z0-9_]/', '_', $UserKNW);

// Mysql query to display the table content 
$sqlSelect = mysqli_query($con,"SELECT * FROM $UserNW");

$arrIndex = 0;
$numRows = mysqli_num_rows($sqlSelect);
if (mysqli_num_rows($sqlSelect) > 0) {
  while($row = mysqli_fetch_assoc($sqlSelect)){
    //$flashWords[$row['id']]['id'] = $row['id']; 
    //$flashWordsPHP[$row['id']] = array('id'=>$row['id'], 'word'=>$row['word'], 'text'=>$row['text']);
    $flashWordsPHP[$arrIndex] = array('id'=>$row['id'], 'word'=>$row['word'], 'text'=>$row['text']);
    $arrIndex++;
  }
} else {
  echo "0 results";
}

//Delete last empty element
unset($flashWordsPHP[$numRows-1]);

//echo "<br><br><br>";

mysqli_close($con);

?>
</body>
</html>
