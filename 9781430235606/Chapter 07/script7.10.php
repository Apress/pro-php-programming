#!/usr/bin/env php
<?php
$QRY = "select e.ename,e.job,d.dname,d.loc
        from emp e join dept d on(d.deptno=e.deptno)";
$colnames = array();
$formats = array();
$ncols = 0;
try {
    $db = new SQLite3("scott.sqlite");
    $res = $db->query($QRY);
    if ($db->lastErrorCode() != 0) {
        throw new Exception($db->lastErrorMsg());
    }
    // Get the number of columns
    $ncols = $res->numColumns();
    // For every column, define format, based on the type
    foreach (range(0, $ncols - 1) as $i) {
        $colnames[$i] = $res->columnName($i);
        switch ($res->columnType($i)) {
            case SQLITE3_TEXT:
                $formats[$i] = "% 12s";
            break;
            case SQLITE3_INTEGER:
                $formats[$i] = "% 12d";
            break;
            case SQLITE3_NULL:
                $formats[$i] = "% 12s";
            break;
            default:
                $formats[$i] = "%12s";
        }
    }
    //  Print column titles, converted to uppercase.
    foreach ($colnames as $c) {
        printf("%12s", strtoupper($c));
    }
    //  Print the boundary
    printf("\n% '-48s\n", "-");
    //  Print row data
    while ($row = $res->fetchArray(SQLITE3_NUM)) {
        foreach (range(0, $ncols - 1) as $i) {
            printf($formats[$i], $row[$i]);
        }
        print "\n";
    }
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
