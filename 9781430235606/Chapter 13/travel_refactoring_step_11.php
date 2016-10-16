<?php

error_reporting(E_ALL);
require_once('config.php');
require_once('location.php');
require_once('travelMath.php');
require_once('travelView.php');

//
// This refactoring step:
// Extracted TravelMath::isCloseToDest, TravelView::displayError
// TravelView::displayArrived and TravelView::displayLocationStatusMessage,
// TravelView::displaySummary methods.
// This refactoring lines up with Listing 13-22
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
                TravelView::displayError("Storming");
            } else if ($distance < WALKING_MAX_DISTANCE)
            {
                $this->walk();
            } else
            {
                TravelView::displayError("Too far to walk");
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

    private function move($step, $message)
    {
        while (!TravelMath::isCloseToDest($this->src, $this->dest, $step))
        {
            $this->moveCloserToDestination($step, $message);
        }

        TravelView::displayArrived($message);
    }

    private function driveCar()
    {
        $this->time = CAR_DELAY;
        $this->move(CAR_STEP, "Driving a Car");
    }

    private function rideBus()
    {
        $this->time = BUS_DELAY;
        $this->move(BUS_STEP, "On the Bus");
    }

    private function rideBike()
    {
        $this->move(BIKE_STEP, "Biking");
    }

    private function walk()
    {
        $this->move(WALK_STEP, "Walking");
    }

    private function moveCloserToDestination($step, $method)
    {
        $this->src->x += ( $step * cos($this->angle_in_radians));
        $this->src->y += ( $step * sin($this->angle_in_radians));
        ++$this->time;
        TravelView::displayLocationStatusMessage($method, $this->src->x, $this->src->y);
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