<?php
if ($myLang == "uk") {
  echo '<ul>'.
       '<li><a href="enbooks-1.php?myLang=uk">Англійська література</a></li>'.
       '<li><a href="itbooks-1.php?myLang=uk">Італійська література</a></li>'.
       '</ul>';
} elseif ($myLang == "ru") {
  echo '<ul>'.
       '<li><a href="enbooks-1.php?myLang=ru">Английская литература</a></li>'.
       '<li><a href="itbooks-1.php?myLang=ru">Итальянская литература</a></li>'.
       '</ul>';
} elseif ($myLang == "it") {
  echo '<ul>'.
       '<li><a href="enbooks-1.php?myLang=it">Letteratura inglese</a></li>'.
       '<li><a href="rubooks-1.php?myLang=it">Letteratura russa</a></li>'.
       '</ul>';
} else {
  echo '<ul>'.
       '<li><a href="rubooks-1.php?myLang='.$myLang.'">Russian books</a></li>'.
       '<li><a href="itbooks-1.php?myLang='.$myLang.'">Italian books</a></li>'.
       '</ul>';
}
?>
