#!/usr/bin/env php
<?php
$flags = FilesystemIterator::CURRENT_AS_FILEINFO | 
         FilesystemIterator::SKIP_DOTS;
$ul = new FileSystemIterator("/usr/local", $flags);
foreach ($ul as $file) {
    if ($file->isDir()) {
        print $file->getFilename() . "\n";
    }
}
?>
