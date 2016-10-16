#!/usr/bin/env php
<?php
class test5 {
    private $prop;
    function __construct($prop) {
        $this->prop = $prop;
    }
    function get_prop() {
        return ($this->prop);
    }
    function set_prop($prop) {
        $this->prop = $prop;
    }
}
function funct(test5 $x) {
    $x->set_prop(5);
}
$x = new test5(10);
printf("Element X has property %s\n", $x->get_prop());
funct($x);
printf("Element X has property %s\n", $x->get_prop());

$arr = range(1, 5);
foreach ($arr as $a) {
    $a*= 2;
}
foreach ($arr as $a) {
    print "$a\n";
}
?>
