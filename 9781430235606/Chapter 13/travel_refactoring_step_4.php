<?php

error_reporting(E_ALL);
require_once('config.php');
require_once('location.php');
require_once('travelView_initial.php');

//
// This refactoring step:
// Extract view code into TravelView class
//
class Travel
{

    public function execute(Location $src, Location $dest)
    {
        //calculate the direction vector
        $distance_y = $dest->y - $src->y;
        $distance_x = $dest->x - $src->x;
        $angle = null;      
        $time = 0.0;
        if ($distance_x)
        {
            if ($distance_y)
            {
                $angle = atan($distance_y / $distance_x);
            } else
            {
                if ($distance_x > 0)
                {
                    $angle = 0.0; //right
                } else
                {
                    $angle = 180.0; //left
                }
            }
        } else
        {
            if ($distance_y)
            {
                if ($distance_y < 0)
                {
                    $angle = - 90.0; //down
                } else
                {
                    $angle = 90.0; //up
                }
            }
        }
        $angle_in_radians = deg2rad($angle);

        $distance = 0.0;
        //calculate the straight line distance
        if ($dest->y == $src->y)
        {
            $distance = $dest->x - $src->x;
        } else if ($dest->x == $src->x)
        {
            $distance = $dest->y - $src->y;
        } else
        {
            $distance = sqrt(($distance_x * $distance_x) +
                    ($distance_y * $distance_y));
        }
        
        TravelView::displayOurIntendedPath($angle, $distance, $src, $dest);
        
        $has_options = false;
        if (HAS_CAR || (HAS_MONEY && ON_BUS_ROUTE) || HAS_BIKE)
        {
            $has_options = true;
        }
        if ($has_options)
        {
            if (STORMY_WEATHER)
            {
                if (HAS_CAR)
                {
                    //drive
                    while (abs($src->x - $dest->x) > CAR_STEP ||
                    abs($src->y - $dest->y) > CAR_STEP)
                    {
                        $src->x += ( CAR_STEP * cos($angle_in_radians));
                        $src->y += ( CAR_STEP * sin($angle_in_radians));
                        ++$time;
                        print "driving a car... currently at (" .
                                round($src->x, 2) . ", " .
                                round($src->y, 2) . ")<br/>\n";
                    }
                    print "Got to destination by driving a car<br/>";
                } else if (HAS_MONEY && ON_BUS_ROUTE)
                {
                    //take the bus
                    while (abs($src->x - $dest->x) > BUS_STEP ||
                    abs($src->y - $dest->y) > BUS_STEP)
                    {
                        $src->x += ( BUS_STEP * cos($angle_in_radians));
                        $src->y += ( BUS_STEP * sin($angle_in_radians));
                        ++$time;
                        print "on the bus... currently at (" .
                                round($src->x, 2) . ", " .
                                round($src->y, 2) . ")<br/>\n";
                    }
                    print "Got to destination by riding the bus<br/>";
                } else
                {
                    //ride bike
                    while (abs($src->x - $dest->x) > BIKE_STEP ||
                    abs($src->y - $dest->y) > BIKE_STEP)
                    {
                        $src->x += ( BIKE_STEP * cos($angle_in_radians));
                        $src->y += ( BIKE_STEP * sin($angle_in_radians));
                        ++$time;
                        print "biking... currently at (" .
                                round($src->x, 2) . ", " .
                                round($src->y, 2) . ")<br/>\n";
                    }
                    print "Got to destination by biking<br/>";
                }
            } else
            {
                if ($distance < WALKING_MAX_DISTANCE && !IN_A_RUSH)
                {   //walk
                    while (abs($src->x - $dest->x) > WALK_STEP ||
                    abs($src->y - $dest->y) > WALK_STEP)
                    {
                        $src->x += ( WALK_STEP * cos($angle_in_radians));
                        $src->y += ( WALK_STEP * sin($angle_in_radians));
                        ++$time;
                        print "walking... currently at (" .
                                round($src->x, 2) . ", " .
                                round($src->y, 2) . ")<br/>\n";
                    }
                    print "Got to destination by walking<br/>";
                } else
                {
                    if (HAS_CAR)
                    {
                        //drive
                        $time += CAR_DELAY;
                        while (abs($src->x - $dest->x) > CAR_STEP ||
                        abs($src->y - $dest->y) > CAR_STEP)
                        {
                            $src->x += ( CAR_STEP *
                                    cos($angle_in_radians));
                            $src->y += ( CAR_STEP *
                                    sin($angle_in_radians));
                            ++$time;
                            print "driving a car... currently at (" .
                                    round($src->x, 2) . ", " .
                                    round($src->y, 2) . ")<br/>\n";
                        }
                        print "Got to destination by driving a car<br/>";
                    } else if (HAS_MONEY && ON_BUS_ROUTE)
                    {
                        //take the bus
                        $time += BUS_DELAY;
                        while (abs($src->x - $dest->x) > BUS_STEP ||
                        abs($src->y - $dest->y) > BUS_STEP)
                        {
                            $src->x += ( BUS_STEP *
                                    cos($angle_in_radians));
                            $src->y += ( BUS_STEP *
                                    sin($angle_in_radians));
                            ++$time;
                            print "on the bus... currently at (" .
                                    round($src->x, 2) . ", " .
                                    round($src->y, 2) . ")<br/>\n";
                        }
                        print "Got to destination by riding the bus<br/>";
                    } else
                    {
                        //ride bike
                        while (abs($src->x - $dest->x) > BIKE_STEP ||
                        abs($src->y - $dest->y) > BIKE_STEP)
                        {
                            $src->x += ( BIKE_STEP *
                                    cos($angle_in_radians));
                            $src->y += ( BIKE_STEP *
                                    sin($angle_in_radians));
                            ++$time;
                            print "biking... currently at (" .
                                    round($src->x, 2) . ", " .
                                    round($src->y, 2) . ")<br/>\n";
                        }
                        print "Got to destination by biking<br/>";
                    }
                }
            }
        } else
        {
            if (STORMY_WEATHER)
            {
                print "ERROR: Storming<br/>";
            } else if ($distance < WALKING_MAX_DISTANCE)
            {
                //walk
                while (abs($src->x - $dest->x) > WALK_STEP ||
                abs($src->y - $dest->y) > WALK_STEP)
                {
                    $src->x += ( WALK_STEP * cos($angle_in_radians));
                    $src->y += ( WALK_STEP * sin($angle_in_radians));
                    ++$time;
                    print "walking... currently at (" .
                            round($src->x, 2) . ", " .
                            round($src->y, 2) . ")<br/>\n";
                }
                print "Got to destination by walking<br/>";
            } else
            {
                print "ERROR: Too far to walk<br/>";
            }
        }
        print "Total time was: " . date("i:s", $time);
    }

}

//sample usage
$travel = new Travel();
$travel->execute(new Location(1, 3), new Location(4, 10));
//Sample Output:
//
//Trying to go from (1, 3) to (4, 10)
//In a rush
//Distance is 7.6157731058639 in the direction of 1.1659045405098 degrees
//Got to destination by driving a car
//Total time was: 00:20
?>