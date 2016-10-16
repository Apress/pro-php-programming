<?php
error_reporting ( E_ALL ^ E_DEPRECATED);
require_once ('ImageAdapter/imageAdaptation.php');

$base_image = 'ImageAdapter/imgc/eye.jpg';

$iphone_ua = "Mozilla/4.0 (compatible; MSIE 4.01; 
            Windows CE; PPC; 240x320; HP iPAQ h6300)";
$img = convertImageUA ( $base_image, $iphone_ua );
if ( $img ) {
        print "<img src=\"$img\"><br/>";
}

$trident_ua = "Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.0; Trident/3.1; IEMobile/7.0; HTC; 7 Mozart; Orange)";
$img = convertImageUA ( $base_image, $trident_ua );
if ( $img ) {
        print "<img src=\"$img\">";
}
?>