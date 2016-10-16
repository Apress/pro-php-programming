<?php
require_once('walkConfig.php');

if (shouldWalk()) {
    goForAWalk();
}

function shouldWalk() {
    return ( timeToWalkTheDog() || feelLikeWalking() );
}

function timeToWalkTheDog() {
   return (OWN_A_DOG && (!TIRED || HAVE_NOT_WALKED_FOR_DAYS));
}

function feelLikeWalking() {
   return ((NICE_OUTSIDE && !TIRED) || BORED);
}

function goForAWalk() {
  echo "Going for a walk";
}

?>