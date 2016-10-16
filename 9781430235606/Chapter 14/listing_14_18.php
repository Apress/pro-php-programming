<?php
//DOMDocument equivalent of Listing 14-9

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

$xml_object = new DOMDocument();
$xml_object->loadXML($xml);
$xpath = new DOMXPath($xml_object);

$names = $xpath->query("*/name");
foreach ($names as $element) {
    $parent_type = $element->parentNode->nodeName;
    echo "$element->nodeValue ($parent_type)<br/>";
}
?>