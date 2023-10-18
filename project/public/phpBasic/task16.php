<?php
function largestNumber($nums) {
    function compare($x, $y) {
        return $y . $x <=> $x . $y;
    }
    usort($nums, 'compare');
    $result = implode('', $nums);
    return $result;
}

$str = '100 95 9 2 42 11 81';
$array = explode(' ', $str);

echo largestNumber($array);

?>