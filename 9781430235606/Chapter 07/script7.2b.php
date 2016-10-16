#!/usr/bin/env php
<?php
$host = 'localhost:27017';
$dbname = 'scott';
$colname = "emp";
try {
    $conn=new Mongo($host);
    $db=$conn->selectDB($dbname);
    $coll=$conn->selectCollection($dbname,$colname);
    $cursor = $coll->find(array('$where'=>
                                'this.deptno >= 10 & this.deptno<=20'));
    $cursor->sort(array("deptno"=>1,"sal"=>1));
    $cursor->fields(array("ename"=>true,
                          "job"=>true,
                          "deptno"=>true,
                          "hiredate"=>true,
                          "sal"=>true,
                          "_id"=>false));
    foreach($cursor as $c) {
        foreach($c as $key => $val) {
            if ($val instanceof MongoDate) {
                printf("%s\t",strftime("%m/%d/%Y",$val->sec));
            } else { print "$val\t"; }
        }
        print "\n";
    }
    printf("%d documents were extracted.\n",$cursor->count());

}
catch(MongoException $e) {
    print "Exception:\n";
    die($e->getMessage()."\n");
}
?>
