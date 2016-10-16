#!/usr/bin/php
<?php
function __autoload ($class) {
    require_once("ACME$class.php");
}

$x = new manager("Smith", 300, 20);
$x->give_raise(50);
$y = new employee("Johnson", 100);
$y->give_raise(50);
?>
