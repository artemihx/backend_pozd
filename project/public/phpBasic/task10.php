<?php

// Есть массив чисел – [1, 3, 2].
// Отсортируйте их от меньшего к большему и преобразуйте в строку,
// в которой значения элементов массива разделяются двоеточиями.
// В результате должна получиться строка “1:2:3”.

$array = [1, 3, 2];
for($i = 0; $i < count($array); ++$i)
{
    for($j = 0; $j < count($array); ++$j)
    {
        if ($array[$i] < $array[$j])
        {
            $temp = $array[$j];
            $array[$j] = $array[$i];
            $array[$i] = $temp;
        }
    }
}
echo implode(":", $array);

//Есть массив чисел – [1, 2, 3, 4, 5].
// Получите с помощью одной функции массив, в котором будут элементы исходного с 1-го элемента по 3-й.
// В результате должен получиться массив с числами [2, 3, 4].

function oneToThree($array)
{
    $result = [];
    for($i = 1; $i <= 3; ++$i)
    {
        $result[] = $array[$i];
    }
    return $result;
}

$array = [1, 2, 3, 4, 5];
echo '<br>';
//$array = array_slice($nums, 1, 3);
echo var_dump(oneToThree($array));

//На вход дана строка с числами, разделенными пробелами.
//Удалите все повторы чисел. Выведите их в любом порядке, разделив пробелами.

$str = '0 2 3 1 2';
echo '<br>';
echo $str;
$array = explode(' ', $str);


// не смог сделать
foreach($array as $i => $n1)
{
    foreach($array as $j => $n2)
    {
        echo '<br>';
        echo $i .'-'.$n1.' '. $j.'-'.$n2;
        if($i === $j)
        {
            continue;
        }
        if($n1 === $n2)
        {
            unset($array[$j]);
        }
    }
}
echo '<br>';
echo var_dump($array);