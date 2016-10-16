<?php
$ip_address = "192.0.2.128"; //IPv4 address
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) );
//192.0.2.128
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) );
//false

$ip_address = "::ffff:192.0.2.128"; //IPv6 address representation of 192.0.2.128
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) );
//false
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) );
//ffff:192.0.2.128

$ip_address = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
var_dump( filter_var($ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6 ) );
// 2001:0db8:85a3:0000:0000:8a2e:0370:7334

$ip_address = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE ) );
//2001:0db8:85a3:0000:0000:8a2e:0370:7334

$ip_address = "FD01:0db8:85a3:0000:0000:8a2e:0370:7334";
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE ) );
//false

$ip_address = "192.0.3.1";
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE ) );
//192.0.3.1

$ip_address = "192.0.2.1";
var_dump( filter_var( $ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE ) );
//false
?>

<?php
$url_address = "http://www.brian.com";
var_dump( filter_var( $url_address, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED ) );
//false

$url_address = "http://www.brian.com/index";
var_dump( filter_var( $url_address, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED ) );
//"http://www.brian.com/index"

$url_address = "http://www.brian.com/index?q=hey";
var_dump( filter_var( $url_address, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED ) );
//http://www.brian.com/index?q=hey

$url_address = "http://www.brian.com";
var_dump( filter_var( $url_address, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED ) );
//false

$url_address = "http://www.brian.com/index";
var_dump( filter_var( $url_address, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED ) );
//false

$url_address = "http://www.brian.com/index?q=hey";
var_dump( filter_var( $url_address, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED ) );
//http://www.brian.com/index?q=hey
?>