<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once("twitteroauth/twitteroauth.php");
require_once("twitter_config.php");
session_start();

//since we know our access tokens now, we will pass them into our constructor
$twitterOAuth = new TwitterOAuth(
    CONSUMER_KEY,CONSUMER_SECRET,
    $_SESSION["access_token"], $_SESSION["access_token_secret"]);

//verify credentials through Twitter API call
$user_info = $twitterOAuth->get( "account/verify_credentials" );

if ($user_info && !$user_info->error ) {
    print "Hello ".$user_info->screen_name."!<br/>";
    print "Pushing out a status message.";
    
	// Post our new status
    $twitterOAuth->post(
        'statuses/update',
        array( 'status' => "writing status…foobar " )
    );
    //other api calls
}else{
    die( "error verifying credentials" );
}
?>