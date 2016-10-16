<?php
        session_start();
        //$is_admin = $_GET['is_admin']  initialized by register globals
        //$is_admin = true; current value passed in

        if ( user_is_admin( $_SESSION['user'] ) ) {     //makes this check useless
                    $is_admin = true;
        }

        if ( $is_admin ) {          //will always be true
                    //give the user admin privileges
        }
        
        function user_is_admin($a){           
            return $a=="yes";
        }
?>