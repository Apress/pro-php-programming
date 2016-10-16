<?php

//equivalent of Listing 14-13
error_reporting(E_ALL);

$xml = <<<THE_XML
<animals>
  <dog>
    <name id="1">snoopy</name>
    <color>brown</color>
    <breed>beagle cross</breed>
  </dog>
  <cat>
    <name id="2">teddy</name>
    <color>brown</color>
    <breed>tabby</breed>
  </cat>
  <dog>
    <name id="3">jade</name>
    <color>black</color>
    <breed>lab cross</breed>
  </dog>
</animals>
THE_XML;

$xml_object = new DOMDocument();
$xml_object->loadXML($xml);
$xpath = new DOMXPath($xml_object);

$results = $xpath->query("dog/name[contains(., 'jade')]");
foreach ($results as $element)
{
    print $element->attributes->getNamedItem("id")->nodeValue;
}
?>
