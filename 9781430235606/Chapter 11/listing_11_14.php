<?php

session_start();
if ( $_POST['csrf_token'] == $_SESSION['csrf_token'] ) {
  $csrf_token_age = time() - $_SESSION['csrf_token_time'];
    
  if ( $csrf_token_age <= 180 ) { //three minutes
       //valid, process request
  }
}
?>