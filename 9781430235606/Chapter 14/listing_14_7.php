<?php
error_reporting(E_ALL ^ E_NOTICE);

$xml = simplexml_load_file("template.xhtml");
findDivContentsByID($xml, "main_center");

function findDivContentsByID($xml, $id) {
  foreach ($xml->body->div as $divs) {
      if (!empty($divs->div)) {
          foreach ($divs->div as $inner_divs) {
              if (isElementWithID($inner_divs, $id)) {
                  break 2;
              }
          }
      } else {
          if (isElementWithID($divs, $id)) {
              break;
          }
      }
  }
}

function isElementWithID($element, $id) {
    $actual_id = (String) $element->attributes()->id;
    if ($actual_id == $id) {
        $value = trim((String) $element);
        print "value of #$id is: $value";
        return true;
    }
    return false;
}

?>
