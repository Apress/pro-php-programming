<?php
error_reporting ( E_ALL ^ E_NOTICE );
require_once ("phpquery/phpQuery/phpQuery.php");

$url = "http://www.nhl.com";
$rawHTML = fetchRawData ( $url );
$parsedData = parseSpecificData ( $rawHTML );
displayData ( $parsedData );

//our fetching function
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

//our parsing function
function parseSpecificData($data) {
    $parsedData = array ();
    phpQuery::newDocumentHTML ( $data );
    foreach ( pq ( "a" ) as $link ) {
        $title = pq ( $link )->text ();
        if ($title) {
            $parsedData [] = array ("title" => $title, "href" => pq ( $link )->attr ( 'href' ) );
        }
    }
    
    return $parsedData;
}

//our display function
function displayData(Array $data) {
    foreach ( $data as $link ) { //escape output
        $cleaned_title = htmlentities ( $link ['title'], ENT_QUOTES, "UTF-8" );
        $cleaned_href = htmlentities ( $link ['href'], ENT_QUOTES, "UTF-8" );
        echo "<p><strong>" . $cleaned_title . "</strong><br/>\n";
        echo $cleaned_href . "</p>\n";
    }
}

?>
