<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</HEAD>
<BODY>
<FORM action="twitter_get_search.php" method="post">
    <P>
        <LABEL for="query">query: </LABEL>
        <INPUT type="text" id="query" name="query"/> &nbsp; &nbsp;
        <INPUT type="submit" value="Send" />
    </P>
</FORM>
<?php
error_reporting(E_ALL ^ E_NOTICE);

$url = "http://search.twitter.com/search.json?lang=en&q=";
if (isset($_POST['query'])) {
    $full_query = $url . urlencode($_POST['query']);
    $raw_json = file_get_contents($full_query);
    $json = json_decode($raw_json);

	//uncomment to display the available keys
    /*
	foreach ($json->results[0] as $key => $value) {
		echo $key . "<br/>";
	}
	*/

    echo "<table style='width:500px;'>";
	echo "<tr><th>user</th><th>tweet</th></tr>";
    foreach ($json->results as $r) {

        echo '<tr><td><img src="' . $r->profile_image_url . '"/>&nbsp;';
        echo $r->from_user . '</td>';
        echo '<td>' . $r->text . '</td>';
        echo '</tr>';
    }
    echo "</table>";
}
?>
</BODY>
</HTML>
