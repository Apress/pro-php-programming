<?php

error_reporting(E_ALL);
require_once ('GChartPhp/gChart.php');

$candlestick = new gLineChart(400, 400);

//the regular line graph of close prices
//32 pts
$candlestick->addDataSet(
        array(90, 70, 60, 65, 75, 85, 70, 75,
            80, 70, 75, 85, 100, 105, 100, 95,
            80, 70, 65, 35, 30, 45, 40, 50,
            40, 40, 50, 60, 70, 75, 80, 75
));

//the candlestick markers. the close price is the same as our line graph
$candlestick->addHiddenDataSet(
        array(100, 95, 80, 75, 85, 95, 90, 95,
            90, 85, 85, 105, 110, 120, 110, 110,
            105, 90, 75, 85, 45, 55, 50, 70,
            55, 50, 55, 65, 80, 85, 90, 85
)); //high
$candlestick->addHiddenDataSet(
        array(80, 90, 70, 60, 65, 75, 85, 70,
            75, 80, 70, 75, 85, 100, 105, 100,
            95, 80, 70, 65, 35, 30, 45, 40,
            50, 45, 40, 50, 60, 70, 75, 80
)); //open
$candlestick->addHiddenDataSet(
        array(90, 70, 60, 65, 75, 85, 70, 75,
            80, 70, 75, 85, 100, 105, 100, 95,
            80, 70, 65, 35, 30, 45, 40, 50,
            40, 40, 50, 60, 70, 75, 80, 75
)); //close
$candlestick->addHiddenDataSet(
        array(65, 65, 50, 50, 55, 65, 65, 65,
            70, 50, 65, 75, 80, 90, 90, 85,
            60, 60, 55, 30, 25, 20, 30, 30,
            30, 25, 30, 40, 50, 55, 55, 55
));   //low

$candlestick->addValueMarkers(
        'F', //line marker type is candlestick
        '000000', //black color
        1, //start with "high" data series
        '1:', //do not show first marker
        5           //marker width
);
$candlestick->setVisibleAxes(array('x', 'y'));  //both x and y axis
$candlestick->addAxisRange(0, 0, 32);           //x-axis
$candlestick->addAxisRange(1, 0, 110);          //y-axis

echo "<img src=\"" . $candlestick->getUrl() . "\" /><br/>Stock market report";
?>