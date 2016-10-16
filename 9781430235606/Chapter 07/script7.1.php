#!/usr/bin/env php
<?php
$host = 'localhost:27017';
$dbname = 'scott';
$colname = "emp";

$EMP = array(
    array("empno" => 7369, "ename" => "SMITH", "job" => "CLERK", 
          "mgr" => 7902,"hiredate" => "17-DEC-80", "sal" => 800, 
          "deptno" => 20), 
    array("empno" => 7499, "ename" => "ALLEN", "job" => "SALESMAN", 
          "mgr" => 7698, "hiredate" => "20-FEB-81", "sal" => 1600, 
          "comm" => 300,"deptno"=>30),
    array("empno"=>7521,"ename"=>"WARD","job"=>"SALESMAN","mgr"=>7698,
          "hiredate"=>"22-FEB-81","sal"=>1250,"comm"=>500, "deptno" => 30),
    array("empno" => 7566, "ename" => "JONES", "job" => "MANAGER", 
          "mgr" => 7839, "hiredate" => "02-APR-81", "sal" => 2975, 
          "deptno" => 20), 
    array("empno" => 7654, "ename" => "MARTIN", "job" => "SALESMAN", 
          "mgr" => 7698, "hiredate" => "28-SEP-81", "sal" => 1250, 
          "comm" => 1400,"deptno"=>30),
    array("empno"=>7698,"ename"=>"BLAKE","job"=>"MANAGER","mgr"=>7839,
          "hiredate"=>"01-MAY-81","sal"=>2850,"deptno"=>30),
    array("empno"=>7782,"ename"=>"CLARK","job"=>"MANAGER","mgr"=>7839,
          "hiredate"=>"09-JUN-81","sal"=>2450,"deptno"=>10),
    array("empno"=>7788,"ename"=>"SCOTT","job"=>"ANALYST","mgr"=>7566,
          "hiredate"=>"19-APR-87","sal"=>3000,"deptno"=>20),
    array("empno"=>7839,"ename"=>"KING","job"=>"PRESIDENT",
          "hiredate" => "17-NOV-81", "sal" => 5000, "deptno" => 10), 
    array("empno" => 7844, "ename" => "TURNER", "job" => "SALESMAN", 
          "mgr" => 7698, "hiredate" => "08-SEP-81", "sal" => 1500, 
           "comm" => 0,"deptno"=>30),
    array("empno"=>7876,"ename"=>"ADAMS","job"=>"CLERK","mgr"=>7788,
          "hiredate"=>"23-MAY-87","sal"=>1100,"deptno"=>20),
    array("empno"=>7900,"ename"=>"JAMES","job"=>"CLERK","mgr"=>7698,
           "hiredate"=>"03-DEC-81","sal"=>950,"deptno"=>30),
    array("empno"=>7902,"ename"=>"FORD","job"=>"ANALYST","mgr"=>7566,
          "hiredate"=>"03-DEC-81","sal"=>3000,"deptno"=>20),
    array("empno"=>7934,"ename"=>"MILLER","job"=>"CLERK","mgr"=>7782,
          "hiredate"=>"23-JAN-82","sal"=>1300,"deptno"=>10));
try {
    $conn=new Mongo($host);
    $db=$conn->selectDB($dbname);
    $coll=$conn->selectCollection($dbname,$colname);
    foreach ($EMP as $emp) {
        $coll->insert($emp, array('safe'=>true));
    }
}
catch(MongoException $e) {
    print "Exception:\n";
    die($e->getMessage()."\n");
}
?>
