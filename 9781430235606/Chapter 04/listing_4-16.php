<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("twitter_oauth_signin.php");

$friends_timeline = $twitterOAuth->get( 'statuses/friends_timeline', array( 'count' => 20 ) );
var_dump( $friends_timeline );
?>