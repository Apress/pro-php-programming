<?php
$filename = "image.x";
if (file_exists($filename)) {
  print file_get_contents($filename);
}
?>
