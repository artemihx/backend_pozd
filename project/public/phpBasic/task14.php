<?php

//Замените каждый элемент произведением всех других элементов

$str = '1 2 3';
$array = explode(' ', $str);
echo $str . '<br>';

$tempNums = [];
    for($i = 0; $i < count($array); $i++)
    {
        $product = 1;
        for($j = 0; $j < count($array); $j++)
        {
            if($i != $j)
            {
                $product *= $array[$j];
            }
        }
        $tempNums[] = $product;
    }
    $array = $tempNums;

foreach ($array as $item) {
    echo $item .' ';
}

//Найти максимальную разницу между двумя элементами

$str = '1 6 4 3';
$array = explode(' ', $str);

$maxMinus = 0;
for($i = 0; $i < count($array); ++$i)
{
    for($j = $i + 1; $j < count($array); ++$j)
        {
            $var = $array[$i] - $array[$j];
            if($var > $maxMinus)
            {
                $maxMinus = $var;
            }
        }
}
echo '<br>'. $maxMinus;

//Максимальная сумма подряд идущих чисел
// не сделал
$str = '-2 1 -3 4 -1 2 1 -5 4';
$array = explode(' ', $str);

$maxSum = 0;
for($i = 0; $i < count($array); ++$i)
{

}
echo '<br>' . $maxSum;
?>