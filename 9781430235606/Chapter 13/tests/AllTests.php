<?php

error_reporting(E_ALL ^ ~E_NOTICE);
require_once 'PHPUnit/Autoload.php';
require_once 'TravelMathTest.php';
require_once 'TravelTest.php';

class AllTests
{
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Travel Test Suite');
        $suite->addTestSuite('TravelTest');
        $suite->addTestSuite('TravelMathTest');
        return $suite;
    }
}

?>