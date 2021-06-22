<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>

        <?php
       if(!isset($_SESSION))
    {
        session_start();
    }
        echo 'deconnexion........';
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
        if (empty($_SESSION['compteID']))
        {
          header('Location: index.php');;
        }
        ?>


            </body>
        </html>
