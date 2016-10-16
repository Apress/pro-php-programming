#!/usr/local/bin/php
# Demonstrating the use of "__call" method
<?php
class test2 {
    function __call($name, $argv) {
        print "name:$name\n";
        foreach ($argv as $a) {
            print "\t$a\n";
        }
    }
}
$x = new test2();
$x->non_existing_method(1, 2, 3);
?>
