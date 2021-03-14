<?php
if (!isset($_GET['table']) || !isset($_GET['db'])) {
    echo 'Ups, something went wrong :(';
}
else {
    $table = $_GET['table'];
    $db = $_GET['db'];

    try {
        $con->prepare('use '.$db)->execute();
        $stmt = $con->prepare('show columns from '.$table);
        $stmt->execute();

        echo '<h3>Database: '.$db.'</h3>';
        echo '<h3>Table: '.$table.'</h3>';
        echo '</br>';

        echo '<div class="table">';

        foreach ($stmt->fetchAll() as $row) {
            echo '<div class="row">';
            echo '<div class="col">'.$row[0].'</div>';
            echo '<div class="col">'.$row[1].'</div>';
            echo '<div class="col">'.$row[2].'</div>';
            echo '<div class="col">'.$row[3].'</div>';
            echo '<div class="col">'.$row[4].'</div>';
            echo '<div class="col">'.$row[5].'</div>';
            echo '</div>';
        }

        echo '</div>';
    }
    catch (Exception $e) {
        echo 'oh, oh';
    }
}