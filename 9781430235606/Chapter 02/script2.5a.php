#!/usr/bin/php
# Demonstrating deep copy.
<?php
class test3a {
    protected $memb;
    protected $copies;
    function __construct($memb, $copies = 0) {
        $this->memb = $memb;
        $this->copies = $copies;
    }
    function __destruct() {
        printf("Destroying object %s...\n", $this->memb);
    }
    function __clone() {
        $this->memb.= ":CLONE";
        $this->copies++;
    }
    function get_copies() {
        printf("Object %s has %d copies.\n", $this->memb, $this->copies);
    }
}
$x = new test3a("object 1");
$x->get_copies();
$y = new test3a("object 2");
$x = clone $y;
$x->get_copies();
$y->get_copies();
print "End of the script, executing destructor(s).\n";
?>
