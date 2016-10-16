BEGIN TRANSACTION;
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
CREATE INDEX emp_deptno ON emp(deptno);

COMMIT;
