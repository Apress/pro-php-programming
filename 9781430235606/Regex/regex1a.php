#!/usr/bin/env php
<?php
$expr = '[(?i)^https*://([^:/]+):?(\d*)/([^?]*)\??(.*)]';
$item = 'HTTPS://myaccount.nytimes.com/auth/login?URI=http://';
$matches = array();
if (preg_match($expr, $item, $matches)) {
    list($host, $port, $dir, $args) = array_slice($matches, 1, 4);
    print "Host=>$host\n";
    print "Port=>$port\n";
    print "Dir=>$dir\n";
    print "Arguments=>$args\n";
} else {
    print "Doesn't match.\n";
}
?>
