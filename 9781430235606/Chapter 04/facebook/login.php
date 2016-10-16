<?php

error_reporting(E_ALL ^ E_NOTICE);
require_once("facebook.php");

//create a new Facebook object
$facebook = new Facebook(array(
            'appId' => 'YOUR_APP_ID',
            'secret' => 'YOUR_APP_SECRET',
            'cookie' => true
        ));

//the login page is also the callback page, so we check if we have been authenticated
$session = $facebook->getSession();

if (!empty($session)) {
    try {
        //API call for information about the logged in user        
        $user_info = $facebook->api('/me');

        if (!empty($user_info)) {
            displayUserInfo($user_info);
        } else {
            die("There was an error.");
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }
} else {
    //try generating session by redirecting back to this page
    $login_url = $facebook->getLoginUrl();
    header("Location: " . $login_url);
}

function displayUserInfo($user_info) {
    /*  id, name, first_name, last_name, link, hometown,
                 location, bio, quotes, gender, timezone, locale
                 verified, updated_time */
    echo "Welcome <a href='{$user_info['link']}' rel='external'/>" .
    $user_info['name'] . '</a>!<br/>';
    echo "Gender: " . $user_info['gender'] . "<br/>";
    echo "Hometown: " . $user_info['location']['name'] . "<br/>";
}
?>