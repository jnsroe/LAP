
<?php
include('config.php');

$stmt = $con->prepare("select * from Gast");
$stmt->execute();
echo '<div>'.$_POST['name'].'</div>';
echo '<div class="table">
              <div class="row">';
for($i = 0; $i < $stmt->columnCount(); $i++)
{
    echo '<div class="col font-weight-bold">'.$stmt->getColumnMeta($i)['name'].'</div>';
}
echo '</div>';
while($row = $stmt->fetch(PDO::FETCH_NUM))
{

    echo '<div class="row">';
    foreach($row as $r)
    {
        echo '<div class="col">'.$r.'</div>';
    }
    echo '</div>';
}
echo '</div>';
?>
