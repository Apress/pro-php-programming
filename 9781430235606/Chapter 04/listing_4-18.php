<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once("twitter_oauth_signin.php");

$tweet_id = "68367749604319232";
$result = $twitterOAuth->post('statuses/destroy', 
                array('id' => $tweet_id)
            );

if ( $result ) {
    if ( $result->error ) {
        echo "Error (ID #" . $tweet_id . ")<br/>";
        echo $result->error;
    } else {
        echo "Deleting post: $tweet_id!";
    }
}
//Deleting post: 68367749604319232!
?>