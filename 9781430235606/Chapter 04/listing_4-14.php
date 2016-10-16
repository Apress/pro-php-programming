<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once("twitteroauth/twitteroauth.php");
require_once("twitter_config.php");
session_start();
if (isset($_GET["pin"])) {
    if (is_numeric($_GET["pin"])) {
        if (validatePin ()) {
            print "PIN validation script was run";
        }
    } else {
        print "Error: non-numeric pin";
    }
} else {
    print "Error: no pin number passed in";
}

function validatePin() {
    //since we know our request tokens now, we will pass them into our constructor
    $twitterOAuth = new TwitterOAuth(
                    CONSUMER_KEY,CONSUMER_SECRET,
                    $_SESSION['request_token'], $_SESSION['request_token_secret']
            );

    //Generate access tokens {oauth_token, oauth_token_secret}
    //we provide the PIN from twitter in the previous step
    $accessOAuthTokens = $twitterOAuth->getAccessTokenWithPin($_GET["pin"]);

    if ($accessOAuthTokens && $accessOAuthTokens['oauth_token']) {
        //write our oauth access tokens to files
        file_put_contents( "access_token", $accessOAuthTokens['oauth_token'] );
        file_put_contents( "access_token_secret", $accessOAuthTokens['oauth_token_secret'] );
        return true;
    } else {
        print "Error: PIN usage timed out!";
        return false;
    }
}
?>