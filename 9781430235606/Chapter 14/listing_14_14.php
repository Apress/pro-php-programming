<table>
    <tr><th>Story</th><th>Date</th><th>Creator</th></tr>
<?php
error_reporting(E_ALL);
$xml = simplexml_load_file("http://feeds.wired.com/wired/index?format=xml");

foreach($xml->channel->item as $item){
    print "<tr><td><a href='".$item->link."'>".$item->title."</a></td>";
    print "<td>".$item->pubDate."</td>";
    $creator_by_xpath = $item->xpath("dc:creator");
    print "<td>".(String)$creator_by_xpath[0]."</td></tr>";

    //equivalent creator, using children function instead of xpath function
    //$creator_by_namespace = $item->children('http://purl.org/dc/elements/1.1/')->creator;
    //print "<td>".(String)$creator_by_namespace[0]."</td></tr>";
}
?>
</table>
