#!/usr/bin/env php
<?php
$QRY = "select e.ename,e.job,d.dname,d.loc
        from emp e join dept d on(d.deptno=e.deptno)";
$colnames = array();
$ncols = 0;
try {
    $db = new PDO('sqlite:scott.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $res = $db->prepare($QRY);
    $res->execute();
    // Get the number of columns
    $ncols = $res->columnCount();
    // For every column, define format, based on the type
    foreach (range(0, $ncols - 1) as $i) {
        $info = $res->getColumnMeta($i);
        $colnames[] = $info['name'];
        print_r($info);
    }
    //  Print column titles, converted to uppercase.
    foreach ($colnames as $c) {
        printf("%-12s", strtoupper($c));
    }
    //  Print the boundary
    printf("\n%s\n", str_repeat("-", 12 * $ncols));
    //  Print row data
    while ($row = $res->fetch(PDO::FETCH_NUM)) {
        foreach ($row as $r) {
            printf("%-12s", $r);
        }
        print "\n";
    }
}
catch(PDOException $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
