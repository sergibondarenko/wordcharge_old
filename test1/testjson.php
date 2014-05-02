<?php
// Верная json-строка
$json[] = '{"Organization": "PHP Documentation Team"}';

$aWord = "дом";

$json[] = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d&lang=ru-en&format=html&text='.urlencode($aWord));
//$json[] = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20140101T191051Z.9249b28df324056a.b4ed43cbaf5d80c24126112974e44172c430157d&lang=ru-en&format=html&text=дом');

// Неверная json-строка, которая вызовет синтаксическую ошибку,
// здесь в качестве кавычек мы используем ' вместо "
//$json[] = "{'Organization': 'PHP Documentation Team'}";


foreach ($json as $string) {
    //echo 'Декодируем: ' . $string;
    json_decode($string);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - Ошибок нет';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Достигнута максимальная глубина стека';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Некорректные разряды или не совпадение режимов';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Некорректный управляющий символ';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Синтаксическая ошибка, не корректный JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Некорректные символы UTF-8, возможно неверная кодировка';
        break;
        default:
            echo ' - Неизвестная ошибка';
        break;
    }

    echo PHP_EOL;
}

print_r(json_decode($string));
?>
