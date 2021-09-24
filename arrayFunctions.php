<?php

// 1. Дан массив,в нем могут быть числа, вложенные массивы и текстовые строки. 
// Необходимо вернуть сумму квадратов всех чисел в массиве.
$array1 = [
    2, 
    [2, 4, 6],
    '3',
    'Some text',
    6,
    10
  ];

$sum = 0;
foreach ($array1 as $value) {
  if ( is_array($value) ) {
    $sum2 = 0;
    foreach ($value as $item) {
      $sum2 += pow($item, 2);
    }
    $sum +=$sum2;
  } else {
    $sum += pow($value, 2);
  }
}

print_r($sum);


// 2. Есть массив строк. Написать функцию,которая делает все строки в массиве с большой буквы.
$arrayStrings = [
  'test string',
  'hello world',
  'lorem ipsum'
];

function arrayStringsToUpperCase(&$item) {
  $item1 = ucfirst($item1);
}

array_walk($arrayStrings, 'arrayStringsToUpperCase');
print_r($arrayStrings);


// 3. Есть строка из слов разделенная запятыми. Необходимо написать код, который выводит эти слова
//  в обратном порядке.
// $testStr = "1,2,3";
// $reversedStr = testReverseFunc($testStr);
// echo $reversedStr; // should echo 3,2,1
$testStr = "1,2,3";

function testReverseFunc($str) {
  $arr = explode(",", $str);
  $newArr = array_reverse($arr);
  $reversedString = implode(",", $newArr);
  return $reversedString;
}

$reversedStr = testReverseFunc($testStr);
echo $reversedStr;


// 4. Вывести отдельно ключи,отдельно значения массива $specialList.
// Выводить в строчку,через пробел 
// $specialList = ["randomKey"=>"Random Random Value",'just key'=>'qwdqwdqwd',"qwdqwdqwdqwdqw"=>" value"];
$specialList = [
  "randomKey"=>"Random Random Value",
  'just key'=>'qwdqwdqwd',
  "qwdqwdqwdqwdqw"=>" value"
];

function printKeysAndVal($arr) { 
  $keys = '';
  $values = '';
  foreach ($arr as $key => $value) {
    $keys = $keys . ' ' . $key;
    $values = $values . ' ' . $value; 
  }
  echo $keys . '</br>' . $values;
}

printKeysAndVal($specialList);


// 5. Есть массив с целыми случайными числами от 0 до 1000. Массив одномерный с размером 100. 
//  a. Необходимо написать функцию,которая генерирует этот массив.
//  b. Написать функцию,которая принимает число и возвращает индекс элемента если он есть,или false если его нет.

function generateLongArray() {
  $arr = [];//Массив чисел от 0 до 1000
  for ($i = 0; $i <= 1000; $i++) {
    $arr[] = $i;
  }

  $arrResult = array_rand($arr, 100);//Получаем массив размеров 100 из случайных чисел от 0 до 1000
  return $arrResult;
}

function mySuperFind($valueToFind, $generatedLongArray) {
  foreach ($generatedLongArray as $key => $value) {
    if ($valueToFind == $value) {
      return $key;
    }
  }
  return false;
}

$superLongArray = generateLongArray();
// print_r($superLongArray);
echo mySuperFind(10, $superLongArray);

























?>