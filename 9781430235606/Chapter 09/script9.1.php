#!/usr/bin/env php
<?php
if ($argc != 4) {
    die("USAGE:script9.1 <connection> <table_name> <file name>\n");
}
$conn = $argv[1];
$tname = $argv[2];
$fname = $argv[3];
$qry = "select * from $tname";
$dsn = array();
$numrows = 0;
if (preg_match('/(.*)\/(.*)@(.*)/', $conn, $dsn)) {
    $conn = array_shift($dsn);
} elseif (preg_match('/(.*)\/(.*)/', $conn, $dsn)) {
    $conn = array_shift($dsn);
} else die("Connection identifier should be in the u/p@db form.");
if (count($dsn) == 2) {
    $dsn[2] = "";
}
function create_insert_stmt($table, $ncols) {
    $stmt = "insert into $table values(";
    foreach (range(1, $ncols) as $i) {
        $stmt.= ":$i,";
    }
    $stmt = preg_replace("/,$/", ')', $stmt);
    return ($stmt);
}
try {
    $dbh = oci_connect($dsn[0], $dsn[1], $dsn[2]);
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $res = oci_parse($dbh, $qry);
    // Oracle needs to execute statement before having description
    // functions available. However, there is a special cheap
    // execution mode which makes sure that there is no performance penalty.
    if (!oci_execute($res, OCI_DESCRIBE_ONLY)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    $ncols = oci_num_fields($res);
    oci_free_statement($res);
    $ins = create_insert_stmt($tname, $ncols);
    $res = oci_parse($dbh, $ins);
    if (!$res) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    $fp = new SplFileObject($fname, "r");
    while ($row = $fp->fgetcsv()) {
        if (count($row) < $ncols) continue;
        foreach (range(1, $ncols) as $i) {
            oci_bind_by_name($res, ":$i", $row[$i - 1]);
        }
        if (!oci_execute($res,OCI_NO_AUTO_COMMIT)) {
            $err = oci_error($dbh);
            throw new exception($err['message']);
        }
        $numrows++;
    }
    oci_commit($dbh);
    print "$numrows rows inserted into $tname.\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
