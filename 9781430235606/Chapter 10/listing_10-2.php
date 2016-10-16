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

$favicon = $simplepie->get_favicon();
foreach ( $simplepie->get_items() as $item ) {
	echo '<p><img src="' . $favicon . '" alt="favicon"/>&nbsp; &nbsp;';
	echo '<p><strong><a href="' . $item->get_link() . '">';
	echo $item->get_title() . '</a></strong><br/>';
	echo '<em>' . $item->get_date( 'd/m/Y' ) . '</em><br/>';
	echo $item->get_content() . '</p>';
}
?>
</BODY>
</HTML>