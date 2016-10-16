#!/usr/bin/env php
<?php
function dflt_handler(Exception $exc) {
    print "Exception:\n";
    $code = $exc->getCode();
    if (!empty($code)) {
        printf("Erorr code:%d\n", $code);
    }
    print $exc->getMessage() . "\n";
    print "File:" . $exc->getFile() . "\n";
    print "Line:" . $exc->getLine() . "\n";
    exit(-1);
}
set_exception_handler('dflt_handler');
try {
    $file = new SplFileObject("non_existing_file.txt", "r");
}
catch (Exception $e) {
    $file=STDIN;
}
?>
