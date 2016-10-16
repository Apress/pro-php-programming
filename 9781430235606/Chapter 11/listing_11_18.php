<?php
$email = '(a@b.com)';
//get rid of the illegal parenthesis characters
$sanitized_email = filter_var( $email, FILTER_SANITIZE_EMAIL );
var_dump( $sanitized_email );
//a@b.com

var_dump( filter_var( $email, FILTER_VALIDATE_EMAIL ) );
//false

var_dump( filter_var( $sanitized_email, FILTER_VALIDATE_EMAIL ) );
//a@b.com
?>