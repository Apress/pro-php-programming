#!/usr/bin/env php
<?php
class test4 {
    private static $objcnt;
    function __construct() {
        ++self::$objcnt;
    }
    function get_objcnt() {
        return (test4::$objcnt);
    }
    function bad() {
        return($this->objcnt);
    }
}
$x = new test4();
printf("X: %d object was created\n", $x->get_objcnt());
$y = new test4();
printf("Y: %d objects were created\n", $y->get_objcnt());
print "Let's revisit the variable x:\n";
printf("X: %d objects were created\n", $x->get_objcnt());
print "When called as object property, PHP will invent a new member of X...\n";
printf("and intialize it to:%d\n", $x->bad());
?>
