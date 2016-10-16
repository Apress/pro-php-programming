<?php
//we will leave out the PHP resource type
$php_data_types = array(4.1, 3, NULL, true, false, "hello", new StdClass(), array());

$json = json_encode($php_data_types);
$decoded = json_decode($json);
?>
<p>JSON Representation:<br/>
<pre>
<?php var_dump($json); ?>
</pre>
</p>
<p>PHP Representation:<br/>
<pre>
<?php var_dump($decoded); ?>
</pre>
</p>