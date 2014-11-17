<?php
/*
if ($myLang == "uk") {
  echo '<ul>'.
       '<li><a href="enbooks-1.php?myLang=uk&shelf=enbooks">Англійська література</a></li>'.
       '<li><a href="itbooks-1.php?myLang=uk&shelf=itbooks">Італійська література</a></li>'.
       '</ul>';
} elseif ($myLang == "ru") {
  echo '<ul>'.
       '<li><a href="enbooks-1.php?myLang=ru&shelf=enbooks">Английская литература</a></li>'.
       '<li><a href="itbooks-1.php?myLang=ru&shelf=itbooks">Итальянская литература</a></li>'.
       '</ul>';
} elseif ($myLang == "it") {
  echo '<ul>'.
       '<li><a href="enbooks-1.php?myLang=it&shelf=enbooks">Letteratura inglese</a></li>'.
       '<li><a href="rubooks-1.php?myLang=it&shelf=rubooks">Letteratura russa</a></li>'.
       '</ul>';
} else {
  echo '<ul>'.
       '<li><a href="rubooks-1.php?myLang='.$myLang.'&shelf=rubooks">Russian books</a></li>'.
       '<li><a href="itbooks-1.php?myLang='.$myLang.'&shelf=itbooks">Italian books</a></li>'.
       '</ul>';
}
*/
if ($myLang == "uk") {
  echo '<ul>'.
       '<li><a href="mybooks.php?myLang=uk&shelf=enbooks">Англійська література</a></li>'.
       '<li><a href="mybooks.php?myLang=uk&shelf=itbooks">Італійська література</a></li>'.
       '</ul>';
} elseif ($myLang == "ru") {
  echo '<ul>'.
       '<li><a href="mybooks.php?myLang=ru&shelf=enbooks">Английская литература</a></li>'.
       '<li><a href="mybooks.php?myLang=ru&shelf=itbooks">Итальянская литература</a></li>'.
       '</ul>';
} elseif ($myLang == "it") {
  echo '<ul>'.
       '<li><a href="mybooks.php?myLang=it&shelf=enbooks">Letteratura inglese</a></li>'.
       '<li><a href="mybooks.php?myLang=it&shelf=rubooks">Letteratura russa</a></li>'.
       '</ul>';
} else {
  echo '<ul>'.
       '<li><a href="mybooks.php?myLang='.$myLang.'&shelf=rubooks">Russian books</a></li>'.
       '<li><a href="mybooks.php?myLang='.$myLang.'&shelf=itbooks">Italian books</a></li>'.
       '</ul>';
}
?>
