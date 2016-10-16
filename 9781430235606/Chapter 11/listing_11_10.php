<?php

$field_1 = "";
$field_2 = "";
if ( isset( $_POST['submit'] ) ) {
    $form_fields = array( 'field_1', 'field_2' );
    $completed_form = true;
    foreach ( $form_fields as $field ) {
        if ( !isset( $_POST[$field] ) || trim( $_POST[$field] ) == "" ) {
            $completed_form = false;
            break;
        }else{
            ${$field} = $_POST[$field];
        }
    }

    if ( $completed_form ) {
        //do something with values and redirect
        header( "Location: success.php" );
    } else {
        print "<h2>error</h2>";
    }
}
?>
<form action="listing_11_10.php" method="post">
    <input type="text" name="field_1" value="<?php print $field_1; ?>" />
    <input type="text" name="field_2" value="<?php print $field_2; ?>" />
    <input type="submit" name="submit" />
</form>