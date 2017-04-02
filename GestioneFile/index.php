<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload file - versione base</title>
    </head>
    <body>
       <?php
        //Tecnica postback
        //se secondo accesso prendo i dati dal form
            if (isset($_POST['send_file'])) {
                $ftp_server = $_POST['ftp_server'];
                $porta = $_POST['port'];
                $username = $_POST['username'];
                $password = $_POST['password'];   
                
                //validazione dei parametri di connessione
                if (($ftp_server != 'ftp_server') && ($ftp_server != '')) {
                    if (($username != 'username') && ($username != '')) {
                        if (($password != 'password') && ($password != '')) {
                          //validazione nome dei file
                            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                                      $file = $_FILES['file']['tmp_name']; //nome file con percorso assoluto
                                      $new_file = $_FILES['file']['name']; //nome file senza percorso
                                      
                                      //apertura connessione ftp
                                      $conn = ftp_connect($ftp_server, $porta) or die ('Impossibile connettersi al server');
                                      ftp_login($conn, $username, $password) or die ('username o password errati');
                                      ftp_pasv($conn, true);
                                      
                                      //upload del file
                                      $invia = ftp_put($conn, $new_file, $file, FTP_BINARY);
                                      echo (!$invia) ? 'Upload fallito' : 'upload completato';
                                      
                                      //chiusura connessione
                                      ftp_close($conn);
                                      }
                                        else
                                      {
                                        echo "<b>Inserire il file</b>";
                                      }
                                } else
                                  {
                                   echo "<b>Inserire la password</b>";
                                  }
                            } else
                               {
                                echo "<b>Inserire lo username</b>";
                               }
                      } else
                        {
                         echo "<b>Inserire il server ftp</b>";
                        }
            }
         ?>
        <!-- form html e tabella -->
        <form enctype="multipart/form-data" name = "modulo_ftp" action="
            <?php 
            $str=$_SERVER["PHP_SELF"];
            echo htmlspecialchars($str) ?>" method="POST">
              <table>
                  <tr><td>Server FTP</td><td><input type="text" name="ftp_server" value="ftp_server"/></td></tr>
                  <tr><td>Porta</td><td><input type="text" name="port" value="21"/></td></tr>
                  <tr><td>Username</td><td><input type="text" name="username" value="username"/></td></tr>
                  <tr><td>Password</td><td><input type="password" name="password" value="password"/></td></tr>
                  <tr><td>File</td><td><input type="file" name="file"/></td></tr>
                  <tr><td><input type="submit" name="send_file" value="Carica file"/></td>
              </table> 
        </form>
    </body>
</html>
