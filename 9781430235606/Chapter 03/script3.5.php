#!/usr/bin/env php
<?php
$a = 5;
function f1($x) {
    $x+= 3;
    print "x=$x\n";
}
function f2(&$x) {
    $x+= 3;
    print "x=$x\n";
}
f1($a);
print "a=$a\n";
f2($a);
print "a=$a\n";
?>

