<?php
error_reporting ( E_ALL );
require_once('wurflSetup.php');

$wurflManager = getWurflManager ();

$device = $wurflManager->getDeviceForHttpRequest ( $_SERVER );
$capability_groups = $wurflManager->getListOfGroups ();
asort ( $capability_groups );

foreach ( $capability_groups as $group ) {
        //only output the capabilities of certain groups
	if (in_array ( $group, array ("ajax", "css", "image_format" ) )) {
		print "<strong>" . $group . "</strong><br/>";
		print "<ul>";
		foreach ( $wurflManager->getCapabilitiesNameForGroup ( $group ) as $name ) {
			$c = $device->getCapability ( $name );
			if ($c == "false") {
				$c = "<li><span style='color:red; 
                                                       text-decoration:line- through;'>";
				$c .= $name . "</span>";
			} else if ($c == "true") {
				$c = "<li><span style='color:green;'> &#10003; ";
				$c .= $name . "</span>";
			} else {
				$c = "<li>" . $name . ": <em>" . $c . "</em>";
			}
			print $c;
			print "</li>";
		}
		print "</ul>";
	}
}

?>