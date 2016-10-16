<?php

error_reporting(E_ALL);

$xml = <<<THE_XML
  <animal>
    <type>dog</type>
    <name>snoopy</name>
  </animal>     
THE_XML;

$xml_object = simplexml_load_string($xml);

$type = $xml_object->xpath("type");
foreach($type as $t) {
    echo $t."<br/><br/>";
}
$xml_object = simplexml_load_string($xml);
$children = $xml_object->xpath("/animal/*");
foreach($children as $element) {
    echo $element->getName().": ".$element."<br/>";
}
?>