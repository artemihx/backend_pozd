<?php
//На вход подается строка из чисел, разделенных пробелами.
//Найдите наиболее часто встречающееся число в строке.

$str = '1 2 3 2 4 4 2 5';
$array = explode(' ', $str);

$maxCountNum = 0;
$maxCount = 0;
foreach ($array as $i => $n1)
{
    $count = 0;
    foreach ($array as $j => $n2)
    {
        if($n1 == $n2)
        {
            ++$count;
        }
    }
    if($count > $maxCount)
    {
        $maxCount = $count;
        $maxCountNum = $n1;
    }
}
echo $maxCountNum;

echo '<br>';
//На вход подается строка из чисел, разделенных пробелами.
//Переместите все нули в конец строки. Порядок остальных чисел должен сохраниться.

$str = '7 0 39 0 282 2 4 0 45';
$array = explode(' ', $str);

foreach ($array as $i => $el) {
    if($el == 0)
    {
        unset($array[$i]);
        array_push($array, '0');
    }
}

foreach ($array as $el)
{
    echo $el . ' ';
}
?>