#!/usr/bin/env php
<?php
include 'phar://animals.phar/wild.php';
include 'phar://animals.phar/domestic.php';
$a=new animal();
printf("%s\n",$a->get_type());
$b=new \wild\animal();
printf("%s\n",$b->get_type());
?>
