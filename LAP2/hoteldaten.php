<?php

include 'hotelabfrage.php';
include('config.php');

$stmt = $con->prepare("select * from Gast");
$stmt->execute();

echo '<form method="post">
    <div class="form-group">';

while($row = $stmt->fetch(PDO::FETCH_NUM))
{

    echo '<div class="row">';
    foreach($row as $r)
    {
        echo '<div class="col">'.$r.'</div>';
    }
    echo '</div>';
}
echo '</div>
    </form>';
?>
