#!/usr/bin/env php
<?php
$DDL = <<<EOT
CREATE TABLE dept
(
  deptno integer NOT NULL,
  dname text,
  loc text,
  CONSTRAINT dept_pkey PRIMARY KEY (deptno)
);
CREATE TABLE emp
(
  empno integer NOT NULL,
  ename text ,
  job text ,
  mgr integer,
  hiredate text,
  sal real,
  comm real,
  deptno integer,
  CONSTRAINT emp_pkey PRIMARY KEY (empno),
  CONSTRAINT fk_deptno FOREIGN KEY (deptno)
      REFERENCES dept (deptno) ON DELETE CASCADE
);
CREATE UNIQUE INDEX pk_emp on emp(empno);
CREATE INDEX emp_deptno on emp(deptno);
CREATE UNIQUE INDEX pk_dept on dept(deptno);
EOT;
try {
    $db = new SQLite3("scott.sqlite");
    @$db->exec($DDL);
    if ($db->lastErrorCode() != 0) {
        throw new Exception($db->lastErrorMsg()."\n");
    }
    print "Database structure created successfully.\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage());
}
?>
