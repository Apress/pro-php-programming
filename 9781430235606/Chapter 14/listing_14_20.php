<?php

//XMLReader equivalent of Listing 14-4
//no namespaces, no xpath

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

$xml_object = new XMLReader();
$xml_object->XML($xml);
$dog_parent = false;
while ($xml_object->read())
{
    if ($xml_object->nodeType == XMLREADER::ELEMENT)
    {
        if ($xml_object->name == "cat")
        {
            $dog_parent = false;
        } else if ($xml_object->name == "dog")
        {
            $dog_parent = true;
        } else
        if ($xml_object->name == "name" && $dog_parent)
        {
            $xml_object->read();
            if ($xml_object->nodeType == XMLReader::TEXT)
            {
                print $xml_object->value . "<br/>";
                $dog_parent = false;
            }
        }
    }
}
?>