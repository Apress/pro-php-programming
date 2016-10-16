<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("twitter_oauth_signin.php");

$tweets = $twitterOAuth->get( 'statuses/user_timeline' );
foreach ( $tweets as $t ) {
    echo $t->id_str . ": " . $t->text . "<br/>";
}
?>