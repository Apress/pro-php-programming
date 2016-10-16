<?php

error_reporting ( E_ALL );
require_once ('Tera-WURFL/TeraWurfl.php');
require_once ('Tera-WURFL/TeraWurflUtils/TeraWurflDeviceImage.php');

$teraWURFL = new TeraWurfl ();
$iphone_ua = "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us)?
 AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7";

if ($teraWURFL->getDeviceCapabilitiesFromAgent ( $iphone_ua )) {
	$brand_name = $teraWURFL->getDeviceCapability ( "brand_name" );
	$model_name = $teraWURFL->getDeviceCapability ( "model_name" );
	$model_extra_info = $teraWURFL->getDeviceCapability ( "model_extra_info" );
	
	//output fields that interest us
	print "<h3>" . $brand_name . " " . $model_name . " " . $model_extra_info . "</h3>";
	
	//image
	$image = new TeraWurflDeviceImage ( $teraWURFL );
	//location on server
	$image->setBaseURL ( '/Tera-WURFL/device_pix/' );
	//location on filesystem
	$image->setImagesDirectory ( $_SERVER ['DOCUMENT_ROOT'] . 
                                    '/Tera-WURFL/device_pix/' );
	
	$image_src = $image->getImage ();
	if ($image_src) {
		print '<img src="' . $image_src . '"/>';
	} else {
		echo "No image available";
	}

        //display information
	print "<p><strong>Display: </strong><br/>";
	print $teraWURFL->getDeviceCapability ( 'resolution_width' ) . " x "; //width
	print $teraWURFL->getDeviceCapability ( 'resolution_height' ) . " : "; //height
	print $teraWURFL->getDeviceCapability ( 'colors' ) . ' colors<br/>';
	print "dual orientation: " . $teraWURFL->getDeviceCapability ( 'dual_orientation' );
	print "</p>";
	
	//audio information
	print "<p><strong>Supported Audio Formats:</strong><br/>";
	
	foreach ( $teraWURFL->capabilities ['sound_format'] as $name => $value ) {
		if ($value == "true") {
			print $name . "<br/>";
		}
	}
	print "</p>";
} else {
	print "device not found";
}
?>