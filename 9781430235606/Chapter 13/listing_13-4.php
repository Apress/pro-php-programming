<?php
require_once('walkConfig.php');

if (shouldWalk()) {
    goForAWalk();
}

function shouldWalk() {
    return ( (OWN_A_DOG && (!TIRED || HAVE_NOT_WALKED_FOR_DAYS)) || 
             (NICE_OUTSIDE && !TIRED) || 
             BORED);
}
 
function goForAWalk() {
  echo "Going for a walk";
}

?>