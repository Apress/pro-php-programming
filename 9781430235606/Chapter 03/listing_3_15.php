<?php

error_reporting(E_ALL);
require_once('wurflSetup.php');

$wurflManager = getWurflManager();

$_SERVER['HTTP_USER_AGENT'] =
        "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9?
 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7";

$device = $wurflManager->getDeviceForHttpRequest($_SERVER);

//output fields that interest us

//display information
print "<h2>" . $device->id . "</h2>";
print "<p><strong>Display: </strong><br/>";
print $device->getCapability( 'resolution_width' ) . " x "; //width
print $device->getCapability( 'resolution_height' ) . " : "; //height
print $device->getCapability( 'colors' ) . ' colors<br/>';
print "dual orientation: ".$device->getCapability( 'dual_orientation' ) . "</p>";

//audio information
print "<p><strong>Supported Audio Formats:</strong><br/>";
foreach ( $wurflManager->getCapabilitiesNameForGroup( "sound_format" ) as $name ) {
    $c = $device->getCapability( $name );
    if ( $c == "true") {
            print $name . "<br/>";
    }
}
print "</p>";
?>