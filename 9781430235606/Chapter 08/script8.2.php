#!/usr/bin/env php
<?php
$QRY = "select e.ename,e.job,d.dname,d.loc
        from emp e join dept d on(d.deptno=e.deptno)";
$ncols = 0;
$colnames = array();
try {
    $db = new mysqli("localhost", "scott", "tiger", "scott");
    $res = $db->query($QRY);
    print "\n";
    if ($db->errno != 0) {
        throw new Exception($db->error);
    }
    // Get the number of columns
    $ncols = $res->field_count;

    // Get the column names
    while ($info = $res->fetch_field()) {
        $colnames[] = strtoupper($info->name);
    }

    // Print the column titles
    foreach ($colnames as $c) {
        printf("%-12s", $c);
    }

    // Print the border
    printf("\n%s\n", str_repeat("-", 12 * $ncols));

    // Print rows
    while ($row = $res->fetch_row()) {
        foreach (range(0, $ncols - 1) as $i) {
            printf("%-12s", $row[$i]);
        }
        print "\n";
    }
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
