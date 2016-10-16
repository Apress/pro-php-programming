#!/usr/local/bin/php
<?php
class test1 {
    protected $members = array();
    public function __get($arg) {
        if (array_key_exists($arg, $this->members)) {
            return ($this->members[$arg]);
        } else return ("No such luck!\n");
    }
    public function __set($key, $val) {
        $this->members[$key] = $val;
    }
    public function __isset($arg) {
        return (isset($this->members[$arg]));
    }
}
$x = new test1();
print $x->speed_limit;
$x->speed_limit = "65 MPH";
if (isset($x->speed_limit)) {
    printf("Speed limit is set to %s\n", $x->speed_limit);
}
$x->speed_limit = NULL;
if (empty($x->speed_limit)) {
    print "The method __isset() was called.\n";
} else {
    print "The __isset() method wasn't called.\n";
}
?>
