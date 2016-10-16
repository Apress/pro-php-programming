<?php
// http://localhost/filter_has_var_test.php?test2=hey&test3=

$_GET['test'] = 1;
var_dump( filter_has_var( INPUT_GET, 'test' ) );
//false
var_dump( filter_has_var( INPUT_GET, 'test2' ) );
//true
var_dump( filter_has_var( INPUT_GET, 'test3' ) );
//true
?>