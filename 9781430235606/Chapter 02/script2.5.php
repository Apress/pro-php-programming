#!/usr/bin/php
# Demonstrating shallow copy.
<?php
class test3 {
    protected $memb;
    function __construct($memb) {
        $this->memb = $memb;
    }
    function __destruct() {
        printf("Destroying object %s...\n", $this->memb);
    }
}
$x = new test3("object 1");
$y = new test3("object 2");
print "Assignment taking place:\n";
$x = $y;
print "End of the script\n";
?>
