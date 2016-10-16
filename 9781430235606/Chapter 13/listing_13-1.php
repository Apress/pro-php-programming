<?php
define('OWN_A_DOG', true);
define('TIRED', false);
define('HAVE_NOT_WALKED_FOR_DAYS', false);
define('NICE_OUTSIDE', false);
define('BORED', true);

if ( (OWN_A_DOG && (!TIRED || HAVE_NOT_WALKED_FOR_DAYS)) || (NICE_OUTSIDE && !TIRED) || BORED )
{
    goForAWalk();
}

function goForAWalk() {
    echo "Going for a walk";
}
?>