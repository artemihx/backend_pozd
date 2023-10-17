<?php

function findMin(float $a, float $b, float $c)
{
    if($a < $b && $a < $c)
    {
        return $a;
    }
    elseif($b < $a && $b < $c)
    {
        return $b;
    }
    else
    {
        return $c;
    }
}

function multNum(&$a, &$b)
{
    $a *= 2;
    $b *= 2;
}

function faktorial($n)
{
    if ($n === 0)
    {
        return 1;
    }
    return $n * faktorial($n - 1);
}

function printNum(int $n)
{
    if($n === 0)
    {
        return 1;
        echo $n;
    }
    printNum($n - 1);
    echo ' ' . $n;
}

echo 'Минимальное: '. findMin(1.2, 1.1, 1.4);
$a = 5;
$b = 3;
echo '<br>$a, $b: '.$a . ' ' . $b;
multNum($a, $b);
echo '<br>multNum($a, $b): '.$a . ' ' . $b;
echo '<br>Факториал: ' . faktorial(3) .'<br>';
printNum(5);
?>