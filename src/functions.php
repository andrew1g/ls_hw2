<?php
//Задание #1
//Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
//Если в функцию передан второй параметр true, 
//то возвращать (через return) результат в виде одной объединенной строки.

function task1($array_of_strings, bool $ret=false) 
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

//==========================================================

// Задание #2

// Функция должна принимать переменное число аргументов.
// Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, 
//которое необходимо выполнить со всеми передаваемыми аргументами.
// Остальные аргументы это целые и/или вещественные числа.
// Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
// Результат: 1 + 2 + 3 + 5.2 = 11.2
function task2(string $action, ...$args) 
{
  //проверяем, что $args - это int или float
foreach ($args as $arg) {
  if (!is_int($arg) && !is_float($arg)) {
    trigger_error("В аргументах есть значение (".$arg.") не целое и не вещественное!");
    return "В аргументах есть значение (".$arg.") не целое и не вещественное!";
    //Echo 'В аргументах есть значения не целые и не вещественные!';
    //Echo $arg;
    //break;
  }
}

  switch($action) {
    case "+": $result = array_sum($args); 
    return $result;
    case "-":
      $result = $args[0];
      for ($i = 1; $i < count($args); $i++) {
        $result = $result - $args[$i];
      }  
      return $result;
    case "*":
      $result = $args[0];
      for ($i = 1; $i < count($args); $i++) {
        $result = $result * $args[$i];
      }  
      return $result;
    case "/": 
      $result = $args[0];
      for ($i = 1; $i < count($args); $i++) {
        if ($args[$i] == 0) {
          trigger_error("Деление на ноль!");
          return "Деление на ноль!";
        }
        $result = $result / $args[$i];
      }  
      return $result;
  } 
}


//=========================================
// Задание #3 (Использование рекурсии не обязательно)
// Функция должна принимать два параметра – целые числа.
// Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения 
//размером со значения параметров, переданных в функцию. 
//(Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). 
//Таблица должна быть выполнена с использованием тега <table>
// В остальных случаях выдавать корректную ошибку. 

function task3($integer1, $integer2) {
  if (!is_int($integer1)) {
    trigger_error("Первый аргумент не целое число!");
    return false;
  }

  if (!is_int($integer2)) {
    trigger_error("Второй аргумент не целое число!");
    return false;
  }

  $result = '<table>';
  for ($i = 1; $i <= $integer1; $i++) {
    $result .= '<tr>';
    for ($j = 1; $j <= $integer2; $j++) {
      $result .= '<td>'.$i*$j.'</td>';
    }
    $result .= '</tr>';
  }
  $result .= '</table>';
return $result;
}

//******************************* */
function func_open_file_and_echo($filename) {
  $fp = fopen($filename, 'r');
  if (!$fp) {
      return false;
  }

  $result_string = '';
  while (!feof($fp)) {
      $result_string .= fgets($fp, 512);
  }

  echo $result_string;
}

?>