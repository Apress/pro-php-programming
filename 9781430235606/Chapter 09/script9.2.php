#!/usr/bin/env php
<?php
$QRY = "select e.ename,e.job,d.dname,d.loc
        from emp e join dept d on(d.deptno=e.deptno)";
try {
    $dbh = oci_connect("scott", "tiger", "local");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $sth = oci_parse($dbh, $QRY);
    if (!oci_execute($sth)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    while ($row = oci_fetch_array($sth,OCI_NUM)) {
        foreach ($row as $r) {
            printf("% 12s", $r);
        }
        print "\n";
    }
}
catch(exception $e) {
    print "Exception:";
    print $e->getMessage()."\n";
    exit(-1);
}
?>
