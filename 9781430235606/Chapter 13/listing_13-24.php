<?php

error_reporting(E_ALL);
require_once ('travel.php');

$travel = new Travel();
$travel->execute(new Location(1, 3), new Location(4, 7));
?>