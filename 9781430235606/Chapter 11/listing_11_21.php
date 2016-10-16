<?php
  $string = "your_password";
  $sha2_32bit = hash( 'sha256', $string );  //32 bit sha2
  $sha2_64bit = hash( 'sha512', $string );  //64 bit sha2
?>