
<?php
    
    $ftp_server = trim(stripslashes(filter_input(INPUT_POST, 'ftp_server', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $porta = trim(stripslashes(filter_input(INPUT_POST, 'port', FILTER_VALIDATE_INT)));
    $username = trim(stripslashes(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    $password = trim(stripslashes(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
    
?>

