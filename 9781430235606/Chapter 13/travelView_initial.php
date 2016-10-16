<?php

error_reporting(E_ALL);
require_once ('config.php');
require_once ('location.php');

class TravelView
{

    public static function displayOurIntendedPath($angle, $distance, Location $src, Location $dest)
    {
        print "Trying to go from " . $src->toString() . " to " .
                $dest->toString() . "<br/>\n";
        if (IN_A_RUSH)
        {
            print "<strong>In a rush</strong><br/>\n";
        }
        print "Distance is " . $distance . " in the direction of " .
                $angle . " degrees<br/>";
    }

}

?>
