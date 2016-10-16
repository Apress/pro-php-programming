<?php

error_reporting(E_ALL);
require_once('config.php');
require_once('location.php');
require_once('travelMath_initial.php');
require_once('travelView_initial.php');

//
// This refactoring step:
// Extracted driveCar, walk, rideBike, rideBus methods
// assign $src and $dest class members
// This refactoring corresponds to Listing 13-14
//

class Travel
{

    private $src = null;
    private $dest = null;
    private $time = 0.0;

    public function execute(Location $src, Location $dest)
    {
        $this->src = $src;
        $this->dest = $dest;
        $this->time = 0.0;
        $angle = TravelMath::calculateAngleInDegrees($src, $dest);
        $angle_in_radians = deg2rad($angle);
        $distance = TravelMath::calculateDistance($src, $dest);

        TravelView::displayOurIntendedPath($angle, $distance, $src, $dest);
        $has_options = $this->doWeHaveOptions();

        if ($has_options)
        {
            if (STORMY_WEATHER)
            {
                if (HAS_CAR)
                {
                    $this->driveCar();
                } else if (HAS_MONEY && ON_BUS_ROUTE)
                {
                    $this->rideBus();
                } else
                {
                    $this->rideBike();
                }
            } else
            {
                if ($distance < WALKING_MAX_DISTANCE && !IN_A_RUSH)
                {
                    $this->walk();
                } else
                {
                    if (HAS_CAR)
                    {
                        $this->driveCar();
                    } else if (HAS_MONEY && ON_BUS_ROUTE)
                    {
                        $this->rideBus();
                    } else
                    {
                        $this->rideBike();
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
                $this->walk();
            } else
            {
                print "ERROR: Too far to walk<br/>";
            }
        }
        print "Total time was: " . date("i:s", $this->time);
    }

    private function doWeHaveOptions()
    {
        $has_options = false;
        if (HAS_CAR || (HAS_MONEY && ON_BUS_ROUTE) || HAS_BIKE)
        {
            $has_options = true;
        }
        return $has_options;
    }

    private function driveCar()
    {
        $this->time += CAR_DELAY;
        //drive
        while (abs($this->src->x - $this->dest->x) > CAR_STEP ||
        abs($this->src->y - $this->dest->y) > CAR_STEP)
        {
            $this->src->x += ( CAR_STEP * cos($this->angle_in_radians));
            $this->src->y += ( CAR_STEP * sin($this->angle_in_radians));
            ++$this->time;
            print "driving a car... currently at (" . round($this->src->x, 2) .
                    ", " . round($this->src->y, 2) . ")<br/>\n";
        }

        print "Got to destination by driving a car<br/>";
    }

    private function rideBus()
    {
        //take the bus
        $this->time += BUS_DELAY;
        while (abs($this->src->x - $dthis->est->x) > BUS_STEP ||
        abs($this->src->y - $this->dest->y) > BUS_STEP)
        {
            $this->src->x += ( BUS_STEP * cos($this->angle_in_radians));
            $this->src->y += ( BUS_STEP * sin($this->angle_in_radians));
            ++$this->time;
            print "on the bus... currently at (" . round($this->src->x, 2) .
                    ", " . round($this->src->y, 2) . ")<br/>\n";
        }
        print "Got to destination by riding the bus<br/>";
    }

    private function rideBike()
    {
        //ride bike
        while (abs($this->src->x - $this->dest->x) > BIKE_STEP ||
        abs($this->src->y - $this->dest->y) > BIKE_STEP)
        {
            $this->src->x += ( BIKE_STEP * cos($this->angle_in_radians));
            $this->src->y += ( BIKE_STEP * sin($this->angle_in_radians));
            ++$this->time;
            print "biking... currently at (" . round($this->src->x, 2) .
                    ", " . round($this->src->y, 2) . ")<br/>\n";
        }
        print "Got to destination by biking<br/>";
    }

    private function walk()
    {
        //walk
        while (abs($this->src->x - $this->dest->x) > WALK_STEP ||
        abs($this->src->y - $this->dest->y) > WALK_STEP)
        {
            $this->src->x += ( WALK_STEP * cos($this->angle_in_radians));
            $this->src->y += ( WALK_STEP * sin($this->angle_in_radians));
            ++$this->time;
            print "walking... currently at (" . round($this->src->x, 2) .
                    ", " . round($this->src->y, 2) . ")<br/>\n";
        }
        print "Got to destination by walking<br/>";
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