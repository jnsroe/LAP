<?php

try {

    $stmt = $con->prepare("show databases");
    $stmt->execute();

    echo '<table class="table"><tbody>';

    foreach ($stmt->fetchAll() as $row) {
        $database = $row[0];
        echo '<tr>';
        echo '<td>'.$database.'</th>';
        echo '<td><a class="btn btn-secondary" href="?menu=database&db='.$database.'">Anzeigen</a></th>';
        echo '</tr>';
    }

    echo '</tbody></table>';
} catch(Exception $e)
{
    echo $e->getCode().': '.$e->getMessage();
}