#!/usr/bin/env php
<?php
$expr = '/<img.*?>/';
$item = '<a><img src="file">text</a>"';
$matches=array();
if (preg_match($expr, $item,$matches)) {
    printf( "Match:%s\n",$matches[0]);
} else {
    print "Doesn't match.\n";
}
?>
