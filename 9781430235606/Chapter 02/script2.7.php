#!/usr/bin/env php
<?php
class iter implements iterator {
    private $items;
    private $index = 0;
    function __construct(array $items) {
        $this->items = $items;
    }
    function rewind() {
        $this->index = 0;
    }
    function current() {
        return ($this->items[$this->index]);
    }
    function key() {
        return ($this->index);
    }
    function next() {
        $this->index++;
        if (isset($this->items[$this->index])) {
            return ($this->items[$this->index]);
        } else {
            return (NULL);
        }
    }
    function valid() {
        return (isset($this->items[$this->index]));
    }
}
$x = new iter(range('A', 'D'));
foreach ($x as $key => $val) {
    print "key=$key\tvalue=$val\n";
}

foreach ($x as $val) {
    print "value=$val\n";
}
