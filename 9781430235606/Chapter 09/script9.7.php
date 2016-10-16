#!/usr/bin/env php
<?php
$ins = <<<SQL
insert into test2_ins(fname,fcontent) values (:FNAME,empty_clob()) 
returning fcontent into :CLB
SQL;
$qry = <<<SQL
select fname "File Name",length(fcontent) "File Size"
from test2_ins
SQL;
$fname = "harrison_bergeron.txt";
try {
    $dbh = oci_connect("scott", "tiger", "local");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $lob = oci_new_descriptor($dbh, OCI_DTYPE_LOB);
    $res = oci_parse($dbh, $ins);
    oci_bind_by_name($res, ":FNAME", $fname, -1, SQLT_CHR);
    oci_bind_by_name($res, ":CLB", $lob, -1, SQLT_CLOB);
    if (!oci_execute($res, OCI_NO_AUTO_COMMIT)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    $lob->import("harrison_bergeron.txt");
    $lob->flush();
    oci_commit($dbh);
    $res = oci_parse($dbh, $qry);
    if (!oci_execute($res, OCI_NO_AUTO_COMMIT)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    $row = oci_fetch_array($res, OCI_ASSOC);
    foreach ($row as $key => $val) {
        printf("%s = %s\n", $key, $val);
    }
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
