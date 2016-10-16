<?php
error_reporting ( E_ALL ^ E_NOTICE ^ E_DEPRECATED );
require_once ('simplepie/simplepie.inc');

$feed_url = "http://feeds.wired.com/wired/index?format=xml";
$simplepie = new Simplepie ( $feed_url );
$item = array_pop($simplepie->get_items());
$creator = $item->get_item_tags("http://purl.org/dc/elements/1.1/", "creator");
var_dump($creator);