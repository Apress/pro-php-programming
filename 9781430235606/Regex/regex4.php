#!/usr/bin/env php
<?php
$input = glob('/usr/share/pear/*');
$pattern = '/\.php$/';
$results = preg_grep($pattern, $input);
printf("Total files:%d PHP files:%d\n", count($input), count($results));
foreach ($results as $key => $val) {
    printf("%d ==> %s\n", $key, $val);
}
?>
