<?php

$total = 0;
$value = rand(1, 10);
if ($value > 5) {
    $multiple = 2;
    $total = $value;
    $total *= $multiple;
    $total += ( 10 - $value);
    print "goodbye<br/>";
    print "initial value is $value<br/>";
    print "the total is $total<br/>";
} else {
    $multiple = 7;
    $total = $value;
    $total *= $multiple;
    $total += ( 10 - $value);
    print "hello!<br/>";
    print "initial value is $value<br/>";
    print "the total is $total<br/>";
}
?>