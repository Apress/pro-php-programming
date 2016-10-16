<?php

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

$xml_object = simplexml_load_string($xml);

$result = $xml_object->xpath("dog/name[contains(., 'jade')]");
print (String)$result[0]->attributes()->id;

?>
