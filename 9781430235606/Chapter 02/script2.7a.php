#!/usr/bin/env php
<?php
class file_iter implements iterator {
    private $fp;
    private $index = 0;
    private $line;
    function __construct($name) {
        $fp = fopen($name, "r");
        if (!$fp) {
            die("Cannot open $name for reading.\n");
        }
        $this->fp = $fp;
        $this->line = rtrim(fgets($this->fp), "\n");
    }
    function rewind() {
        $this->index = 0;
        rewind($this->fp);
        $this->line = rtrim(fgets($this->fp), "\n");
    }
    function current() {
        return ($this->line);
    }
    function key() {
        return ($this->index);
    }
    function next() {
        $this->index++;
        $this->line = rtrim(fgets($this->fp), "\n");
        if (!feof($this->fp)) {
            return ($this->line);
        } else {
            return (NULL);
        }
    }
    function valid() {
        return (feof($this->fp) ? FALSE : TRUE);
    }
}
$x = new file_iter("qbf.txt");
foreach ($x as $lineno => $val) {
    print "$lineno:\t$val\n";
}
