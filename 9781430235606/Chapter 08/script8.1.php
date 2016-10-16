#!/usr/bin/env php
<?php
if ($argc != 3) {
    die("USAGE:script9.1 <table_name> <file name>\n");
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
    $db = new mysqli("localhost", "scott", "tiger", "scott");
    $db->autocommit(FALSE);
    $res = $db->prepare("select * from $tname");
    if ($db->errno != 0) {
        throw new Exception($db->error);
    }
    $ncols = $res->field_count;
    $res->free_result();
    $ins = create_insert_stmt($tname, $ncols);
    $fmt = str_repeat("s", $ncols);
    $res = $db->prepare($ins);
    if ($db->errno != 0) {
        throw new Exception($db->error);
    }
    $fp = new SplFileObject($fname, "r");
    while ($row = $fp->fgetcsv()) {
        if (strlen(implode('', $row)) == 0) continue;
        array_unshift($row, $fmt);
        foreach(range(1,$ncols) as $i) {
            $row[$i]=&$row[$i];
        }
        call_user_func_array(array(&$res, "bind_param"), &$row);
        $res->execute();
        if ($res->errno != 0) {
            print_r($row);
            throw new Exception($res->error);
        }
        $rownum++;
    }
    $db->commit();
    if ($db->errno != 0) {
        throw new Exception($db->error);
    }
    print "$rownum rows inserted into $tname.\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
