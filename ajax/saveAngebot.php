<?php
include "../sql/mysql_connect.php";

$name = $_POST["name"];
$preis = $_POST["preis"];
$info = $_POST["info"];
$raid_id = $_POST["raidId"];


	// Angebot anlegen
	$sql_angebot = "INSERT INTO angebote (id, name, preis, info, raid_id) VALUES ('', '$name', '$preis', '$info', '$raid_id' )";
	$result_angebot = mysqli_query($connection, $sql_angebot);
	if(!$result_angebot) {
		echo "Error Angebot";
		
	} else {
		echo "Angebot erfolgreich gespeichert";
	}

?>