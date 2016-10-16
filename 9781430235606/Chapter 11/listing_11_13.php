<?php
session_start();
session_regenerate_id();
if ( !isset( $_SESSION['csrf_token'] ) ) {
    $csrf_token = sha1( uniqid( rand(), true ) );
    $_SESSION['csrf_token'] = $csrf_token;
    $_SESSION['csrf_token_time'] = time();
}
?>
<form>
<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>" />
</form>