#!/usr/bin/env php
<?php
interface i1 {
    public function f1($a);
}
interface i2 extends i1 {
    public function f2($a);
}
class c1 implements i2 {
    private $memb;
    function __construct($memb) {
        $this->memb = $memb;
    }
    function f2($x) {
        printf("Calling F2 on %s with arg: %s\n", $this->memb, $x);
    }
}
$x = new c1("test");
$x->f2('a');
