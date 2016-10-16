#!/usr/bin/env php
<?php
require_once("PHP-on-Couch/couch.php");
require_once("PHP-on-Couch/couchClient.php");
require_once("PHP-on-Couch/couchDocument.php");
$host =  'http://localhost:5984';
$dbname = 'scott';
try {
    $db=new couchClient($host,$dbname);
    $deptno30=$db->asArray()->getView('sal','deptno30');
    foreach ($deptno30['rows'] as $r) {
        foreach ($r['value'] as $key => $value) {
            printf("%s = %s\t",$key,$value);
        }
        print "\n";
    }
}
catch(Exception $e) {
    printf("Exception code:%d\n",$e->getCode());
    printf("%s\n",$e->getMessage());
    exit(-1);
}
?>
