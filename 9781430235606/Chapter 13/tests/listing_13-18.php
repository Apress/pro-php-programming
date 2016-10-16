<?php

require_once dirname(__FILE__) . '/../walk.php';

class WalkTest extends PHPUnit_Framework_TestCase
{

    protected $object;

    protected function setUp()
    {
        $this->object = new Walk;
    }

    protected function tearDown()
    {
        
    }

    public function testTimeToWalkTheDog_default_shouldReturnTrue()
    {
        print "testTimeToWalkTheDog_default";
        $this->assertTrue($this->object->timeToWalkTheDog());
    }

    public function testTimeToWalkTheDog_haveNoDog_shouldReturnFalse()
    {
        print "testTimeToWalkTheDog_default";
        $this->object->ownADog = false;
        $this->assertTrue(!$this->object->timeToWalkTheDog());
    }

}

?>
