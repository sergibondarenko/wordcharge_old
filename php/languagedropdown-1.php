<?php
if ($myLang == "uk") {
  echo '<option value="en-uk" selected>Англійська</option>'.
       '<option value="es-uk">Іспанська</option>'.
       '<option value="fr-uk">Французька</option>'.
       '<option value="de-uk">Німецька</option>'.
       '<option value="it-uk">Італійська</option>';
} elseif ($myLang == "ru") {
  echo '<option value="en-ru" selected>Английский</option>'.
       '<option value="es-ru">Испанский</option>'.         
       '<option value="fr-ru">Французcкий</option>'.
       '<option value="de-ru">Немецкий</option>'.
       '<option value="it-ru">Итальянский</option>';
} elseif ($myLang == "it") {
  echo '<option value="en-it" selected>Inglese</option>'.
       '<option value="es-it">Spagnolo</option>'.
       '<option value="fr-it">Francese</option>'.
       '<option value="de-it">Tedesco</option>'.
       '<option value="ru-it">Ruso</option>'.
       '<option value="uk-it">Ucraino</option>';
} else {
  echo '<option value="es-en">Spanish</option>'.
       '<option value="fr-en">French</option>'.
       '<option value="de-en">German</option>'.
       '<option value="it-en">Italian</option>'.
       '<option value="ru-en" selected>Russian</option>'.
       '<option value="uk-en">Ukrainian</option>';
}
?>
