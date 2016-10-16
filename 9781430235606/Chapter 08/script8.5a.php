#!/usr/bin/env php
<?php
require_once ('adodb5/adodb.inc.php');
require_once ('adodb5/adodb-exceptions.inc.php');
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
    $db = NewADOConnection("postgres8");
    $db->Connect("localhost", "scott", "tiger", "scott");
    $db->autoCommit = 0;
    $db->bulkBind=true;
    $rowbatch=array();
    $res = $db->Execute("select * from $tname");
    $ncols = $res->FieldCount();
    $ins = create_insert_stmt($tname, $ncols);
    $res = $db->Prepare($ins);
    $fp = new SplFileObject($fname, "r");
    $db->BeginTrans();
    while ($row = $fp->fgetcsv()) {
        if (strlen(implode('', $row)) == 0) continue;
        foreach($row as &$r) { if (empty($r)) $r=null; }
        $rowbatch[]=$row;
    }
    $db->Execute($res, $rowbatch);
    $db->CommitTrans();
    print count($rowbatch)." rows inserted into $tname.\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
