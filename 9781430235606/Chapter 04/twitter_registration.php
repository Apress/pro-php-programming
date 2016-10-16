<?php
error_reporting ( E_ALL ^ E_NOTICE );
require_once ('twitteroauth/twitteroauth.php');
require_once ('twitter_config.php');
session_start (); //start a session

//the constructor takes our 'consumer key', 'consumer secret' as arguments
$twitterOAuth = new TwitterOAuth ( CONSUMER_KEY, CONSUMER_SECRET );

//returns the oauth request tokens {oauth_token, oauth_token_secret}
$requestTokens = $twitterOAuth->getRequestToken ();

//we write the tokens into the $_SESSION
$_SESSION ['request_token'] = $requestTokens ['oauth_token'];
$_SESSION ['request_token_secret'] = $requestTokens ['oauth_token_secret'];

//redirect to the Twitter generated registration URL, which will give us our PIN
header ( 'Location: ' . $twitterOAuth->getAuthorizeURL ( $requestTokens ) );
?>