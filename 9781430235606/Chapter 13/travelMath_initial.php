<?php

error_reporting(E_ALL);
require_once ('location.php');

class TravelMath {

    public static function calculateDistance($src, $dest) {
        $distance = 0.0;
        //calculate the straight line distance
        if ($dest->y == $src->y) {
            $distance = $dest->x - $src->x;
        } else if ($dest->x == $src->x) {
            $distance = $dest->y - $src->y;
        } else {
            $distance_y = $dest->y - $src->y;
            $distance_x = $dest->x - $src->x;
            $distance = sqrt(($distance_x * $distance_x) + ($distance_y * $distance_y));
        }
        return $distance;
    }

    public static function calculateAngleInDegrees($src, $dest) {
        //calculate the direction vector
        $distance_y = $dest->y - $src->y;
        $distance_x = $dest->x - $src->x;
        $angle = null;

        if ($distance_x) {
            if ($distance_y) {
                $angle = atan($distance_y / $distance_x);
            } else {
                if ($distance_x > 0) {
                    $angle = 0.0; //right
                } else {
                    $angle = 180.0; //left
                }
            }
        } else {
            if ($distance_y) {
                if ($distance_y < 0) {
                    $angle = - 90.0;    //down
                } else {
                    $angle = 90.0;      //up
                }
            }
        }
        return $angle;
    }

    public static function isCloseToDest($src, $dest, $step) {
        return (
        (abs($src->x - $dest->x) < $step) &&
        (abs($src->y - $dest->y) < $step )
        );
    }

}
?>
