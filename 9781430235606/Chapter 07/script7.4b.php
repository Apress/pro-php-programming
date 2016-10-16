#!/usr/bin/env php
<?php
$host = 'localhost:27017';
$dbname = 'scott';
$colname = "emp";
try {
    $conn = new Mongo($host);
    $db = $conn->selectDB($dbname);
    $coll = $conn->selectCollection($dbname, $colname);
    $keys = array("deptno" => 1);
    $initial = array('sum' => 0, 'cnt' => 0);
    $reduce = new MongoCode('function(obj,prev) {  prev.sum += obj.sal; 
                                                   prev.cnt++; }');
    $finalize= new MongoCode('function(obj) {  obj.avg = obj.sum/obj.cnt; }');
                                                   
    $group_by = $coll->group($keys, 
                             $initial, 
                             $reduce,
                             array('finalize'=>$finalize));
    print_r($group_by);
}
catch(MongoException $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
