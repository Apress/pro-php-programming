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
    foreach (range(1, $ncols) as $i) {
        $stmt.= "?,";
    }
    $stmt = preg_replace("/,$/", ')', $stmt);
    return ($stmt);
}
try {
    $db = new PDO('mysql:host=localhost;dbname=scott', 'scott', 'tiger');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res = $db->prepare("select * from $tname");
    $res->execute();
    $ncols = $res->columnCount();
    $ins = create_insert_stmt($tname, $ncols);
    $res = $db->prepare($ins);
    $fp = new SplFileObject($fname, "r");
    $db->beginTransaction();
    while ($row = $fp->fgetcsv()) {
        if (strlen(implode('', $row)) == 0) continue;
        $res->execute($row);
        $rownum++;
    }
    $db->commit();
    print "$rownum rows inserted into $tname.\n";
}
catch(PDOException $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
