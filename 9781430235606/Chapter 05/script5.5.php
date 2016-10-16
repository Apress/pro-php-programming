#!/usr/bin/env php
<?php
$hp = new SplMaxHeap();
for ($i = 0;$i <= 10;$i++) {
    $x = rand(1, 1000);
    print "inserting: $x\n";
    $hp->insert($x);
}
$cnt = 1;
print "Retrieving:\n";
foreach ($hp as $i) {
    print $cnt++ . " :" . $i . "\n";
}
?>
