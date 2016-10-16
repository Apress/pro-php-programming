#!/usr/bin/env php
<?php
class A {
    protected static $prop = 2;
    function __construct() {
        self::$prop*= 2;
    }
    function get_prop() {
        return (self::$prop);
    }
}
class B extends A {
    protected static $prop = 3;
    function __construct() {
        self::$prop*= 3;
    }
    #    function get_prop() {
    #        return(self::$prop);
    #    }
    
}
$x = new A();
$y = new B();
printf("A:%d\n", $x->get_prop());
printf("B:%d\n", $y->get_prop());
?>
