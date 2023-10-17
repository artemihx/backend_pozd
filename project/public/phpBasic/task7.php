<?php


$carsSpeeds = [
    95,
    140,
    78
];

$sumOfSpeeds = 0;
$count = 0;

foreach ($carsSpeeds as $speed) {
    $sumOfSpeeds += $speed;
    $count += 1;
}

$averageSpeed = $sumOfSpeeds / $count;

echo "Общая скорость: {$sumOfSpeeds}, Кол-во авто: {$count}";
echo 'Средняя скорость движения по трассе: ' . $averageSpeed;

?>