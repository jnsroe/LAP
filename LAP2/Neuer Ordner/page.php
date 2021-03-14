<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
include "config.php";
$input = $_POST['user_name'];
print_r($_POST);
echo "$input is cool";

$query = 'select * from movie';
$stmt = $con->prepare($query);
$stmt->execute();

for ($i = 1; $i < $stmt->columnCount(); $i++) {
    echo '<div><label>' . $stmt->getColumnMeta($i)['name'] . '</label></div>';
}
echo '</div>';
$lastID = 0;
while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    echo '<div class="col">' . $row[1] . '</div>';
    $lastID = $row[0];
    echo '</div>';
}
echo '</div>'; // table
?>

</body>
</html>