<?php

error_reporting(E_ALL);
require_once('wurflSetup.php');

$wurflManager = getWurflManager();

$device = $wurflManager->getDeviceForHttpRequest($_SERVER);

print "<p>ID Stack is: <br/>";
while ($device != null)
{
    print $device->id . "<br/>";
    if (!$device->fallBack || $device->fallBack == "root")
    {
        break;
    }
    $device = $wurflManager->getDevice($device->fallBack);
}
print "</p>";

?>