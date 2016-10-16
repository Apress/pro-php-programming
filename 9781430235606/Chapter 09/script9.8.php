#!/usr/bin/env php
<?php
$qry = <<<SQL
DECLARE
fcon CLOB;
BEGIN
SELECT fcontent into fcon
FROM test2_ins 
WHERE fname='harrison_bergeron.txt';
:CLB:=fcon;
END;
SQL;
try {
    $dbh = oci_connect("scott", "tiger", "local");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $lh = oci_new_descriptor($dbh, OCI_DTYPE_LOB);
    $res = oci_parse($dbh, $qry);
    oci_bind_by_name($res, ":CLB", $lh, -1, SQLT_CLOB);
    if (!oci_execute($res, OCI_NO_AUTO_COMMIT)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    $novel = $lh->read(65536);
    printf("Length of the string is %d\n", strlen($novel));
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
