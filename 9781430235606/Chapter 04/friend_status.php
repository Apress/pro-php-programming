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
    echo '<h2>Connected as: </h2>';
    echo '<table style="width: 500px;">';
    echo '<tr><td>';
    echo $user_info->screen_name . '<br/>';
    echo '<img src="' . $user_info->profile_image_url . '"/>&nbsp;';
    echo '</td>';
    echo '<td>';
    echo '<td>';
    echo '<strong>Last tweet:</strong><br/><em>' . $user_info->status->text . '</em></td>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';

    echo '<h2>My Friends</h2>';
    $friends = $twitterOAuth->get("statuses/friends");
    shuffle($friends); //randomize which tweets are shown
    echo '<table style="width: 500px;">';
    foreach ($friends as $f) {
        echo '<tr background-color: ' . $f->profile_background_color . '">';
        echo '<td>';
        echo $f->screen_name . '<br/>';
        echo '<img src="' . $f->profile_image_url . '"/>&nbsp;';
        echo '</td>';
        echo '<td>';
        echo '<strong>Last tweet:</strong><br/><em>' . $f->status->text . '</em></td>';
        echo '</td></tr>';
    }
    echo '</table>';
} else {
    die("error verifying credentials");
}
?>
