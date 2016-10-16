<?php
error_reporting ( E_ALL ^ E_NOTICE );
require_once ("twitteroauth/twitteroauth.php");
require_once ("twitter_config.php");

//My Access tokens
$accessToken = 'ACTUAL_ACCESS_TOKEN';
$accessTokenSecret = 'ACTUAL_SECRET_ACCESS_TOKEN';

//since we know our access tokens now, we will pass them into our constructor
$twitterOAuth = new TwitterOAuth ( CONSUMER_KEY, CONSUMER_SECRET, $accessToken,
$accessTokenSecret );

//verify credentials through Twitter API call
$user_info = $twitterOAuth->get ( "account/verify_credentials" );
if ( $user_info && !$user_info->error ) {
	print "Hello " . $user_info->screen_name . "!<br/>";
} else {
	die ( "error verifying credentials" );
}
?>