<?php
include "../sql/mysql_connect.php";

$benutzer_id = $_POST["benutzerid"];

$sql_benutzer = "DELETE FROM benutzer WHERE id = $benutzer_id";
$result_benutzer = mysqli_query($connection, $sql_benutzer);
if(!$result_benutzer) {
	echo "Error benutzer";	
} else {
	echo "benutzer erfolgreich geloescht";
}


?>