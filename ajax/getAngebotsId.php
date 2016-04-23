<?php
include "../sql/mysql_connect.php";

$sql = "SELECT max(id) FROM angebot";

$result = mysqli_query($connection, $sql);

$angebotId = mysqli_fetch_array($result, 0, 0);


echo $angebotId +1 ;
?>