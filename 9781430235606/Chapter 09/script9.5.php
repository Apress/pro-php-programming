#!/usr/bin/env php
<?php
$proc = <<<'EOP'
declare 
  stat number(1,0);
begin
  dbms_output.enable();
  select days_ago(:DAYS) into :LONG_AGO from dual;
  dbms_output.put_line('Once upon a time:'||:LONG_AGO);
  dbms_output.get_line(:LINE,stat);
end;
EOP;
$days=60;
$long_ago="";
$line="";

try {
    $dbh = oci_connect("scott","tiger","vmso");
    if (!$dbh) {
        $err = oci_error();
        throw new exception($err['message']);
    }
    $res = oci_parse($dbh, $proc);
    oci_bind_by_name($res,":DAYS",&$days,20,SQLT_CHR);
    oci_bind_by_name($res,":LONG_AGO",&$long_ago,128,SQLT_CHR);
    oci_bind_by_name($res,":LINE",&$line,128,SQLT_CHR);
    if (!oci_execute($res)) {
       $err=oci_error($dbh);
       throw new exception($err['message']);
    }
    print "This is the procedure output line:$line\n";
}
catch(Exception $e) {
    print "Exception:\n";
    die($e->getMessage() . "\n");
}
?>
