#!/usr/bin/env php
<?php
require_once("PHP-on-Couch/couch.php");
require_once("PHP-on-Couch/couchClient.php");
require_once("PHP-on-Couch/couchDocument.php");
$host =  'http://localhost:5984';
$dbname = 'scott';
try {
    $db=new couchClient($host,$dbname);
    $doc = couchDocument::getInstance($db,'7844');
    $doc->sal=1500;
    $doc->record();
}
catch(Exception $e) {
    printf("Exception code:%d\n",$e->getCode());
    printf("%s\n",$e->getMessage());
    exit(-1);
}
?>
