<?php

error_reporting(E_ALL ^ E_NOTICE);

$xml = <<<THE_XML
  <animal>
    <type>dog</type>
    <name>snoopy</name>
  </animal>     
THE_XML;

//to place the XML string into a SimpleXML object takes one line
$xml_object = simplexml_load_string($xml);

foreach ($xml_object as $element => $value) { 
    print $element . ": " . $value . "<br/>";
}

//$xml_object is now at the root, 'animal'

/**
  The document is represented as an object, so
  we can iterate through the attributes to
  output the 'type' and 'name' elements
 */
/*
  type: dog
  name: snoopy
 */
?>