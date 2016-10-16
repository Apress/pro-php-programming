<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once("twitteroauth/twitteroauth.php");
require_once("twitter_config.php");
session_start();

if ( !empty($_SESSION["access_token"]) && 
     !empty($_SESSION["access_token_secret"]) ) {

    $twitterOAuth = new TwitterOAuth(
                    CONSUMER_KEY, CONSUMER_SECRET,
                    $_SESSION["access_token"], $_SESSION["access_token_secret"]);

    //check that we are connected
    $user_info = $twitterOAuth->get( 'account/verify_credentials' );
    if ( $user_info && !$user_info->error ) {
        echo "Welcome " . $user_info->screen_name."!";
        //perform other
        //API calls
    } else {
	    die( "Error: bad credentials." );
    }
} else {
    die( "Error: your access_token was not found in your \$_SESSION." );
}
?>