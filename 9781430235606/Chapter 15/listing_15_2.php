<?php

$books = array(
      array("author" => "Lewis Carroll",
          "title" => "Alice's Adventures in Wonderland",
          "year" => 1865),
      array("author" => "Yann Martel",
          "title" => "Life of Pi",
          "year" => 2001),
      array("author" =>"Junot Diaz",
          "title" => "The Brief Wondrous Life of Oscar Wao",
          "year" => 2007),
      array("author" => "Joseph Heller ",
          "title" => "Catch-22",
           "year" => 1961),
      array("author" => "Timothy Findley",
          "title" => "Pilgrim",
          "year" => 1999),
      array("author" => "Fyodor Dostoyevsky",
          "title" => "Brothers Karamazov",
          "year" => 1880),
      );

$json_books = json_encode($books);
$decoded_json_books = json_decode($json_books);
?>
<pre>
<?php var_dump($json_books); ?>

<?php var_dump($decoded_json_books); ?>
</pre>