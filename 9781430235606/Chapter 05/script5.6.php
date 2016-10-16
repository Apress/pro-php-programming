#!/usr/bin/env php
<?php
$finfo = new SplFileInfo("/home/mgogala/.bashrc");
print "Basename:" . $finfo->getBasename() . "\n";
print "Change Time:" . strftime("%m/%d/%Y %T", $finfo->getCTime()) . "\n";
print "Owner UID:" . $finfo->getOwner() . "\n";
print "Size:" . $finfo->getSize() . "\n";
print "Directory:" . $finfo->isDir() ? "No" : "Yes";
print "\n";
?>
