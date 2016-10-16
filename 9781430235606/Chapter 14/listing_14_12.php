<?php

error_reporting(E_ALL ^ E_NOTICE);

$xml = <<<THE_XML
<animals xmlns:dog="http://foobar.com/dog" xmlns:cat="http://foobar.com/cat" >
  <dog:name>snoopy</dog:name>
  <dog:color>brown</dog:color>
  <dog:breed>beagle cross</dog:breed>
  <cat:name>teddy</cat:name>
  <cat:color>brown</cat:color>
  <cat:breed>tabby</cat:breed>
  <dog:name>jade</dog:name>
  <dog:color>black</dog:color>
  <dog:breed>lab cross</dog:breed>
</animals>
THE_XML;

$xml_object = simplexml_load_string($xml);

$xml_object->registerXPathNamespace('cat', 'http://foobar.com/cat');
$xml_object->registerXPathNamespace('dog', 'http://foobar.com/dog');
$names = $xml_object->xpath("dog:name");

foreach ($names as $name) {
    print $name . "<br/>";
}
?>