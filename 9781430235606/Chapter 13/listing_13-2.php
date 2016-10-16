<?php
require_once('walkConfig.php');

if ( (OWN_A_DOG && (!TIRED || HAVE_NOT_WALKED_FOR_DAYS)) || (NICE_OUTSIDE && !TIRED) || BORED )
{
    goForAWalk();
}
 
function goForAWalk() {
  echo "Going for a walk";
}

?>