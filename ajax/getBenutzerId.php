<?php
include "../sql/mysql_connect.php";

$sql = "SELECT max(id) FROM benutzer";

$result = mysqli_query($connection, $sql);

$benutzerId = mysqli_fetch_array($result, 0, 0);


echo $benutzerId +1 ;
?>