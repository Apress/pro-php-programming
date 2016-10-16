<?php
  $salt = uniqid( mt_rand() ); 
  $password = md5( $user_input );
  $stronger_password = md5( $password.$salt );
?>