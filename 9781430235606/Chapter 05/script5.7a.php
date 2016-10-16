#!/usr/bin/env php
<?php
$flags = FilesystemIterator::CURRENT_AS_PATHNAME;
$ul = new Globiterator("*.php", $flags);
foreach ($ul as $file) {
    print "$file\n";
}
?>
