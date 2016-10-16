#!/usr/bin/env php
<?php
$proc = <<<'EOP'
declare 
type crs_type is ref cursor;
crs crs_type;
begin
    open crs for select ename,job,deptno from emp;
:CSR:=crs;
end;
EOP;
try {
    $dbh = oci_connect("scott", "tiger", "local");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $csr = oci_new_cursor($dbh);
    $res = oci_parse($dbh, $proc);
    oci_bind_by_name($res, ":CSR", $csr, -1, SQLT_RSET);
    if (!oci_execute($res)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    if (!oci_execute($csr)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    while ($row = oci_fetch_array($csr, OCI_NUM)) {
        foreach ($row as $r) {
            printf("%-12s", $r);
        }
        print "\n";
    }
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
