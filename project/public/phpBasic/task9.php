<?php
//напишите функцию, принимающую на вход 2 аргумента - массив и какое-либо значение.
// Функция возвращает true, если переданное значение присутствует в массиве и false - если нет.

function hasNum($array, int $x)
{
    foreach($array as $el)
    {
        if($el === $x)
        {
            return true;
            break;
        }
    }
    return false;
}

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$num = 7;
$result = hasNum($array, $num);
echo 'ответ:'. $result. '<br>';


// напишите функцию, принимающую на вход 2 аргумента - массив и какое-либо значение.
// Функция возвращает число вхождений числа в массив. Например: для массива [1, 2, 1, 3] число вхождений числа "1" будет равно двум.

function countNum($array, int $x)
{
    $count = 0;
    foreach($array as $el)
    {
        if($el === $x)
        {
            ++$count;
        }
        continue;
    }
    return $count;
}

$array = [1, 2, 1, 3];
$num = 1;
echo 'кол-во: '. countNum($array, $num) . '<br>';

//Дана строка с числами, разделенными пробелом.
//Найдите все четные числа и выведите их, разделяя пробелами. Порядок чисел должен быть таким же, как и на входе.

$str = '1 2 3 4 5 6 7 8 9 10';
$array = preg_split('/\s+/', $str);

foreach($array as $el)
{
    if($el % 2 == 0)
    {
        echo $el . ' ';
    }
}

//Числа Фибоначчи. В этой задаче вам нужно написать код, который будет выводить первые n чисел этой последовательности.

function fibonacci(int $x)
{
    if ($x == 1 || $x == 2)
    {
        return 1;
    }
    return fibonacci($x - 1) + fibonacci($x - 2);
}
echo '<br>';
echo fibonacci(10);

?>