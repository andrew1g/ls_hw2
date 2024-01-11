<?php
//Задание #1
//Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
//Если в функцию передан второй параметр true, 
//то возвращать (через return) результат в виде одной объединенной строки.

function task1($array_of_strings, $ret=false) 
{
    if ($ret ===true) 
    {
        return implode(" ", $array_of_strings);
    } else {
        array_walk($array_of_strings, function ($value) {
            echo "<p>".$value."</p>";
          });
    }
}

?>