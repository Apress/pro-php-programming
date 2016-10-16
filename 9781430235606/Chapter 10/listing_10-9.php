<?php
error_reporting ( E_ALL ^ E_NOTICE );

$url = "http://www.nhl.com";
print fetchRawData ( $url );

function fetchRawData($url) {
    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true ); //return the output as a variable
    curl_setopt ( $ch, CURLOPT_FAILONERROR, true ); //fail if error encountered
    curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, true ); //allow redirects
    curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 ); //time out length
    

    $data = curl_exec ( $ch );
    if (! $data) {
        echo "<br />cURL error:<br/>\n";
        echo "#" . curl_errno ( $ch ) . "<br/>\n";
        echo curl_error ( $ch ) . "<br/>\n";
        echo "Detailed information:";
        var_dump ( curl_getinfo ( $ch ) );
        die ();
    }
    
    curl_close ( $ch );
    return $data;
}

?>
