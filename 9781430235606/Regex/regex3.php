#!/usr/bin/env php
<?php
$cookie = <<<'EOT'
    Now what starts with the letter C?
    Cookie starts with C
    Let's think of other things that starts with C
    Uh ahh who cares about the other things

    C is for cookie that's good enough for me
    C is for cookie that's good enough for me
    C is for cookie that's good enough for me

    Ohh cookie cookie cookie starts with C 
EOT;
$expr = array("/(?i)cookie/", "/C/");
$repl = array("donut", "D");
$item = 'Event date: 2011-05-01';
$donut = preg_replace($expr, $repl, $cookie);
print "$donut\n";
?>
