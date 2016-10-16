#!/usr/bin/env php
<?php
$x = new SplFileObject("qbf.txt","r");
foreach ($x as $lineno => $val) {
    if(!empty($val)) {print "$lineno:\t$val";}
}
?>
