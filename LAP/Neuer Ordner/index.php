<!DOCTYPE html>
<html>
<body>
<form action="page.php" method="post">
    <input type="text" name="user_name">
    <input type="submit" value="login">
</form>

<?php
include "config.php";
$txt = "Test Text";
echo "$txt is cool";
?>

</body>
</html>