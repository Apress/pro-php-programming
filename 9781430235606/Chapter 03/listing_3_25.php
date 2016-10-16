<?php
error_reporting(E_ALL);
require_once ('GChartPhp/gChart.php');

$qr = new gQRCode();
$qr->setQRCode( 'Hello world qrcode' );
echo "<img src=\"".$qr->getUrl()."\" />";
?>