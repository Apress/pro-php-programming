<?php

error_reporting(E_ALL);

$items = array(
    array(
        "title" => "a",
        "description" => "b",
        "link" => "c",
        "guid" => "d",
        "lastBuildDate" => "",
        "pubDate" => "e"),
    array(
        "title" => "a2",
        "description" => "b2",
        "link" => "c2",
        "guid" => "d2",
        "lastBuildDate" => "",
        "pubDate" => "e2"),
);

$rss_xml = new SimpleXMLElement('<rss xmlns:dc="http://purl.org/dc/elements/1.1/"/>');
$rss_xml->addAttribute('version', '2.0');
$channel = $rss_xml->addChild('channel');

foreach ($items as $item) {
    $item_tmp = $channel->addChild('item');

    foreach ($item as $key => $value) {
        if ($key == "pubDate") {
            $tmp = $item_tmp->addChild($key, $value, "http://purl.org/dc/elements/1.1/");
        } else if($key == "lastBuildDate"){
            //Format will be: Fri, 04 Feb 2011 00:11:08 +0000
            $tmp = $item_tmp->addChild($key, date('r', time()));
        } else {
            $tmp = $item_tmp->addChild($key, $value);
        }
    }
}
//for nicer formatting
$rss_dom = new DOMDocument('1.0');
$rss_dom->preserveWhiteSpace = false;
$rss_dom->formatOutput = true;
//returns a DOMElement
$rss_dom_xml = dom_import_simplexml($rss_xml);
$rss_dom_xml = $rss_dom->importNode($rss_dom_xml, true);
$rss_dom_xml = $rss_dom->appendChild($rss_dom_xml);
$rss_dom->save('rss_formatted.xml');
?>
