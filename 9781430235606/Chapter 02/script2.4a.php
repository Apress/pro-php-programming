#!/usr/local/bin/php
# Demonstrating the use of "__toString" method
<?php
class test2 {
    protected $memb;
    function __construct($memb) {
        $this->memb = $memb;
    }
    function __toString() {
        return ("test2 member.\n");
    }
}
$x = new test2(1);
print $x;
?>
