<?php

$total = 0;
$value = rand(1, 10);
if ($value > 5) {
    $total = changeTotalValue($value, 2);
    displayMessage("goodbye", $value, $total);
} else {
    $total = changeTotalValue($value, 7);
    displayMessage("hello!", $value, $total);
}

function changeTotalValue($value, $multiple) {
    $total = $value * $multiple;
    $total += ( 10 - $value);
    return $total;
}

function displayMessage($greeting, $value, $total) {
    print "$greeting<br/>";
    print "initial value is $value<br/>";
    print "the total is $total<br/>";
}

?>