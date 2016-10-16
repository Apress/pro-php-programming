<html>
    <head>
        <?php
          echo $gmap->getHeaderJS();
          echo $gmap->getMapJS();
        ?>
    </head>
    <body>
        <?php
          echo $gmap->printOnLoad();
          echo $gmap->printMap();
          echo $gmap->printSidebar();
        ?>
    </body>
</html>
