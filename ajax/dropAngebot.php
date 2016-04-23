<?php
include "../sql/mysql_connect.php";

$angebots_id = $_POST["angebotsid"];

$sql_angebot = "DELETE FROM angebote WHERE id = $angebots_id";
$result_angebot = mysqli_query($connection, $sql_angebot);
if(!$result_angebot) {
	echo "Error angebot";	
} else {
	echo "Angebot erfolgreich geloescht";
}


?>