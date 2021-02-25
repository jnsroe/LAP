<?php
try{
    // Verbindungsaufbau
    $server = 'localhost';
    $db = 'movie';
    $user = 'root';
    $pwd = '';
    $con = new PDO('mysql:host='.$server.';dbname='.$db.
        ';charset=utf8', $user, $pwd);

    // Exception Handling explizit einschalten
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e)
{
    // Fehlerbehandlung
    echo $e->getMessage().'<br>';
}