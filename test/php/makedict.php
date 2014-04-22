<?php
//if(isset($_GET['url'])) {
//if(isset($_GET['text']) && isset($_GET['lang'])) {
//if(isset($_POST['text']) && isset($_POST['lang'])) {
	$lang = $_POST["lang"];
    $filecontent = $_POST["text"];
	//$lang = $_GET['lang'];
    	//$filecontent = $_GET['text'];
	
	$dict_key = 'dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d';
	$trnsl_key = 'trnsl.1.1.20140213T084832Z.2e599cd43e74002d.d935bc98da1909103ec212bc9ce71adeaac9de4a';
	$dict_api = 'https://dictionary.yandex.net/api/v1/dicservice.json/lookup';
	$trnsl_api = 'https://translate.yandex.net/api/v1.5/tr.json/translate';

	header("Content-type: text/plain");
    	//echo file_get_contents(urldecode($_GET['url']));

	$words = preg_split('/\P{L}+/u', $filecontent); //Split on Unicode non-letters
	$words = array_map('strtolower', $words); //Make all letters wo lower
	$vals = array_count_values($words); //Delete all dublicate values
	arsort($vals); //Sort in descending order

	//Print vocabulary
	//echo "<h4>Dictionary:</h4>";
	echo $lang;
	echo "<br/>";
	echo "<br/>";
	echo "<table border='1'>
		<tr>
		<th>частота</th>
		<th>слова</th>
		</tr>";
	foreach($vals as $key => $value)
        {
		echo "<tr>";
		#echo "$value: ";
		echo "<td>" . $value . "</td>";
		echo "<td>" . '<a href="trnsl.html?lang='.$lang.'&text='.$key.'" target="_blank">' . $key . '</a>' . "</td>";

		//$json_tr = file_get_contents( $trnsl_api .'?key='. $trnsl_key  .'&lang='. $lang .'&format=html&text='. $key);
		//$obj_tr = json_decode($json_tr);
		//echo "<td>";
		//echo $obj_tr->text[0];
		//echo "</td>";

		echo "</tr>";		
		#echo "<br>";		
	}
	echo "</table>";
//}

//echo file_get_contents(urldecode('http://www.voanews.com/articleprintview/1833120.html'));
?>
