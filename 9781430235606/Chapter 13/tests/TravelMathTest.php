<?php

require_once dirname(__FILE__) . '/../TravelMath.php';
require_once 'PHPUnit/Autoload.php';


/**
 * TravelMath test case.
 */
class TravelMathTest extends PHPUnit_Framework_TestCase {

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp() {
        parent::setUp ();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown() {
        parent::tearDown ();
    }

    /**
     * Constructs the test case.
     */
    public function __construct() {
        // TODO Auto-generated constructor
    }

    public function testCalculateDistance_no_difference() {
        $src = new Location(3, 7);
    
        $expected = 0;
        $actual = TravelMath::calculateDistance($src, $src);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateDistance_no_y_change() {
        $src = new Location(5, 7);
        $dest = new Location(3, 7);

        $expected = 2;
        $actual = TravelMath::calculateDistance($src, $dest);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateDistance_no_x_change() {
        $src = new Location(3, 10);
        $dest = new Location(3, 7);

        $expected = 3;
        $actual = TravelMath::calculateDistance($src, $dest);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateDistance_x_and_y_change() {
        $src = new Location(6, 7);
        $dest = new Location(3, 11);

        $expected = 5;
        $actual = TravelMath::calculateDistance($src, $dest);
        $this->assertEquals($expected, $actual, '', 0.01);
    }

    public function testCalculateAngleInDegrees_moving_nowhere() {
        $src = new Location(3, 7);

        $expected = null;
        $actual = TravelMath::calculateAngleInDegrees($src, $src);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateAngleInDegrees_moving_straight_up() {
        $src = new Location(3, 7);
        $dest = new Location(3, 12);

        $expected = 90.0;
        $actual = TravelMath::calculateAngleInDegrees($src, $dest);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateAngleInDegrees_moving_straight_down() {
        $src = new Location(3, 12);
        $dest = new Location(3, 7);

        $expected = -90.0;
        $actual = TravelMath::calculateAngleInDegrees($src, $dest);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateAngleInDegrees_moving_straight_left() {
        $src = new Location(6, 7);
        $dest = new Location(3, 7);

        $expected = 180.0;
        $actual = TravelMath::calculateAngleInDegrees($src, $dest);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateAngleInDegrees_moving_straight_right() {
        $src = new Location(3, 7);
        $dest = new Location(6, 7);

        $expected = 0.0;
        $actual = TravelMath::calculateAngleInDegrees($src, $dest);
        $this->assertEquals($expected, $actual);
    }

    public function testCalculateAngleInDegrees_moving_northeast() {
        //random values where both $x2 != $x1 and $y2 != $y1
        $x1 = rand(-25, 15);
        $y1 = rand(-25, 25);
        $x2 = rand(-25, 25);
        $y2 = rand(-25, 25);

        while ($x2 == $x1) {
            $x2 = rand(-25, 25);
        }
        while ($y2 == $y1) {
            $y2 = rand(-25, 25);
        }

        $src = new Location($x1, $y1);
        $dest = new Location($x2, $y2);
        
        $expected = rad2deg(atan(($y2 - $y1) / ($x2 - $x1)));
        $actual = TravelMath::calculateAngleInDegrees($src, $dest);
        $this->assertEquals($expected, $actual,  '', 0.01);
    }

    public function testIsCloseToDest_x_too_far_should_fail() {
        $src = new Location(3, 9);
        $dest = new Location(3.5, 7);
        $step = 1.0;

        $expected = false;
        $actual = TravelMath::isCloseToDest($src, $dest, $step);
        $this->assertEquals($expected, $actual);
    }

    public function testIsCloseToDest_y_too_far_should_fail() {
        $src = new Location(4.5, 7.5);
        $dest = new Location(3.5, 7);
        $step = 1.0;

        $expected = false;
        $actual = TravelMath::isCloseToDest($src, $dest, $step);
        $this->assertEquals($expected, $actual);
    }

    public function testIsCloseToDest_should_pass() {
        $src = new Location(3, 7.5);
        $dest = new Location(3.5, 7);
        $step = 1.0;

        $expected = true;
        $actual = TravelMath::isCloseToDest($src, $dest, $step);
        $this->assertEquals($expected, $actual);
    }
}

