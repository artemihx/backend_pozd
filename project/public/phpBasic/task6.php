<?php
$array = [
    'oneEl' => 'one lvl element',
    'oneTwo' => [
        'twoEl' => 'two lvl element',
        'twoThree' => [
            'threeEl' => 'three lvl element'
        ]
    ]
];
echo '<pre>';
var_dump($array);
echo '</pre>';

$array['oneTwo']['twoThree']['threeEl2'] = 'some';
echo '<pre>';
var_dump($array);
echo '</pre>';

?>