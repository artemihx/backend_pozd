<?php
//Напишите программу, которая выводит свой собственный код.

echo htmlentities(file_get_contents(__FILE__));

//Сделайте так, чтобы в списке, выводимом программой, остались только папки.

$files = scandir(__DIR__ . '/');
foreach ($files as $file)
{
    if (is_dir($file)) 
    {
        echo $file . '<br>';
    }
}

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