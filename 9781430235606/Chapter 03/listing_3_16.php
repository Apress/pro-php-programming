<?php

error_reporting(E_ALL);
require_once('Tera-WURFL/TeraWurfl.php');

$teraWURFL = new TeraWurfl();
$iphone_ua = "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us)?
 AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7";

if ( $teraWURFL->getDeviceCapabilitiesFromAgent( $iphone_ua ) ) {
   print "ID: ".$teraWURFL->capabilities['id']."<br/>";
} else {
    print "device not found";
}
?>