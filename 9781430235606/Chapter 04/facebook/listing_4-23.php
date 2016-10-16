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
$facebook_session = $facebook->getSession();

if (!empty($facebook_session)) {
    try {
        //API call for information about the logged in user        
        $user_info = $facebook->api('/me');

        if (!empty($user_info)) {
            displayAlbums($facebook);
            
            //adjust the URL to match that of the application settings
            $logout_location = (string) html_entity_decode(
            $facebook->getLogoutUrl(
                array( 'next' => 'http://www.foobar.com/logout.php' ) ) );
            echo "<a href='" . $logout_location . "'>Logout</a>";
        } else {
            die("There was an error.");
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }
} else {
    //try generating session by redirecting back to this page
    $login_url = $facebook->getLoginUrl(array("req_perms" => "user_photos, user_relationships"));
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
	echo $user_info['relationship_status'] . " (" .$user_info['significant_other']['name'].")<br/>";
}

function displayAlbums(Facebook $facebook) {
    $albums = $facebook->api('/me/albums?access_token=' . $facebook_session['access_token']);
    $i = 0;
    print "<table>";
    foreach ($albums["data"] as $a) {
        if ($i == 0) {
            print "<tr>";
        }
        //get the cover photo cover
        $photo = $facebook->api($a['cover_photo'] . '?access_token=' . $facebook_session['access_token']);
        print "<td>";
        print "<img src='" . $photo["picture"] . "'/><br/>";
        print $a["name"] . " (" . $a["count"] . " photos)<br/>";
        print "</td>";
        ++$i;
        if ($i == 5) {
            print "</tr>";
            $i = 0;
        }
    }
    print "</table>";
}
?>