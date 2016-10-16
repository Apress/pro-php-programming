#!/usr/bin/env php
<?php
$i=10;
LAB:
    echo "i=",$i--,"\n";
    if ($i>0) goto LAB;
echo "Loop exited\n";
?>
