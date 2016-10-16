<?php

error_reporting(E_ALL ^ E_NOTICE);

$xml = <<<THE_XML
<animals>
  <dog>
    <name>snoopy</name>
    <color>brown</color>
    <breed>beagle cross</breed>
  </dog>
  <cat>
    <name>teddy</name>
    <color>brown</color>
    <breed>tabby</breed>
  </cat>
  <dog>
    <name>jade</name>
    <color>black</color>
    <breed>lab cross</breed>
  </dog>
</animals>
THE_XML;

$xml_object = simplexml_load_string($xml);

$names = $xml_object->xpath("*/name");
foreach ($names as $element) {
    $parent = $element->xpath("..");
    $type = $parent[0]->getName();
    echo "$element ($type)<br/>";
}
?>