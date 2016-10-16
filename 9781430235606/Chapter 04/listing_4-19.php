<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once("twitter_oauth_signin.php");

//get our information
$user_info = $twitterOAuth->get("account/verify_credentials");

//check if we are friends with Snoopy, if not, then we create the friendship.
if (!$twitterOAuth->get('friendships/exists', array(
            'user_a' => $user_info->screen_name,
            'user_b' => 'peanutssnoopy'))) {
    echo 'You are NOT following Snoopy. Creating friendship!';
    $twitterOAuth->post('friendships/create', array('screen_name' => 'Snoopy'));
}

//check if we are friends with Garfield. If not, then we create the friendship.
if (!$twitterOAuth->get('friendships/exists', array(
            'user_a' => $user_info->screen_name,
            'user_b' => 'garfield'))) {
    echo 'You are NOT following Garfield. Creating friendship!';
    $twitterOAuth->post('friendships/create', array('screen_name' => 'Garfield'));
}

//check if we are friends with Garfield. If yes, we destroy that friendship.
if ($twitterOAuth->get('friendships/exists', array(
            'user_a' => $user_info->screen_name,
            'user_b' => 'garfield'))) {
    echo 'You are following Garfield. Destroying friendship!';
    $twitterOAuth->post('friendships/destroy', array('screen_name' => 'garfield'));
}
?>