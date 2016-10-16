#!/usr/bin/env php
<?php
require_once('domestic.php');
require_once('wild.php');
	$a=new animal();
	printf("%s\n",$a->get_type());
	$b=new wild\animal();
	printf("%s\n",$b->get_type());
	use wild\animal as beast;
	$c=new beast();
	printf("%s\n",$c->get_type());
?>
