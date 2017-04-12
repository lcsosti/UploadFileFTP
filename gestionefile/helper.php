<?php
    include "valida.php";
    
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
      $file = $_FILES['file']['tmp_name']; //nome file con percorso assoluto
        $new_file = $_FILES['file']['name']; //nome file senza percorso
        //apertura connessione ftp
        $conn = ftp_connect($ftp_server, $porta) or die('Non è stato possibile connettersi al server');
        ftp_login($conn, $username, $password) or die('username o password errati');
        ftp_pasv($conn, true);
        //upload del file
        $invia = ftp_put($conn, $new_file, $file, FTP_BINARY);
        echo (!$invia) ? 'Upload fallito' : 'upload completato';
        //chiusura connessione
        ftp_close($conn);
    }
?>