<?php

error_reporting(E_ALL);
require_once ('config.php');
require_once ('location.php');

class TravelView {

    public static function displayOurIntendedPath(
    $angle, $distance, Location $src, Location $dest) {
        print "Trying to go from " . $src->toString() . " to " .
                $dest->toString() . "<br/>\n";
        if (IN_A_RUSH) {
            print "<strong>In a rush</strong><br/>\n";
        }
        print "Distance is " . $distance . " in the direction of " .
                $angle . " degrees<br/>";
    }

    public static function displaySummary($time) {
        print "Total time was: " . date("i:s", $time);
    }

    public static function displayError($error) {
        print "ERROR: " . $error . "<br/>";
    }

    public static function displayLocationStatusMessage($method, $x, $y) {
        print $method . "... currently at (" .
                round($x, 2) . ",  " .
                round($y, 2) . ")<br/>\n";
    }

    public static function displayArrived($message) {
        print "Got to destination by " . strtolower($message) . "<br/>";
    }

}
?>
