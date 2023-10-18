<?php
    $a = 3;
    $b = 5;
    
    $c = $a;
    $a = $b;
    $b = $c;

    // echo 'a = '. $a. ' b = '. $b;
    echo "a = {$a}, b = {$b}";

    $a = 3;
    $b = 5;

    $a = $a + $b;
    $b = $a - $b;
    $a = $a - $b;

    echo '<br>a = '. $a. ' b = '. $b;
?>;
