#!/usr/bin/env php
<?php
print "Normal assignment.\n";
    $x = 1;
    $y = 2;
    $x = $y;
    $y++;
    print "x=$x\n";
print "Assignment by reference.\n";
    $x = 1;
    $y = 2;
    $x = & $y;
    $y++;
    print "x=$x\n";
?>
