#!/usr/bin/env php
<?php
if ($argc != 2) {
    die("USAGE:scriptDB.1 <batch size>");
}
$batch = $argv[1];
print "Batch size:$batch\n";
$numrows = 0;
$ins = <<<'EOS'
    begin
        do_ins(:VAL);
    end;
EOS;
try {
    $dbh = oci_connect("scott", "tiger", "local");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $values = oci_new_collection($dbh, 'NUMERIC_TABLE');
    $res = oci_parse($dbh, $ins);
    oci_bind_by_name($res, ":VAL", $values, -1, SQLT_NTY);
    $fp = new SplFileObject("file.dat", "r");
    while ($row = $fp->fgets()) {
        $values->append(trim($row));
        if ((++$numrows) % $batch == 0) {
            if (!oci_execute($res)) {
                $err = oci_error($dbh);
                throw new exception($err['message']);
            }
            $values->trim($batch);
        }
    }
    if (!oci_execute($res)) {
        $err = oci_error($dbh);
        throw new exception($err['message']);
    }
    print "$numrows rows inserted.\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
