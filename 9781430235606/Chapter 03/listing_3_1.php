<?php
echo $_SERVER ['HTTP_USER_AGENT'] . "\n\n";
var_dump ( get_browser ( null, true ) );
//equivalently, we could have passed in the user agent string into the first parameter
//var_dump ( get_browser ( $_SERVER ['HTTP_USER_AGENT'], true ) );
?>