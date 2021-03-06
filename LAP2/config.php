<?php
try{
    // Verbindungsaufbau
    $server = 'localhost';
    $db = 'Hotel';
    $user = 'root';
    $pwd = '';
    $con = new PDO('mysql:host='.$server.';dbname='.$db.
        ';charset=utf8', $user, $pwd);

    // Exception Handling explizit einschalten
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e)
{
    echo $e->getMessage().'<br>';
}