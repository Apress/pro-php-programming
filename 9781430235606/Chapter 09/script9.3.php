#!/usr/bin/env php
<?php
if ($argc != 2) {
    die("USAGE:scriptDB.1 <batch size>");
}
$batch = $argv[1];
print "Batch size:$batch\n";
$numrows = 0;
$val = 0;
$ins = "insert into test_ins values (:VAL)";
try {
    $dbh = oci_connect("scott", "tiger", "local");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $res = oci_parse($dbh, $ins);
    oci_bind_by_name($res, ":VAL", &$val, 20, SQLT_CHR);
    $fp = new SplFileObject("file.dat", "r");
    while ($row = $fp->fgets()) {
        $val = trim($row);
        if (!oci_execute($res, OCI_NO_AUTO_COMMIT)) {
            $err = oci_error($dbh);
            throw new exception($err['message']);
        }
        if ((++$numrows) % $batch == 0) {
            oci_commit($dbh);
        }
    }
    oci_commit($dbh);
    print "$numrows rows inserted.\n";
}
catch(Exception $e) {
    print_r($values);
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
