<?php
if (!isset($_GET['db'])) {
    echo 'Ups, something went wrong :(';
}
else {
    $db = $_GET['db'];

    try {
        $stmt = $con->prepare('use '.$db);
        $stmt->execute();

        $stmt = $con->prepare('show tables');
        $stmt->execute();

        echo '<h3>Database: '.$db.'</h3>';
        echo '</br>';

        echo '<table class="table"><tbody>';

        foreach ($stmt->fetchAll() as $row) {
            $table = $row[0];
            echo '<tr>';
            echo '<td>'.$table.'</td>';
            echo '<td><a class="btn btn-secondary" href="?menu=table&db='.$db.'&table='.$table.'">Anzeigen</a></td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
    catch (Exception $e) {
        echo 'oh, oh';
    }
}