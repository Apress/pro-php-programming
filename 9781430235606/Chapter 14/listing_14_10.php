<?php

error_reporting(E_ALL);

$xml = simplexml_load_file("template.xhtml");
$content = $xml->xpath("//*[@id='main_center']");
print (String)$content[0];

?>
