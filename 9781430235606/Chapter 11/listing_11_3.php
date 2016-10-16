<?php
        //whitelist of allowed include filenames
        $allowed_includes = array( 'fish.php', 'dogs.php', 'cat.php' );
        if ( isset( $_GET['animal']) ) {
                $animal = $_GET['animal'];
                $animal_file = $animal. '.php';
                if( in_array( $animal_file, $allowed_includes ) ) {
                        require_once($animal_file);
                } else {
                        echo "Error: illegal animal file";
                }
        }
?>
