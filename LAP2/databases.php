<h3>select data</h3>



<?php
$database = null;
if (isset($_POST['DBname'])){
    $database = $_POST['DBname'];
echo '<h3>'.$database.'</h3>';

    include('config.php');
    $query1 = 'use '.$database.';';
    $query2 = 'show Tables;';
    $stmt1 = $con->prepare($query1);
    $stmt1->execute([$database]);
    $stmt2 = $con->prepare($query2);
    $stmt2->execute();

    echo '<form method="post">
    <div class="form-group">';

    while($row = $stmt2->fetch(PDO::FETCH_NUM))
    {
        foreach($row as $r)
        {
            echo '<div class="row">'.$r.'<input type="submit" style="width: auto" name="Tname" value="'.$r.'"></div>';
        }
    }
    echo '</div>
    </form>';
}
elseif(isset($_POST['Tname'])){
$table = $_POST['Tname'];

    echo '<h3>'.$table.'</h3>';
    echo '<h3>'.$database.'</h3>';

    $query1 = 'use '.$database.';';
    $stmt1 = $con->prepare($query1);
    $stmt1->execute([$database]);
    $query3 = 'select * from '.$table.';';
    $stmt3 = $con->prepare($query3);
    $stmt3->execute();

    while ($row = $stmt3->fetch(PDO::FETCH_NUM)) {
        echo '<div class="row">';
        for ($i = 1; $i < $stmt3->columnCount(); $i++) {
            echo '<div class="col">' . $row[$i]. '</div>';
        }
        echo '<br>';
        echo '</div>';
    }
    echo '</div>';

}
else
    {
    include('config.php');
    $query = "show databases;";
    $stmt = $con->prepare($query);
    $stmt->execute();

    echo '<form method="post">
    <div class="form-group">';

    while($row = $stmt->fetch(PDO::FETCH_NUM))
    {
        foreach($row as $r)
        {
            echo '<div class="row">'.$r.'<input type="submit" style="width: auto" name="DBname" value="'.$r.'"></div>';
        }
    }
    echo '</div>
    </form>';
}