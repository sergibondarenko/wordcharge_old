<?php
    //include ($_SERVER['DOCUMENT_ROOT'] . "php/vars.php");
    //include ($_SERVER['DOCUMENT_ROOT'] . "php/func.php");
    include ("php/vars.php");
    
    echo $_SERVER['DOCUMENT_ROOT']."<br>";
    echo $MysqlUser."<br>";
    echo "How are you getting on?!"."<br>";
    echo $_POST["langId"]."<br>";
    echo $_POST["textArea"];
    
echo "<table border='1'>
<tr>
<th>freq</th>
<th>word</th>
<th>text</th>
</tr>";

echo "</table><br>";
?>
