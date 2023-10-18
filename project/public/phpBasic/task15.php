<?php
//Напишите программу, которая выводит свой собственный код.

//

//Все комбинации пар элементов
$str = '1 2 3';
$array = explode(' ', $str);

foreach ($array as $i => $n1)
{
    foreach ($array as $j => $n2)
    {
        if($i === $j)
        {
            continue;
        }
        echo $n1 .' '.$n2 . '<br>';
    }
}
?>