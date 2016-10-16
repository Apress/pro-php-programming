<?php
if (preg_match ( '/i(Phone|Pad)|Android|Blackberry|Symbian|windows (ce|phone)/i',
                 $_SERVER ['HTTP_USER_AGENT'] )) {
    //redirect, load different templates, stylesheets
    header ( "Location: mobile/index.php" );
}
?>