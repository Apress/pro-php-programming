<?php

error_reporting(E_ALL);
require_once ('GChartPhp/gChart.php');

$map = new gMapChart();

$map->setZoomArea('europe');  //geographic area
//italy, sweden, great britain, spain, finland
$map->setStateCodes(array('IT', 'SE', 'GB', 'ES', 'FI'));
$map->addDataSet(array(50, 100, 24, 80, 65)); //level of shading in gradient
$map->setColors(
        'E7E7E7', //default
        array('0077FF', '000077') //gradient color
);
echo "<img src=\"" . $map->getUrl() . "\" /><br/>Europe";
?>