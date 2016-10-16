#!/usr/bin/env php
<?php
$tables = array("emp", "dept", "bonus", "salgrade");
foreach ($tables as $t) {
    $trunc = preg_replace("/^(\w+)/", "truncate table $1;", $t);
    print "$trunc\n";
}
?>
