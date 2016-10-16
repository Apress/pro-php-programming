<?php

error_reporting(E_ALL ^ E_NOTICE);

//our data, stored in arrays
$dogs_array = array(
    array("name" => "snoopy",
        "color" => "brown",
        "breed" => "beagle cross"
    ),
    array("name" => "jade",
        "color" => "black",
        "breed" => "lab cross"
    ),
);

$cats_array = array(
    array("name" => "teddy",
        "color" => "brown",
        "breed" => "tabby"
    ),
);

//generate the xml, starting with the root
$animals = new SimpleXMLElement('<animals/>');

$cats_xml = $animals->addChild('cats');
$dogs_xml = $animals->addChild('dogs');

foreach ($cats_array as $c) {
    $cat = $cats_xml->addChild('cat');
    foreach ($c as $key => $value) {
        $tmp = $cat->addChild($key);
        $tmp->{0} = $value;
    }
}

foreach ($dogs_array as $d) {
    $dog = $dogs_xml->addChild('dog');
    foreach ($d as $key => $value) {
        $tmp = $dog->addChild($key);
        $tmp->{0} = $value;
    }
}

var_dump($animals);
$animals_dom = new DOMDocument('1.0');
$animals_dom->preserveWhiteSpace = false;
$animals_dom->formatOutput = true;
//returns a DOMElement
$animals_dom_xml = dom_import_simplexml($animals);
$animals_dom_xml = $animals_dom->importNode($animals_dom_xml, true);
$animals_dom_xml = $animals_dom->appendChild($animals_dom_xml);
$animals_dom->save('animals_formatted.xml');


print '<br/><br/>';
//verify no errors with our newly created output file
var_dump(simplexml_load_file('animals.xml'));

?>
