<?php

require_once dirname(__FILE__) . '/../Travel.php';
require_once 'PHPUnit/Autoload.php';

class TravelTest extends PHPUnit_Framework_TestCase {

    protected $travel;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->travel = new Travel();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    public function testTravel() {
        $this->fail('no test implemented');
    }

}
?>
