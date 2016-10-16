<?php
error_reporting(E_ALL ^ E_NOTICE);

$url = "http://www.nhl.com";
print fetchRawData( $url );

//our fetching function
function fetchRawData( $url ) {
    $data = file_get_contents($url);
    if( $data === false ) {
        die("Error");
    }
    return $data;
}
?>