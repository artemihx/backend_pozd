<?php
    //Анаграммы
    //исправить
    $str1 = 'night';
    $str2 = 'thing';
    $count = 0;

    for($i = 0; $i < strlen($str1); ++$i)
    {
        for($j = 0; $j < strlen($str2);++$j)
        {
            if($str1[$i] == $str2[$j])
            {
                ++$count;
            }
        }
    }
    echo $count == strlen($str1) ? 'да' : 'нет';
?>