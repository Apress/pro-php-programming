<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("twitteroauth/twitteroauth.php");
require_once("twitter_config.php");

//access_token and access_token_secret are
//the file names holding our access tokens
$twitterOAuth = new TwitterOAuth(
        CONSUMER_KEY, CONSUMER_SECRET,
        file_get_contents( "access_token" ),
        file_get_contents( "access_token_secret" ) );
?>