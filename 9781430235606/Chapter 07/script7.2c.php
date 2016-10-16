#!/usr/bin/env php
<?php
$host = 'localhost:27017';
$dbname = 'scott';
$colname = "emp";
try {
    $conn=new Mongo($host);
    $db=$conn->selectDB($dbname);
    $coll=$conn->selectCollection($dbname,$colname);
//    $cursor = $coll->find(array("sal"=> array('$gt'=>2900)));
//    $cursor = $coll->find(array("hiredate"=> new MongoRegex("/.*DEC.*/")));
//    $cursor = $coll->find()->skip(3)->limit(5);
//    $cursor = $coll->find(array("deptno"=> array('$in'=>array(10,20))));
//    $cursor->sort(array("sal"=>1));
    $cursor = $coll->find(array('$where'=>
                                'this.deptno >= 10 & this.deptno<=20'));
    $cursor->sort(array("deptno"=>1,"sal"=>1));
    foreach($cursor as $c) {
        foreach($c as $key => $val) {
            if ($key != "_id") { print "$val\t"; }
        }
        print "\n";
    }
    printf("Altogether %d records were printed.\n",$cursor->count());

}
catch(MongoException $e) {
    print "Exception:\n";
    die($e->getMessage()."\n");
}
?>
