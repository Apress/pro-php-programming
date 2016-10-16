<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("php-google-map-api/GoogleMap.php");
require_once("php-google-map-api/JSMin.php");

$gmap = new GoogleMapAPI();
$gmap->addMarkerByAddress("Saskatoon, SK","", "Home");
$gmap->addMarkerByAddress("Vancouver, BC","", "West Coast");
$gmap->addMarkerByAddress("Montreal, QC","", "Hockey");
$gmap->addMarkerByAddress("Playa del Carmen, Mexico","", "Tropical vacation");
$gmap->setMapType('terrain');

require_once('gmap_template.php');
?>
