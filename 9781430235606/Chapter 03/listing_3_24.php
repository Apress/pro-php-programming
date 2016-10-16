<?php
require_once('phpqrcode/qrlib.php');

QRcode::png( 'Hello world qrcode', 'qrcode.png' ); //to a file
QRcode::png( 'Hello world qrcode' ); //direct to browser
?>
