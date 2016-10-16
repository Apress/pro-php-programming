<?php

error_reporting(E_ALL ^ E_NOTICE);

//generate the xml, starting with the root
$animals = new SimpleXMLElement('<animals/>');
$animals->{0} = 'Hello World';

$animals->asXML('animals.xml');

//verify no errors with our newly created output file
var_dump(simplexml_load_file('animals.xml'));

?>
