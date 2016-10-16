<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("twitteroauth/twitteroauth.php");
require_once("twitter_config.php");
session_start();

//verify that the oauth_token parameter of the callback URL matches the session token
if ($_GET["oauth_token"] == $_SESSION["request_token"]) {
    //pass in our  request tokens that have been stored in our $_SESSION
    $twitterOAuth = new TwitterOAuth(
                    CONSUMER_KEY, CONSUMER_SECRET,
                    $_SESSION["request_token"], $_SESSION["request_token_secret"]);

    $accessToken = $twitterOAuth->getAccessToken();

    //ensure that we have a numeric user_id
    if ( isset($accessToken["user_id"]) && is_numeric($accessToken["user_id"]) 	) {
        // Save the access tokens to a DB
        $twitter_db_actions = new Twitter_DB_Actions();
        $twitter_db_actions->saveUser($accessToken);

        //Success! Redirect to welcome page. 
		//The welcome.php page will also need to be modified to read our tokens from the database and not the session
        header("location: welcome.php");
    } else {
        //Failure : ( go back to login page
        header("location: login.php");
    }
} else {
    die("Error: we have been denied access");
}
?>
