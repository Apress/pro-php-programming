<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("php-google-map-api/GoogleMap.php");
require_once("php-google-map-api/JSMin.php");

$gmap = new GoogleMapAPI();
$gmap->addMarkerByAddress( "New York, NY", "New York Traffic", "Traffic description here" );
$gmap->setMapType( 'map' );
$gmap->setZoomLevel( 15 );
$gmap->enableTrafficOverlay();

require_once('gmap_template.php');
?>