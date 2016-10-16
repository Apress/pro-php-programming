#!/usr/bin/env php
<?php
if ($argc != 3) {
    die("USAGE:script8.9 <table_name> <file name>\n");
}
$tname = $argv[1];
$fname = $argv[2];
$rownum = 0;

function create_insert_stmt($table, $ncols) {
    $stmt = "insert into $table values(";
    foreach(range(1,$ncols) as $i) {
        $stmt.= ":$i,";
    }
    $stmt = preg_replace("/,$/", ')', $stmt);
    return ($stmt);
}
try {
    $db = new SQLite3("scott.sqlite");
    $res = $db->query("select * from $tname");
    if ($db->lastErrorCode() != 0) {
        throw new Exception($db->lastErrorMsg());
    }
    $ncols = $res->numColumns();
    $res->finalize();
    $ins = create_insert_stmt($tname, $ncols);
    print "Insert stmt:$ins\n";
    $res = $db->prepare($ins);
    $fp=new SplFileObject($fname,"r");
    while ($row = $fp->fgetcsv()) {
        if (strlen(implode('',$row))==0) continue;

        foreach(range(1,$ncols) as $i) {
            $res->bindValue(":$i", $row[$i - 1]);
        }
        $res->execute();
        if ($db->lastErrorCode() != 0) {
            print_r($row);
            throw new Exception($db->lastErrorMsg());
        }
        $rownum++;
    }
    print "$rownum rows inserted into $tname.\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
