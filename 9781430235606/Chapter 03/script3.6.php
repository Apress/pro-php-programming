#!/usr/bin/env php
<?php
class test6 {
    private $x;
    function __construct($x = 10) {
        $this->x = $x;
    }
    function &get_x() {  // Observe the "&" in the function declaration
        return $this->x;
    }
    function set_x($x) {
        $this->x = $x;
    }
}
$a = new test6();
$b = & $a->get_x(); // $b is a reference to $x->a. It circumvents protection
                    // provided by the "private" qualifier.
print "b=$b\n";
$a->set_x(15);
print "b=$b\n";     // $b will change its value, after calling "set_x"
$b++;
print '$a->get_x()='.$a->get_x() . "\n"; // $a->x will change its value after $b being
                                         // incremented

?>

