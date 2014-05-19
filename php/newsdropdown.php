<?php
if ($myLang == "uk") {
  echo '<option value="en">Англійська</option>'.
       '<option value="it">Італійська</option>'.
       '<option value="es">Іспанська</option>'.
       '<option value="fr">Французька</option>'.
       '<option value="de">Німецька</option>'.
       //'<option value="ru">Російська</option>'.
       '</select>';
} elseif ($myLang == "ru") {
  echo '<option value="en">Английский</option>'.
       '<option value="it">Итальянский</option>'.
       '<option value="es">Испанский</option>'.         
       '<option value="fr">Французкий</option>'.
       '<option value="de">Немецкий</option>'.
       //'<option value="uk">Украинский</option>'.
       '</select>';
} else {
  //echo '<option value="ru">Russian</option>'.
  echo '<option value="it">Italian</option>'.
       '<option value="es">Spanish</option>'.
       '<option value="fr">French</option>'.
       '<option value="de">German</option>'.
       //'<option value="uk">Ukrainian</option>'.
       '</select>';
}
?>
