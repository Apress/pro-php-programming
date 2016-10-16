#!/usr/bin/env php
<?php
$expr = '/[A-Z][a-z]{2,},\s[A-Z][a-z]{2,}\s\d{1,2},\s\d{4}$/';
$item = 'Sat, Apr 30, 2011';
if (preg_match($expr, $item)) {
    print "Matches\n";
} else {
    print "Doesn't match.\n";
}
?>
