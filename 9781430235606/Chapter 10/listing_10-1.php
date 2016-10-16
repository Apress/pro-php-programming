<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</HEAD>
<BODY>
<?php
error_reporting ( E_ALL ^ E_NOTICE ^ E_DEPRECATED );
require_once ('simplepie/simplepie.inc');

$feed_url = "http://feeds.wired.com/wired/index?format=xml";
$simplepie = new Simplepie ( $feed_url );

foreach ( $simplepie->get_items() as $item ) {
	echo '<p><strong><a href="' . $item->get_link() . '">';
	echo $item->get_title() . '</a></strong><br/>';
	echo '<em>' . $item->get_date() . '</em><br/>';
	echo $item->get_content() . '</p>';
}
?>
</BODY>
</HTML>