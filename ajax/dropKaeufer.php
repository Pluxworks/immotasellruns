<?php
include "../sql/mysql_connect.php";

$kaeufer_id = $_POST["kaeuferid"];

$sql_kaeufer = "DELETE FROM kaeufer WHERE id = $kaeufer_id";
$result_kaeufer = mysqli_query($connection, $sql_kaeufer);
if(!$result_kaeufer) {
	echo "Error kaeufer";	
} else {
	echo "Kaeufer erfolgreich geloescht";
}


?>