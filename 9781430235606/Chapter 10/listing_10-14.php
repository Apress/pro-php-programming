<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("php-google-map-api/GoogleMap.php");
require_once("php-google-map-api/JSMin.php");

$gmap = new GoogleMapAPI();
$gmap->addMarkerByAddress(
        "Eiffel Tower, Paris, France",
        "Eiffel Tower Title",
        "Eiffel Tower Description" );

require_once('gmap_template.php');
?>