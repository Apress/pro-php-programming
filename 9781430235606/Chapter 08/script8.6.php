#!/usr/bin/env php
<?php
require_once ('adodb5/adodb.inc.php');
require_once ('adodb5/adodb-exceptions.inc.php');
$ADODB_FETCH_MODE = ADODB_FETCH_NUM;
$QRY = "select e.ename,e.job,d.dname,d.loc
        from emp e join dept d on(d.deptno=e.deptno)";
$colnames = array();
$ncols = 0;
try {
    $db = NewADOConnection("mysql");
    $db->Connect("localhost", "scott", "tiger", "scott");
    $res = $db->Execute($QRY);
    // Get the number of columns
    $ncols = $res->FieldCount();
    // Get the column names.
    foreach (range(0, $ncols - 1) as $i) {
        $info = $res->FetchField($i);
        $colnames[] = $info->name;
    }
    //  Print column titles, converted to uppercase.
    foreach ($colnames as $c) {
        printf("%-12s", strtoupper($c));
    }
    //  Print the boundary
    printf("\n%s\n", str_repeat("-", 12 * $ncols));
    //  Print row data
    while ($row = $res->FetchRow()) {
        foreach ($row as $r) {
            printf("%-12s", $r);
        }
        print "\n";
    }
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
